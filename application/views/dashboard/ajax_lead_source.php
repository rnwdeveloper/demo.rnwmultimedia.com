<label>Source</label>
<select class="form-control" name="source_id" id="source_id">
	<option>Select Source</option>
	<?php foreach($source_list as $sl) { ?>
			<option value="<?php echo $sl->source_id; ?>"><?php echo $sl->source_name; ?></option>
	<?php  } ?>
</select>