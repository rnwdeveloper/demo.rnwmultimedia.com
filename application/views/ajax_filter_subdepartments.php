
	<?php

	$i = 0;

	foreach ($subdepartment as $k => $v) { ?>

		<?php foreach ($v as $key => $val) { ?>

			<label>Sub Department</label>
			<?php foreach ($val as $ld) { ?>

				<option value="<?php echo $ld->subdepartment_id; ?>" 
					<?php
						if (isset($selected) && in_array($ld->subdepartment_id, explode(",", $selected))) {
							echo "selected";
						}
					?>>
					<?php echo $ld->subdepartment_name; ?>
				</option>

			<?php } ?>


<?php } ?>



<?php $i++;
	} ?>