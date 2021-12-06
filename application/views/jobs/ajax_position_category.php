 <option value=''>--select--</option>
                    <?php foreach($jmPosition as $jmp) { ?>
                    <option value="<?php echo $jmp->job_position; ?>"><?php echo $jmp->job_position; ?></option>

                    <?php } ?>