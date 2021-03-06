<?php

/**
* Skin file for skin My Skin.
*
* @file
* @ingroup Skins
*/

/**
 * SkinTemplate class for My Skin skin
 * @ingroup Skins
 */
class SkinCustard extends SkinTemplate {
 
		var $skinname = 'custard', $stylename = 'custard',
				$template = 'CustardTemplate', $useHeadElement = true;
 
		/**
		 * @param $out OutputPage object
		 */
		function setupSkinUserCss( OutputPage $out ){
				parent::setupSkinUserCss( $out );
				$out->addModuleStyles( "skins.custard" );
		}
 
}

/**
 * BaseTemplate class for My Skin skin
 * @ingroup Skins
 */
class CustardTemplate extends BaseTemplate {
 
		/**
		 * Outputs the entire contents of the page
		 */
		public function execute() {
				// Suppress warnings to prevent notices about missing indexes in $this->data
				wfSuppressWarnings();

				$this->html( 'headelement' ); ?>
				
				<div id="toolbar">
					<div class="toggle"></div>
					<div id="mw-js-message" class="message" style="display:none;"></div>
					<?php if ( $this->data['sitenotice'] ) { ?>
						<div id="site-notice">
							<?php $this->html( 'sitenotice' ); ?>
						</div>
					<?php } ?>
					<?php if ( $this->data['newtalk'] ) { ?>
						<div id="new-talk" class="message">
							<?php $this->html( 'newtalk' ); ?>
						</div>
					<?php } ?>
				</div>
				
				<div id="interwiki">
					<div id="left" class="sub">
						<a href="#meta">Meta</a>
						<a href="#pedia">Pedia</a>
					</div>
					<div id="mid" class="sub">
						<a href="#main">Brickimedia</a>
					</div>
					<div id="right" class="sub">
						<a href="#lmbw">LMBW</a>
						<a href="#stories">Stories</a>
					</div>
				</div>
				
				<div id="page">
					<div class="tabs"></div>
					<h1 id="header"><?php $this->html( 'title' ); ?></h1>
					<?php if ( $this->data['subtitle'] ) { ?>
						<div class="sub-header">
							<?php $this->html( 'subtitle' ); ?>
						</div>
					<?php } ?>
					<?php if ( $this->data['undelete'] ) { ?>
						<div id="sub-header">
							<?php $this->html( 'undelete' ); ?>
						</div>
					<?php } ?>
					<div id="content">
						<?php $this->html( 'bodytext' ) ?>
					</div>
					<?php $this->html( 'catlinks' ); ?>
				</div>
				
				<?php $this->printTrail(); ?>
				
				</body>
				</html>
				
				<?php
				
				wfRestoreWarnings();
		}

}

?>