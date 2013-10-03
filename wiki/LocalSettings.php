<?php
# This file was automatically generated by the MediaWiki 1.20.2
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgScriptExtension  = ".php";
$wgArticlePath      = "/wiki/$1";
$wgUsePathInfo      = true;

## The protocol and server name to use in fully-qualified URLs
//$wgServer           = "http://brickimedia.org"; SET LATER ON, BASED ON PROJECT

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "$wgStylePath/common/images/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "apache@brickimedia.org";
$wgPasswordSender   = "apache@brickimedia.org";

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
require_once( __DIR__ . '/LocalSettings_private.php' );
//$wgDBuser           = "NOT STORED ON GITHUB";
//$wgDBpassword       = "NOT STORED ON GITHUB";

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType    = CACHE_MEMCACHED;
$wgMemCachedServers = array( "127.0.0.1:11211" );

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads  = false;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons  = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "7a153e24c3f406320959859ee859bc5e679b2bd41d6fa77fc355914588f1014d";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "4d6c44c3c40f5030";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
//$wgDefaultSkin = "vector";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsUrl  = "http://creativecommons.org/licenses/by-sa/3.0/";
$wgRightsText = "a Creative Commons Attribution-ShareAlike 3.0 license";
$wgRightsIcon = "http://meta.brickimedia.org/skins/common/images/cc-by-sa.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = 512;

# End of automatically generated settings.
# Add more configuration options below.

# PROJECT CONFIGURATION
if( $wgCommandLineMode ) {
	$_SERVER["SERVER_NAME"] = getenv("WIKI") . ".brickimedia.org";
	$_SERVER["HTTP_HOST"] = getenv("WIKI") . ".brickimedia.org";
} else {
	$_SERVER["SERVER_NAME"] = $_SERVER["HTTP_HOST"];
}


//Global User Table
$wgSharedDB     = 'shared'; 
$wgSharedTables = array( 
	'user',
	'global_user_groups',
	'interwiki',
	'user_profile',
	'user_properties',
	'user_relationship',
	'user_relationship_request',
	'spam_regex',
	'blockedby',
	'stats_blockedby',
	'abuse_filter',
	'abuse_filter_action',
	'abuse_filter_history',
	'abuse_filter_log',
	'spoofuser'
);

//$wgCookieDomain = in LocalSettings_private

$host = explode( ".", $_SERVER["HTTP_HOST"] );
switch ( $host[0] ) {
	case "meta":
		$ls_path = "LocalSettings_meta.php";
		$bmProject = 'meta';
		$wgServer = "http://meta.$bmServerBase";
		$wgDBname = "meta";
		break;
	case "en":
		$ls_path = "LocalSettings_en.php";
		$bmProject = 'en';
		$wgServer = "http://en.$bmServerBase";
		$wgDBname = "en";
		break;
	case "customs":
		$ls_path = "LocalSettings_customs.php";
		$bmProject = 'customs';
		$wgServer = "http://customs.$bmServerBase";
		$wgDBname = "customs";
		break;
	case "dev":
		$ls_path = "LocalSettings_dev.php";
		$bmProject = 'dev';
		$wgServer = "http://dev.$bmServerBase";
		$wgDBname = "dev";
		break;
	case "admin":
		$ls_path = "LocalSettings_admin.php";
		$bmProject = 'admin';
		$wgServer = "http://admin.$bmServerBase";
		$wgDBname = "admin";
		break;
	case "legomessageboardswiki":
	case "lmbw":
		$ls_path = "LocalSettings_lmbw.php";
		$bmProject = 'lmbw';
		$wgServer = "http://lmbw.$bmServerBase";
		$wgDBname = "lmbw";
		break;
	case "stories":
		$ls_path = "LocalSettings_stories.php";
		$bmProject = 'stories';
		$wgServer = "http://stories.$bmServerBase";
		$wgDBname = "stories";
		break;
	case "cuusoo":
		$ls_path = "LocalSettings_cuusoo.php";
		$bmProject = 'cuusoo';
		$wgServer = "http://cuusoo.$bmServerBase";
		$wgDBname = "cuusoo";
		break;
	default:
		header( 'Location: http://www.brickimedia.org/notfound.html' ) ;
		exit(0);
		break;
	}

if( !getenv("noext") ){
	require_once( __DIR__ . '/LocalSettings_ext.php' );
}
require_once( $ls_path );


require_once( "$IP/skins/Refreshed.php" );
$wgDefaultSkin = 'refreshed';

require_once( "$IP/skins/Custard.php" );

#disable anonymous editing during beta
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['user']['edit'] = true;

$wgGroupPermissions['*']['createaccount'] = false; //disable account creation

# Shared uploads
# info here: http://www.mediawiki.org/wiki/Manual:Wiki_family#Use_shared_files
if ( $bmProject != 'meta'){
	$wgForeignFileRepos[] = array(
			'class'            => 'FSRepo',
			'name'             => 'sharedFsRepo',
			'directory'        => 'meta',
			'hashLevels'       => 0,
			'url'              => "http://meta.$bmServerBase/images/",
	);
	$wgUseSharedUploads = true;
	$wgSharedUploadPath = $wgUploadPath;
	$wgSharedUploadDirectory = $wgUploadDirectory;
	$wgHashedSharedUploadDirectory = true;
}
$wgFetchCommonsDescriptions = true;
$wgSharedUploadDBname = 'meta';  # DB-Name of PoolWiki
$wgSharedUploadDBprefix = ''; # Table name prefix for PoolWiki
$wgRepositoryBaseUrl = "http://meta.$bmServerBase/wiki/File:";

$wgUploadNavigationUrl = "http://meta.$bmServerBase/wiki/Special:Upload";
$wgUploadMissingFileUrl= "http://meta.$bmServerBase/wiki/Special:Upload";

