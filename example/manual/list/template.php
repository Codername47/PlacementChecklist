<?if(!defined('RUN')) die;?>
<?$value = json_decode($placementOptions['VALUE']);?>
<?if($placementOptions['MODE'] == 'edit'):?>
	<script src="edit.js"></script>
	<div id="fields">
	<?if(isset($value)):?>
		<?foreach($value as $key => $field):?>
			<script>setValue("<?=htmlspecialchars($field)?>", <?=$key?>);</script>
			<div id = <?=$key?>>
				<input type="text" style="width: 90%;" value="<?=htmlspecialchars($field)?>" onkeyup="setValue(this.value, <?=$key?>)">
				<a onclick="deleteField(<?=$key?>)">X</a>
			</div>
		<?endforeach;?>
	<?endif;?>
	</div>
	<input type="button" value="Добавить элемент" onclick = "addField()">
<?elseif($placementOptions['MODE'] == 'view'):?>
	<?if(isset($value)):?>
		<?foreach($value as $key => $field):?>
			<?=$field.'<br>'?>
		<?endforeach;?>
	<?endif;?>
<?endif;?>
