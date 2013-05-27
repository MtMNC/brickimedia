<?php
/**
 * This is the main web entry point for MediaWiki.
 *
 * If you are reading this in your web browser, your server is probably
 * not configured correctly to run PHP applications!
 *
 * See the README, INSTALL, and UPGRADE files for basic setup instructions
 * and pointers to the online documentation.
 *
 * http://www.mediawiki.org/
 *
 * ----------
 *
 * Copyright (C) 2001-2011 Magnus Manske, Brion Vibber, Lee Daniel Crocker,
 * Tim Starling, Erik Möller, Gabriel Wicke, Ævar Arnfjörð Bjarmason,
 * Niklas Laxström, Domas Mituzas, Rob Church, Yuri Astrakhan, Aryeh Gregor,
 * Aaron Schulz, Andrew Garrett, Raimond Spekking, Alexandre Emsenhuber
 * Siebrand Mazeland, Chad Horohoe, Roan Kattouw and others.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

ini_set( 'memory_limit', '128M' );

# Bail on old versions of PHP.  Pretty much every other file in the codebase
# has structures (try/catch, foo()->bar(), etc etc) which throw parse errors in
# PHP 4. Setup.php and ObjectCache.php have structures invalid in PHP 5.0 and
# 5.1, respectively.
if ( !function_exists( 'version_compare' ) || version_compare( phpversion(), '5.3.2' ) < 0 ) {
	// We need to use dirname( __FILE__ ) here cause __DIR__ is PHP5.3+
	require( dirname( __FILE__ ) . '/includes/PHPVersionError.php' );
	wfPHPVersionError( 'index.php' );
}

# Initialise common code.  This gives us access to GlobalFunctions, the
# AutoLoader, and the globals $wgRequest, $wgOut, $wgUser, $wgLang and
# $wgContLang, amongst others; it does *not* load $wgTitle
if ( isset( $_SERVER['MW_COMPILED'] ) ) {
	require ( 'phase3/includes/WebStart.php' );
} else {
	require ( __DIR__ . '/includes/WebStart.php' );
}

// start profiler
global $wgRequest;
if( $wgRequest -> getVal('profiler') == 'true' ){
	$profile = true;
} else {
	$profile = false;
}

if( $profile ){
	include_once '/usr/share/pear/xhprof_lib/utils/xhprof_lib.php';
	include_once '/usr/share/pear/xhprof_lib/utils/xhprof_runs.php';
	xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
}

$mediaWiki = new MediaWiki();
$mediaWiki->run();

if( $profile ){
	$profiler_namespace = 'mw';  // namespace for your application
	$xhprof_data = xhprof_disable();
	$xhprof_runs = new XHProfRuns_Default();
	$run_id = $xhprof_runs->save_run($xhprof_data, $profiler_namespace);
	
	// url to the XHProf UI libraries (change the host name and path)
	$profiler_url = sprintf('http://brickimedia.org/xhprof_html/index.php?run=%s&source=%s', $run_id, $profiler_namespace);
	echo '<a href="'. $profiler_url .'" target="_blank">Profiler output</a>';
	
	// stop profiler
	/*$xhprof_data = xhprof_disable();

	ob_start();
	var_dump($xhprof_data);
	$out = ob_get_clean();

	file_put_contents("/var/log/profiler.log", $out);*/
}