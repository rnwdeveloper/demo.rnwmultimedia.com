<label>Branch</label>
			<select class="form-control" name="b_ids[]" id="branch">
				<option value="">Select Branch</option>
				<?php foreach($branch as $ld) { ?>
				<option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
			<?php } ?>
											
			</select>