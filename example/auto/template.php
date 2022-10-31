<?if(!defined('RUN')) die;?>
<?if($placementOptions['MODE'] == 'edit'):?>
	<script src="edit.js"></script>
		<select size = 11 style="width:90%;" id="fields" multiple="multiple" onchange="send([...this.options].filter((x) => x.selected))">
		</select>
	<script>
		<?if($placementOptions['VALUE']):?>
			var fields = JSON.parse('<?=$placementOptions['VALUE']?>');
		<?else:?>
			var fields = [];
		<?endif;?>
		var currentField = '<?=$placementOptions['FIELD_NAME']?>';
		optionsList();
	</script>
<?elseif($placementOptions['MODE'] == 'view'):?>
	<div class="workarea" style="width: 90%; ">
		<span>
			<div id = "checklist">

			</div>
		</span>
	</div>

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
	</script>
	<script src="view.js"></script>
<?endif;?>

