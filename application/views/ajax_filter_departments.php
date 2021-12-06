



<?php foreach($department as $d) { ?>

<label>Department</label>

			<select class="form-control" name="depart_ids[]" id="department">

				<option value="">Select Department</option>

				<?php foreach($d as $ld) { ?>

				<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>

			<?php } ?>

											

			</select>

<?php } ?>