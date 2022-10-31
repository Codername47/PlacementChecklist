<?if(!defined('RUN')) die;?> 
<script>
	var entityValueId = '<?=$placementOptions['ENTITY_VALUE_ID']?>';
	var fields = [];
	<?if($placementOptions['VALUE']):?>
		JSON.parse('<?=$placementOptions['VALUE']?>').forEach(function(element){
			for(var name in element){
				fields[name] = element[name];
			}
		})
	<?endif;?>
	var currentUFName = '<?=$placementOptions['FIELD_NAME']?>';
</script>
<script src="list.js"></script>
<div class="workarea" style="width: 90%; ">
<?if($placementOptions['MODE'] == 'edit'):?>
	<div id="checkbox-area">
	</div>
	<script src="edit.js"></script>
<?elseif($placementOptions['MODE'] == 'view'):?>
	<div id = "checklist">
	</div>
	<script src="view.js"></script>
<?endif;?>
</div>
