<?php if($status=="courseType") { ?>




<?php if($wh==1) { ?>
<div class="row" id="rcourse">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Category:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" name="enquiry_category" id="enquiry_category" onChange="selectCorP(1)" required>
            <option value="">Select Course Category</option>
            <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
            <option <?php if(@$selectdata->enquiry_category==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0" id="singlec">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" id="getcourse" onChange="addCourse()" required>
            <option value="">Select Course</option>
            <?php foreach($all_course as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_course_id==$val->course_id) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>
<?php } else if($wh==2) { ?>
<div class="row" >
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course Pkg Category:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" name="enquiry_category" id="enquiry_category" onChange="selectCorP(2)" required>
            <option value="">Select Pkg Category</option>
            <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
            <option <?php if(@$selectdata->enquiry_category==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0" id="cpackage">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course Package:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" onChange="addPackage()" id="getpackage" required>
            <option value="">Select</option>
             <?php foreach($all_package as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_package_id==$val->package_id) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>
<?php } ?>
<?php } ?>


<?php if($status=="getbranchwise") { ?>
        <select class="w-100" name="enquiry_assignedUser" required >
            <option value="">Select</option>
            <?php foreach($all_user as $val) { 
            $user_branch = explode(",",$val->branch_ids);
            if(in_array($branch_id,$user_branch)) {
            ?>
            <option value="<?php echo $val->user_id; ?>"><?php echo $val->email." (".$val->logtype." )"; ?></option>
            <?php } } ?>
        </select>
<?php } ?>



<script>


//session automatic  
    $(document).ready(function(){
        var submenu = sessionStorage.getItem("submenu");
         var leadsubmenu = sessionStorage.getItem("leadsubmenu");
           $('#sub_menu_'+submenu).addClass('show');
           $('#lead_submenu_'+leadsubmenu).addClass('show');
    });

    function getClick(id,subid){
      sessionStorage.setItem("submenu", id);
      sessionStorage.setItem("leadsubmenu", subid);
    }

    function hideMenu(id,subid){
      $("#sub_menu_"+id).removeClass('show');
      $("#lead_submenu_"+subid).removeClass('show');
    }
//end session of sidebar menu open 


    </script>