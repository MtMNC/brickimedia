<?php 
function getNew(){
	return $mwchat -> getNew();
}
$wgAjaxExportList[] = 'getNew';
$wgAjaxExportList[] = 'sendMessage';
$wgAjaxExportList[] = 'sendPM';
$wgGroupPermissions['user']['chat'] = true;