<?php
echo  ($_SERVER['SERVER_PORT'] === '443' ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/';
$placement = $_REQUEST['PLACEMENT'];
$placementOptions = isset($_REQUEST['PLACEMENT_OPTIONS']) ? json_decode($_REQUEST['PLACEMENT_OPTIONS'], true) : array();
if($placement !== 'USERFIELD_TYPE'):
	return;
endif;
$placementOptions['VALUE'] = str_replace("\\\"", "", $placementOptions['VALUE']);
if(!is_array($placementOptions))
{
	$placementOptions = array();
}

?>
<!DOCTYPE html>
<html>
<head>
	<script src="//api.bitrix24.com/api/v1/dev/"></script>
	<link rel="stylesheet" type="text/css" href="//<?=$_SERVER['SERVER_NAME'].($_SERVER['APP_ROOT']?$_SERVER['APP_ROOT']:'').'/'?>entity-editor.css">
</head>
<body style="margin: 0; padding: 0; background-color: <?=$placementOptions['MODE'] === 'edit' ? '#fff' : '#f9fafb'?>;">
<div class="ui-entity-editor-content-block">
<?
define('RUN', 1);
require_once(PATH.'/template.php');
?>
</div>
</body>
</html>