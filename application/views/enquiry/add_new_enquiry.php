<?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);?>

<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<style type="text/css">
*   {outline:none;}
body,h1,h2,h3,h4,h5,h6,p,span,strong,em,ul,ol,li,a,button,input,select,option,textarea   {font-family: 'Poppins', sans-serif;}
.content-wrapper    {font-family: 'Poppins', sans-serif;}
.content-wrapper    {height:100%;}
.content h3     {margin-top:0; font-family: 'Poppins', sans-serif;}
.right  {text-align:right;}
label   {font-weight:normal; margin-bottom:0; line-height:30px;}
hr  {height:1px; opacity:0.5;}
textarea    {resize:none; padding:5px 25px; border-radius:70px; border:1px solid #dddddd; height:70px;}
.p-0    {padding: 0;}
.p-1    {padding:0 7px;}
.m-1    {margin:10px 0;}
.w-100  {width:100%;}
input[type="text"], input[type="email"], select   {border-radius:50px; padding:0 15px; height:30px; border:1px solid #dddddd; transition:all 0.5s;}
input:focus, textarea:focus, select:focus {border-color:#3c8dbc; box-shadow:0 0 20px white;}
.btn-success    {border-radius:25px; border:none; transition:all 0.5s;}
input::placeholder  {opacity:0.6;}
input[type=button], input[type=button]:hover  {background:#2f3d4a; color:white;}
.radio  {position:relative; display:inline-block; margin:0 15px 0 0; padding-left:30px; cursor:pointer;
-webkit-user-select:none; -moz-user-select:none; -ms-user-select:none; user-select:none;}
.radio input {position:absolute; opacity:0; cursor:pointer;}
.checkmark {position:absolute; top:5px; left:0; height:20px; width:20px; background-color:white; border-radius:50%; border:2px solid #bbbbbb;}
.radio:hover input ~ .checkmark {background-color:#ccc; border-color:#ccc;}
.radio input:checked ~ .checkmark   {background-color:#2196F3; border-color:#2196F3;}
.checkmark:after    {content:""; position:absolute; display:none;}
.radio input:checked ~ .checkmark:after {display:block;}
.radio .checkmark:after {top:4px; left:4px; width:8px; height:8px; border-radius:50%; background:white;}
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {border-radius:50px;}
@media (max-width:767px)
{
}

@media (max-width:991px)
{
.right  {text-align:left;}
.w-100  {width:50%;}
.content    {}
}
</style>


<style>
    .br-theme-bars-reversed .br-widget a {
  background-color: pink;
}

.br-theme-bars-reversed .br-widget a.br-active,
.br-theme-bars-reversed .br-widget a.br-selected {
  background-color: #ff446a;
}

.br-theme-bars-reversed .br-widget .br-current-rating {
  color: #ff446a;
  font-size: 20px;  
}
</style>  
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:auto; min-height:100%;">
      
<!-- Main content -->
<section class="content" style="height:auto; min-height:100%;">
<div class="row">
    
     <?php if(!empty($msg)) { ?>
     	            <div class="col-md-12" >
     	        
     	        <div style="padding:2px 5px 2px 5px" id="yellow" class="box yellow bg-green"><?php echo $msg; ?></div>
     	    </div>
     	    <?php } ?>
    
     
    
<div class="col-xs-12">
    <?php if(!empty($select_pre_enquiry)) { ?>
<div class="col-lg-12 col-xs-12">
    <div class="box box-primary" style="padding:10px;">
            <div class="box-header with-border" >
              <h3 class="box-title">Past Records</h3>
            </div>
            <?php if(!empty($select_pre_enquiry_lead)) { ?>
            <label>Lead Records:</label>
            <p>Lead date & time : <?php echo $select_pre_enquiry_lead->lead_timestamp; ?></p>
             
            <?php } ?>
            <label>Enquiry Records <a href="<?php echo base_url(); ?>Enquiry/enquiryView/<?php echo $select_pre_enquiry->enquiry_id; ?>">View</a></label>
            <p>Enquiry date & time : <?php echo $select_pre_enquiry->enquiry_timestamp; ?></p>
            <p>Equiry id : <?php echo $select_pre_enquiry->enq_id."/".$select_pre_enquiry->enquiry_id; ?></p>
           
          </div>
</div>
<?php } ?>

<div class="col-lg-10 col-xs-12">
<form method="post" action="<?php echo base_url(); ?>Enquiry/newEnquiry">
    <input type="hidden" value="<?php if(!empty($selectlead->lead_id)) { echo $selectlead->lead_id; } ?>" name="lead_id">
<h3>Basic Information</h3>

<?php if(!empty($selectlead->lead_timestamp)) { ?>
<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>lead Date & Time:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <label style="font-size: 13px;"><?php if(!empty($selectlead->lead_timestamp)) { echo $selectlead->lead_timestamp; } ?></label>
    </div>
</div>

</div>
<?php } ?>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Enquiry Date:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <label style="font-size: 13px;"><?php echo date("d-M-Y/D");  ?></label>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Enquiry Time:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
         <label style="font-size: 13px;"><?php echo date("h:i A"); ?></label>
    </div>
</div>
</div>
<?php if(!empty($selectlead->lead_name)) { $leadname = explode(" ",$selectlead->lead_name); } ?>
<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>First Name:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" class="w-100" value="<?php if(!empty($leadname[0])) { echo $leadname[0]; } ?>" name="fname" placeholder="First Name" required />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Last Name:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" class="w-100" value="<?php if(!empty($leadname[1])) { echo $leadname[1]; } ?>" name="lname" placeholder="Last Name" required/>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Email:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" name="enquiry_email" class="w-100" />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Mobile No:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" name="enquiry_number" class="w-100" />
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Branch:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" onChange="selectContent()" id="brans" name="enquiry_branch" required>
            <option value="">Select</option>
            <?php foreach($all_branch as $val) { if($val->branch_status=="0") { 
            if(in_array($val->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>
            <option  <?php if(@$selectdata->lead_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_id; ?>"><?php echo $val->branch_name; ?></option>
            <?php } } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-5 m-1 p-1">
       
        <select class="form-control select2" name="enquiry_city">
            <option value="">Select City</option>
            <?php foreach($all_city as $val) { ?>
            <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
            <?php }  ?>
        </select>
    </div>
    <div class="col-md-5 m-1 p-1">
        <select class="w-100" name="enquiry_area">
            <option value="">Select area</option>
            <?php foreach($all_area as $val) { ?>
            <option  value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
            <?php }  ?>
        </select>
    </div>
    <div class="col-md-2 m-1 p-1">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_area">Add</button>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Enquiry Course Type:</label>
    </div>
    <div class="col-md-9 m-1 p-1">
        <label class="radio">Regular Courses
            <input type="radio" name="enquiry_course_type" value="Single Course" checked onclick="whichSelect(1)">
            <span class="checkmark"></span>
        </label>
        <label class="radio">Courses Packages
            <input type="radio" name="enquiry_course_type" value="Package" onclick="whichSelect(2)">
            <span class="checkmark"></span>
        </label>
    </div>
</div>

<div class="row" id="selectoption">
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
        <select class="w-100 " id="getcourse" onChange="addCourse()"  required>
            <option value="">Select Course</option>
            <?php foreach($all_course as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_course_id==$val->course_id) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div> 
</div>
<div class="row" id="showCourse" >
</div>





<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Assigned To (User):*</label>
    </div>
    <div class="col-md-6 m-1 p-1" id="ass_user">
        <select class="w-100" name="enquiry_assignedUser">
            <option disable >select user</option>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Source Type:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 " name="enquiry_sourceType" required>
            <option value="">Select Source Type</option>
           <?php foreach($all_source as $val) { if($val->source_status=="0" || $val->source_status=="2") { ?>
            <option <?php if(!empty($selectlead->lead_source)) { if($selectlead->lead_source==$val->source_name) { echo "selected"; } } ?>  value="<?php echo $val->source_name; ?>"><?php echo $val->source_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>

<!--<div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Labels:</label>
    </div>
    <div class="col-md-9 m-1 p-1">
        <select class="w-100">
            <option>Choose</option>
            <option>Multimedia</option>
            <option>Fashion</option>
        </select>
    </div>
</div>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Country:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100">
            <option>Select Country</option>
            <option>India</option>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>State:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100">
            <option>Select State</option>
            <option>Gujarat</option>
        </select>
    </div>
</div>
</div>-->

<div class="row">
<!--<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>City:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100">
            <option>Select City</option>
            <option>Surat</option>
        </select>
    </div>
</div>-->
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>School:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" name="enquiry_school">
            <option>Select School/College</option>
            <?php foreach($all_list_school as $val) { ?>
            <option value="<?php echo $val->school_name; ?>"><?php echo $val->school_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Referred By (Name & Mobile):</label>
    </div>
    <div class="col-md-5 m-1 p-1">
        <input type="text" class="w-100" name="enquiry_referredByName" placeholder="Name" />
    </div>
    <div class="col-md-4 m-1 p-1">
        <input type="text" class="w-100" name="enquiry_referredByMobile" placeholder="Mobile" />
    </div>
</div>

<hr noshade="noshade"/>

<h3>Follow Up</h3>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Interest Level:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" required name="follwup_interestLevel">
            <option value="">Select</option>
             <?php foreach($all_list_interest_level as $val) { ?>
            <option value="<?php echo $val->interest_level_name; ?>"><?php echo $val->interest_level_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Interest Rating:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
         <select id="ex" name="follwup_interestRating" required>
             <option value=""></option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>  
         </select>
    </div>
</div>

</div>

<div class="row">
    <div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Student Response:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" name="follwup_studentResponse">
            <option>Select</option>
             <?php foreach($all_list_student_response as $val) { ?>
            <option value="<?php echo $val->student_response_name; ?>"><?php echo $val->student_response_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Followup Action:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" required name="follwup_action">
            <option value="">select</option>
            <?php foreach($all_list_followup_action as $val) { ?>
            <option value="<?php echo $val->followup_action_name; ?>"><?php echo $val->followup_action_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

</div>

<div class="row">
    <div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Follow Up Mode:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" name="follwup_mode">
            <option>Select</option>
            <?php foreach($all_list_follow_up_mode as $val) { ?>
            <option value="<?php echo $val->follow_up_mode_name; ?>"><?php echo $val->follow_up_mode_name; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Next Followup Date And time:* </label>
    </div>
    <div class="col-md-6 m-1 p-1">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text'  class="form-control" name="enquiry_next_followp" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    </div>
</div>

</div>

<div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Comments:* </label>
    </div>
    <div class="col-md-9 m-1 p-1">
        <textarea class="w-100" name="follwup_comment" required></textarea>
    </div>
</div>



<hr noshade="noshade"/>

<div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Send Email to Student:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <label class="radio">YES
            <input type="radio" name="enquiry_msg_email" value="Yes">
            <span class="checkmark"></span>
        </label>
        <label class="radio">NO
            <input type="radio" name="enquiry_msg_email" value="No">
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Send SMS to Student:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <label class="radio">YES
            <input type="radio" name="enquiry_msg_mobile" value="Yes">
            <span class="checkmark"></span>
        </label>
        <label class="radio">NO
            <input type="radio" name="enquiry_msg_mobile" value="No">
            <span class="checkmark"></span>
        </label>
    </div>
</div>
</div>

<hr noshade="noshade"/>

<div class="row">
<div class="col-xs-12 text-right">
    <input class="btn btn-success" type="submit" name="save_enquiry" value="Save">
    <input class="btn btn-success" type="button" value="Cancle">
</div>
</div>

</form>
</div>

</div>

<!-- Modal -->
  <div class="modal fade" id="myModal_area" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add area</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="<?php echo base_url(); ?>Enquiry/newEnquiry" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Country:</label>
      <div class="col-sm-10">
        <select class="form-control select2" name="country_name" style="width:100%;">
            <option value="">Select Country</option>
            <?php foreach($all_country as $val) { ?>
            <option <?php if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
            <?php }  ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">State:</label>
      <div class="col-sm-10">
       <select class="form-control select2" name="state_name" style="width:100%;">
            <option value="">Select State</option>
            <?php foreach($all_state as $val) { ?>
            <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
            <?php }  ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">City:</label>
      <div class="col-sm-10">
       <select class="form-control select2" name="city_name" style="width:100%;">
            <option value="">Select City</option>
            <?php foreach($all_city as $val) { ?>
            <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
            <?php }  ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Area:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Area" name="area_name">
      </div>
    </div>
    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" value="Save" name="submit_area">
      </div>
    </div>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
  
<div class="clearfix"></div> 
	 
    
<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright©2018 Red & White Multimedia.</strong> All rights reserved.
</footer>

  
</div>



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- DataTables -->
<!-- Select2 -->
<script src="<?php echo base_url(); ?>bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/jquery.barrating.min.js"></script>
<!-- page script -->
<script>
    // jQuery / jQuery Bar Rating
  // FontAwesome / Bootstrap / jBR plugin

  $(function() {
    $('#ex').barrating({
      theme: 'fontawesome-stars'
    });
  });

 
</script>
<script>
    function selectCorP(st)
    {
        var depart = $('#enquiry_category').val();
             $.ajax({
                url:'<?php echo base_url(); ?>Enquiry/getCrsPkg',
                type:'post',
                data:{
                    'status':st,
                    'department_id':depart
                },
                success: function(data)
                {
                    if(st==1)
                    {
                        $('#singlec').html(data);
                    }
                    if(st==2)
                    {
                        $('#cpackage').html(data);
                    }
                    
                }
            });
       
    }
</script>


<script>

    var kb=1;
    function removeCourse(dvid)
    {
       
       $('#'+dvid).remove();
       
    }
    
    
    
     function addCourse()
    {
        var course = $('#getcourse').val();
        $.ajax({
            url:'<?php echo base_url(); ?>Enquiry/select_single_course',
            type:'post',
            dataType:"JSON",
            data:{
                'course_id':course
               
            },
            success: function(data)
            {
               var e = $('<div class="col-sm-4" id="hello'+kb+'"><div class="box box-success box-solid" style="padding:0px;"><div class="box-header" style="padding:0px 0px 0px 5px;"><h6 >'+data.selectdata['course_name']+'<input type="hidden" name="enquiry_courseName[]" value="'+data.selectdata['course_name']+'"></h6><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removeCourse('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
                    $("#showCourse").append(e);
                    kb++;  
            }
        });
     }
     
     function addPackage()
    {
        var packa = $('#getpackage').val();
        $.ajax({
            url:'<?php echo base_url(); ?>Enquiry/select_package_course',
            type:'post',
            dataType:"JSON",
            data:{
                'package_id':packa
               
            },
            success: function(data)
            {
               var e = $('<div class="col-sm-4" id="hello'+kb+'"><div class="box box-success box-solid" style="padding:0px;"><div class="box-header" style="padding:0px 0px 0px 5px;"><h6 >'+data.selectdata['package_name']+'<input type="hidden" name="enquiry_packageName[]" value="'+data.selectdata['package_name']+'"></h6><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" onclick="removeCourse('+"'hello"+kb+"'"+')"><i class="fa fa-times"></i></button></div> </div> </div> </div>');
    
                    $("#showCourse").append(e);
                    kb++;  
            }
        });
     }
    
</script>
<script>
    function selectContent()
    {
        var brans = $('#brans').val();
        $.ajax({
            url:'<?php echo base_url(); ?>Enquiry/getcontent',
            type:'post',
            data:{
                'status':'getbranchwise',
                'branch_id':brans
            },
            success: function(data)
            {
                $('#ass_user').html(data);
            }
        });
    }
</script>

<script>
    
    function whichSelect(wh)
    {
        for(var j=1;j<=10;j++)
        {
                    
                    $('#hello'+j).remove();
        }
                
                
        $.ajax({
            url:'<?php echo base_url(); ?>Enquiry/getcontent',
            type:'post',
            data:{
                'status':'courseType',
                'wh':wh
            },
            success: function(data)
            {
                $('#selectoption').html(data);
              //  $('.select2').select2()
            }
        });
    }
    
</script>

<script>
$(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
            
            $('.datepicker1').datepicker({
      autoclose: true,
      todayHighlight: true,
	   format:"yyyy-mm-dd"
	  
	  
    })
            
            
//Initialize Select2 Elements
    $('.select2').select2()
    
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
