
<?php for($i=0; $i<sizeof($match_data); $i++) { ?>
<div class="col-lg-2">
    <div class="form-group text-center">
        <label><strong>#Sem</strong></label>
        <p><?php echo $match_data[$i]->semester; ?></p>
        <input class="form-control" type="hidden" id="semester" name="semester[]" value="<?php echo $match_data[$i]->semester; ?>">
    </div>
</div>
<div class="col-lg-3">
    <div class="form-group">
    <label for="pwd">Sem Date:</label>
        <input class="form-control" type="text" id="sem_date" name="sem_date[]" value="<?php echo $match_data[$i]->sem_date; ?>" placeholder="Select Date" required readonly>
    </div>
</div>
<div class="col-lg-2">
    <div class="form-group">
    <label for="pwd">Sem Fees:</label>
        <input class="form-control" type="text" id="sem_fees" name="sem_fees[]" value="<?php echo $match_data[$i]->sem_fees; ?>" placeholder="Enter Fees" required readonly>
    </div>
</div>
<div class="col-lg-3">
    <div class="form-group">
    <label for="pwd">Exam Date:</label>
        <input class="form-control" type="text" id="exam_date" name="exam_date[]" value="<?php echo $match_data[$i]->exam_date; ?>" placeholder="Select Date" required readonly>
    </div>
</div>
<div class="col-lg-2">
    <div class="form-group">
    <label for="pwd">Exam Fees:</label>
    <input class="form-control" type="text" id="exam_fees" name="exam_fees[]" value="<?php echo $match_data[$i]->exam_fees; ?>" placeholder="Exam Fees" required readonly>
    </div>
</div>
<?php } ?>