 <?php @$user_permission =  explode(",",@$_SESSION['user_permission']);
        @$branch_ids = explode(",",$_SESSION['branch_ids']);
        @$depart_ids = explode(",",$_SESSION['department_id']);
        
        ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<style type="text/css">
*   {outline:none;}
body,h1,h2,h3,h4,h5,h6,p,span,strong,em,ul,ol,li,a,button,input,select,option,textarea   {font-family: 'Poppins', sans-serif; font-size:13px;}
.content-wrapper    {height:100%;}
.content h3     {margin-top:0; font-family: 'Poppins', sans-serif;}
.right  {text-align:right;}
hr  {height:1px; opacity:0.5;}
.p-0    {padding: 0;}
.p-1    {padding:0 7px;}
.m-1    {margin:10px 0;}
.w-100  {width:100%;}
label {font-weight:normal;}
.btn {-webkit-transition:all 0.5s; -moz-transition:all 0.5s; -ms-transition:all 0.5s; -o-transition:all 0.5s; transition:all 0.5s;}
.btn-danger {background: #fc4b6c; border:none;}
.btn-primary {background: #7460ee; border:none;}
.btn-inverse, .btn-inverse:hover {background: #2f3d4a; color:white;}
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
.table-responsive {width:100%; display:block; margin-top:15px;}
.table>thead>tr>th {border:none;}
.color-table.primary-table thead th {background-color:#7460ee; color:#ffffff; font-weight:normal; border-right:1px solid rgba(255,255,255,0.25);}
.color-table.primary-table tbody td {background-color:#f2f4f8; border-right:1px solid rgba(255,255,255,1);}
.color-table.primary-table thead th:last-child,
.color-table.primary-table tbody td:last-child {border-right:none;}
@media (max-width:500px)
{
.modal-dialog {width:90%; margin:5%;}
.w-100  {width:100%;}
.m-1 {margin:5px 0;}
}
@media (min-width:500px) and (max-width:767px)
{
.modal-dialog {width:400px; margin:30px auto;}
.w-100  {width:100%;}
.m-1 {margin:7px 0;}
}
@media (max-width:991px)
{
.right  {text-align:left;}
.content    {}
}
@media (min-width: 768px)
{
.modal-dialog {width:750px;}
.w-100  {width:100%;}
}
</style>

<style>
    .note
{
    text-align: center;
    height: 40px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 40px;
}
.form-content
{
    padding: 2% 5% 2% 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>
  
  
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/fontawesome-stars.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/themes/bars-reversed.min.css" rel="stylesheet">
  
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

.checked {
  color: orange;
}
</style> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<div class="row">
    <?php if(!empty($msg)) { ?>
     	            <div class="col-md-12" >
     	        
     	        <div style="padding:2px 5px 2px 5px" id="yellow" class="box yellow bg-green"><?php echo $msg; ?></div>
     	    </div>
     	    <?php } ?>
    <div class="col-md-12">
        <div class="box box-primary" style="padding:0px 20px 20px 20px;">
            <div class="box-header with-border" >
              <h3 class="box-title">Demo Details</h3>
            </div>
            <div class="row">
            <div class="col-xs-12">

            <div class="row">


<div class="col-lg-12 text-right">
    	
<div class="btn-group">
    <a href="#">
	    <a onclick="goBack()" class="btn btn-sm btn-inverse">Back</a>
	</a>
</div>
 <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype']=="Receptionist" || $_SESSION['logtype']=="Counselor" || in_array("Edit=1",$user_permission)) {  ?>
<button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#demo">Edit Demo</button>
 <?php if(!empty($select_demo->enquiry_id)) { ?> 
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_edit">
     Edit Enquiry 
</button>
<?php } ?>

<?php } ?>


<?php if($_SESSION['logtype']=="Super Admin" || in_array("Discard=1",$user_permission)) {  ?>
<div class="btn-group">
    <a href="#" data-toggle="modal" type="" alt="default">
	    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_cancel" style="color:white;">Discard</button>
	</a>
</div>
<?php } ?>
	<!-- Modal -->
<div class="modal fade text-left" id="myModal_cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content" style="padding:15px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Discard Demo
</h4>
    </div>
     <form method="post" action="<?php echo base_url(); ?>Enquiry/discardDemo">
    <div class="modal-body">
    
    <div class="row">
       <input type="hidden" name="enquiry_id" value="<?php echo @$select_enquiry->enquiry_id; ?>">
        <input type="hidden" name="demo_id" value="<?php if(!empty($select_demo->demo_id)) { echo $select_demo->demo_id; } ?>">
        <div class="form-group">
          <label for="comment">Student Response::</label>
          <select class="form-control select2" name="enquiry_cancel_reason" required>
                <option value="">Select Response</option>
                <?php foreach($all_cancel_reason_list as $reason) { ?>
                <option value="<?php echo $reason->reasonName; ?>"><?php echo $reason->reasonName; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="comment">Reason/Comments:*:</label>
          <textarea required class="form-control" name="enquiry_trashed_reason" rows="5" id="comment"></textarea>
        </div>
        
        
        
        
    </div>
   
    </div>
    
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save" name="discard_submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
    </div>
    </form>
</div>
</div>
</div>
	




</div> 

 <?php if(!empty($select_demo->enquiry_id)) { ?> 
<!-- Modal -->
<div class="modal fade" id="myModal_edit"  role="dialog">
<div class="modal-dialog modal-lg" >
<div class="modal-content" style="padding:15px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Quick Edit: Student Personal Details</h4>
    </div>
    <form method="post" action="<?php echo base_url(); ?>Enquiry/demoView">
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="update_id" value="<?php if(!empty($select_enquiry->enquiry_id)) { echo $select_enquiry->enquiry_id; } ?>">
             <input type="hidden" name="demo_id" value="<?php if(!empty($select_demo->demo_id)) { echo $select_demo->demo_id; } ?>">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <?php @$namee = explode(" ",@$select_enquiry->enquiry_name); ?>
        <label>First Name:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" class="w-100" value="<?php if(!empty($namee[0])) { echo $namee[0]; } ?>" name="fname" placeholder="First Name" required />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Last Name:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" class="w-100" value="<?php if(!empty($namee[1])) { echo $namee[1]; } ?>" name="lname" placeholder="Last Name" required/>
    </div>
</div>
</div>

        <div class="row">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Email:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" value="<?php if(!empty($select_enquiry->enquiry_email)) { echo $select_enquiry->enquiry_email; } ?>" name="enquiry_email" class="w-100" />
    </div>
</div>
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Mobile No:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <input type="text" value="<?php if(!empty($select_enquiry->enquiry_number)) { echo $select_enquiry->enquiry_number; } ?>" name="enquiry_number" class="w-100" />
    </div>
</div>
</div>

        <div class="row">

<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>City:*</label>
    </div>
    <div class="col-md-5 m-1 p-1">
       
        <select class="form-control select2" name="enquiry_city">
            <option value="">Select City</option>
            <?php foreach($all_city as $val) { ?>
            <option <?php if(@$select_enquiry->enquiry_city==$val->city_name)  { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
            <?php }  ?>
        </select>
    </div>
    
    
</div>
<div class="col-md-6 p-0">
        <div class="col-md-6 m-1 p-1 right">
            <label>Area:*</label>
        </div>
        <div class="col-md-5 m-1 p-1">
            <select class="w-100" name="enquiry_area">
            <option value="">Select area</option>
            <?php foreach($all_area as $val) { ?>
            <option <?php if(@$select_enquiry->enquiry_area==$val->area_name)  { echo "selected"; } ?>  value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>
            <?php }  ?>
        </select>
         </div>
    </div>
</div>

        <div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Enquiry Course Type:</label>
    </div>
    <div class="col-md-9 m-1 p-1">
        <label class="radio">Regular Courses
            <input type="radio" name="enquiry_course_type" value="Single Course" <?php if($select_enquiry->enquiry_course_type=="Single Course") { echo "checked"; } ?>  onclick="whichSelect(1)">
            <span class="checkmark"></span>
        </label>
        <label class="radio">Courses Packages
            <input type="radio" name="enquiry_course_type" value="Package" <?php if($select_enquiry->enquiry_course_type=="Package") { echo "checked"; } ?> onclick="whichSelect(2)">
            <span class="checkmark"></span>
        </label>
    </div>
</div>

        <div class="row" id="selectoption">
        <?php if($select_enquiry->enquiry_course_type=="Single Course") { ?>    
   <div class="row" id="rcourse">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Category:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" name="enquiry_category" id="enquiry_category" onChange="selectCorP(1)" >
            <option value="">Select Course Category</option>
            <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
            <option <?php if(@$select_enquiry->enquiry_category==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0" id="singlec">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 " id="getcourse" onChange="addCourse()" id="getcourse" rquired>
            <option value="">Select Course</option>
            <?php foreach($all_course as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_course_id==$val->course_id) { echo "selected"; } ?> value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div> 
<?php } else if($select_enquiry->enquiry_course_type=="Package") {  ?>
        <div class="row" >
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course Pkg Category:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" name="enquiry_category" id="enquiry_category" onChange="selectCorP(2)" >
            <option value="">Select Pkg Category</option>
            <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
            <option <?php if(@$select_enquiry->enquiry_category==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0" id="cpackage">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course Package:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" onChange="addPackage()" id="getpackage">
            <option value="">Select</option>
             <?php foreach($all_package as $val) { if($val->status=="0") { ?>
            <option <?php if(@$selectdata->lead_package_id==$val->package_id) { echo "selected"; } ?> value="<?php echo $val->package_id; ?>"><?php echo $val->package_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>
<?php } ?>

</div>
        <div class="row" id="showCourse" >
            <?php if($select_enquiry->enquiry_course_type=="Single Course") { 
            $cors = explode(",",$select_enquiry->enquiry_courseName); 
            for($i=0;$i<sizeof($cors);$i++) { ?>  
            <div class="col-sm-4" id="hel<?php echo $i; ?>">
                <div class="box box-success box-solid" style="padding:0px;">
                    <div class="box-header" style="padding:0px 0px 0px 5px;">
                        <h6 ><?php echo $cors[$i]; ?><input type="hidden" name="enquiry_courseName[]" value="<?php echo $cors[$i]; ?>"></h6>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" onclick="removeCourse('hel<?php echo $i; ?>')"><i class="fa fa-times"></i></button>
                        </div> 
                    </div> 
                </div> 
            </div>
            
            <?php } } ?>
            
            <?php if($select_enquiry->enquiry_course_type=="Package") { 
            $pack = explode(",",$select_enquiry->enquiry_packageName); 
            for($i=0;$i<sizeof($pack);$i++) { ?>  
            <div class="col-sm-4" id="hel<?php echo $i; ?>">
                <div class="box box-success box-solid" style="padding:0px;">
                    <div class="box-header" style="padding:0px 0px 0px 5px;">
                        <h6 ><?php echo $pack[$i]; ?><input type="hidden" name="enquiry_packageName[]" value="<?php echo $pack[$i]; ?>"></h6>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" onclick="removeCourse('hel<?php echo $i; ?>')"><i class="fa fa-times"></i></button>
                        </div> 
                    </div> 
                </div> 
            </div>
            
            <?php } } ?>
            
            
        </div>





        <div class="row">

<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Source Type:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 " name="enquiry_sourceType" required>
            <option  value="">Select Source Type</option>
           <?php foreach($all_source as $val) { if($val->source_status=="0" || $val->source_status=="2") { ?>
            <option <?php if(!empty($select_enquiry->enquiry_sourceType)) { if($select_enquiry->enquiry_sourceType==$val->source_name) { echo "selected"; } } ?>  value="<?php echo $val->source_name; ?>"><?php echo $val->source_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>



        <div class="row">
    <div class="col-md-3 m-1 p-1 right">
        <label>Referred By (Name & Mobile):</label>
    </div>
    <div class="col-md-5 m-1 p-1">
        <input type="text" class="w-100" name="enquiry_referredByName" value="<?php if(!empty($select_enquiry->enquiry_referredByName)) { echo $select_enquiry->enquiry_referredByName; } ?>" placeholder="Name" />
    </div>
    <div class="col-md-4 m-1 p-1">
        <input type="text" class="w-100" name="enquiry_referredByMobile" value="<?php if(!empty($select_enquiry->enquiry_referredByMobile)) { echo $select_enquiry->enquiry_referredByMobile; } ?>" placeholder="Mobile" />
    </div>
</div>
    </div>
    
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save" name="submit_edit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
    </div>
    </form>
</div>
</div>
</div>
<?php } ?>
<div class="clearfix"></div>       
</div>

    <div id="demo" class="collapse" style="margin:20px">
    <div class="register-form">
            <form method="post" action="<?php echo base_url(); ?>Enquiry/demoView">
                <div class="form">
                <div class="note">
                    <p>Edit Demo.</p>
                </div>
               
               
               
                  
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="demo_id" value="<?php echo $select_demo->demo_id; ?>">
                                <input type="text" name="demoDate" placeholder="Enter Stating Demo Date" id="date_selected" class="form-control datepicker" value="<?php if(!empty($select_demo->demoDate)) { echo $select_demo->demoDate;  } ?>" required >
                            </div>
                           
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                               
                                <input type="text" name="name" placeholder="Enter Name"  class="form-control" value="<?php if(!empty($select_demo->name)) { echo $select_demo->name;  } ?>" required >
                            </div>
                           
                        </div>
                        
                         <div class="col-md-12">
                            <div class="form-group">
                               
                                <input type="text" name="mobileNo" placeholder="Enter Mobile No"  class="form-control" value="<?php if(!empty($select_demo->mobileNo)) { echo $select_demo->mobileNo;  } ?>" required >
                            </div>
                           
                        </div>
                      
                        <div class="col-md-12">
                            <div class="form-group">
                                <select class="form-control" required name="branch_id">
                                    <option value="">select Branch</option>
                                 <?php   foreach($all_branch as $val) { if($val->branch_status=="0") {  ?>
                                    <option <?php if($select_demo->branch_id==$val->branch_id) { echo "selected"; }?> value="<?php echo $val->branch_id; ?>"> <?php echo $val->branch_name; ?></option>
                                    <?php } }?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 m-1 p-1 right">
                                <label>Course Type:</label>
                            </div>
                            <div class="col-md-9 m-1 p-1">
                                <label class="radio">Regular Courses
                                    <input type="radio" name="demo_course_type" value="Single Course" <?php if($select_demo->course_type=="Single Course") { echo "checked"; } ?>  onclick="whichSelectDemo(1)">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio">Courses Packages
                                    <input type="radio" name="demo_course_type" value="Package" <?php if($select_demo->course_type=="Package") { echo "checked"; } ?> onclick="whichSelectDemo(2)">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        
                          <div class="row" id="selectoptiondemo">
        <?php if($select_demo->course_type=="Single Course") { ?>    
   <div class="row" id="rcourse">
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Category:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" name="department" id="demo_category" onChange="selectCorPDemo(1)" >
            <option value="">Select Course Category</option>
            <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
            <option <?php if(@$select_demo->department_id==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0" id="singlecdemo">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 " name="courseName" rquired>
            <option value="">Select Course</option>
            <?php foreach($all_course as $val) { if($val->status=="0") { ?>
            <option  <?php if(@$select_demo->startingCourse==$val->course_name) { echo "selected"; } ?> value="<?php echo $val->course_name; ?>"><?php echo $val->course_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div> 
<?php } else if($select_demo->course_type=="Package") {  ?>
        <div class="row" >
<div class="col-md-6 p-0">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course Pkg Category:</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100" name="department" id="demo_category" onChange="selectCorPDemo(2)" >
            <option value="">Select Pkg Category</option>
            <?php foreach($all_department as $val) { if($val->depart_status=="0") { ?>
            <option <?php if(@$select_demo->department_id==$val->department_id) { echo "selected"; } ?> value="<?php echo $val->department_id; ?>"><?php echo $val->department_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="col-md-6 p-0" id="cpackagedemo">
    <div class="col-md-6 m-1 p-1 right">
        <label>Course Package:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
        <select class="w-100 select2" name="packageName" id="packageNamedemo" onChange="select_package_course_demo()">
            <option value="">Select</option>
             <?php foreach($all_package as $val) { if($val->status=="0") { ?>
            <option <?php if(@$select_demo->packageName==$val->package_name) { echo "selected"; } ?> value="<?php echo $val->package_name; ?>"><?php echo $val->package_name; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>
</div>
        
<?php } ?>

</div>
                       
                        <div  class="col-md-12"> 
                             <div class="form-group" id="pk_course_demo">
                                 
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <select class="form-control select2" required name="faculty_id" id="faculty" style="width: 100%;" onChange="selecttime()">
                              <option value="">Assign To</option>
                              <?php foreach($all_faculty as $row) { 
                                      
                                  
                                      
                                      
                                      
                                      @$bids = explode(",",@$row->branch_ids);
                                       $bname="";
                                      for($i=0;$i<sizeof(@$bids);$i++)
                                        {
                                            foreach($all_branch as $val) {   
                                                if($val->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$val->branch_name;}else { $bname = $bname." & ".$val->branch_name; } }
                                            }
                                        }
                              ?>
                              <option <?php if(@$select_demo->faculty_id==$row->faculty_id) { echo "selected"; } ?>  value="<?php echo $row->faculty_id; ?>"><?php echo $row->name; ?> -  <?php echo $bname; ?> </option>
                             	<?php  } ?> 
                            </select>  
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" value="<?php if(!empty($select_demo->fromTime)) { echo $select_demo->fromTime;  } ?>" name="fromTime" id="fromTime" placeholder="Select Start Time"  class="form-control timepicker" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" value="<?php if(!empty($select_demo->toTime)) { echo $select_demo->toTime;  } ?>" name="toTime" id="toTime" class="form-control timepicker" placeholder="Select End Time" required>
                            </div>
                        </div>
                        
                       
                        
                        
                    </div>
                    <input type="submit" name="submit_demo_edit" class="btnSubmit" value="Update" />
                    <button type="button" class="btnSubmit" data-toggle="collapse" data-target="#demo">Cancel</button>
                   
                </div>
            </div>
            </form>
        </div>
</div>

<hr noshade="noshade"/>
<?php if(!empty($select_demo->enquiry_id)) { ?>
<div class="row">
<!-- row start -->
<div class="col-xs-12">
    <h4>Personal Details:</h4>
</div>
<div class="clearfix"></div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Name:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_enquiry->enquiry_name; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Email:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_enquiry->enquiry_email; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Mobile:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_enquiry->enquiry_number; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>City:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_enquiry->enquiry_city; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Area:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_enquiry->enquiry_area; ?></span>
    </div>
</div>
<div class="clearfix"></div>
<!-- row close -->
</div>

<div class="row">
<!-- row start -->
<div class="col-xs-12">
    <h4>Enquiry Details:</h4>
</div>
<div class="clearfix"></div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Enq ID:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_enquiry->enq_id."/".$select_enquiry->enquiry_id; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Department:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span>
        <?php
        foreach($all_department as $depart) { if($depart->department_id==$select_enquiry->enquiry_category){ echo $depart->department_name; } }
        ?>
        </span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Branch:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span>
            <?php
        foreach($all_branch as $val) { if($val->branch_id==$select_enquiry->enquiry_branch){ echo $val->branch_name; } }
        ?>
        </span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Source Type:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_enquiry->enquiry_sourceType; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Course:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_enquiry->enquiry_courseName; ?>
        <?php echo @$select_enquiry->enquiry_packageName; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Enq Date:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_enquiry->enquiry_timestamp; ?></span>
    </div>
</div>
<div class="col-md-4 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Enquired By:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_enquiry->enquiry_addedBy ?></span>
    </div>
</div>

<div class="clearfix"></div>
<!-- row close -->
</div>
<?php  } ?>

<div class="row">
<!-- row start -->
<div class="col-xs-12">
    <h4>Demo Details:</h4>
</div>
<div class="clearfix"></div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Demo ID :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_demo->demo_id; ?></span>
    </div>
</div>

<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Name :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_demo->name; ?></span>
    </div>
</div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Mobile No :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_demo->mobileNo; ?></span>
    </div>
</div>
<?php if($select_demo->course_type=="Single Course") { ?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Demo Course:</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_demo->courseName; ?></span>
    </div>
</div>
<?php } ?>
<?php if($select_demo->course_type=="Package") { ?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Demo Course Package:</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_demo->packageName; ?></span>
    </div>
</div>
<?php } ?>

<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-6 col-xs-4 p-1 m-1 text-right">
        <span>Demo Stating Course :</span>
    </div>
    <div class="col-sm-6 col-xs-8 p-1 m-1">
        <span><?php echo @$select_demo->startingCourse; ?></span>
    </div>
</div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Demo Date:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1">
        <span><?php echo @$select_demo->demoDate; ?></span>
    </div>
</div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Demo Time:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo @$select_demo->fromTime." To ".$select_demo->toTime; ?></span>
    </div>
</div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Faculty Name:</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php foreach($all_faculty as $row) { if($row->faculty_id==$select_demo->faculty_id) { echo @$row->name; } } ?></span>
    </div>
</div>

<?php
 $Pday=0; $Aday=0;
					$all_att = explode("&&",$select_demo->attendance);
					
					for($i=0;$i<sizeof($all_att);$i++)
					{
						$att = explode("/",$all_att[$i]);
						if(@$att[1]=="P")
						{
							$Pday++;	
						}
						if(@$att[1]=="A")
						{
							$Aday++;	
						}
						
						
					}
					if($select_demo->attendance=="") { $Pday=0; $Aday=0;} 
				
?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Total Attendance :</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo "P : ".$Pday; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span><?php echo "A : ".$Aday; ?></span>
    </div>
</div>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Demo Status :</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
    <?php if($select_demo->discard==0) { ?>
     <?php if($select_demo->demoStatus==0) { ?>   <small class="label bg-blue">Running</small>  <?php } ?>
     <?php if($select_demo->demoStatus==1) { ?>   <small class="label bg-green">Done</small>  <?php } ?>
      <?php if($select_demo->demoStatus==2) { ?>   <small class="label bg-yellow">Leave</small>  <?php } ?>
       <?php if($select_demo->demoStatus==3) { ?>   <small class="label bg-red">Cancel</small>  <?php } ?>
       <?php } 
       if($select_demo->discard==1) { ?>
       <small class="label bg-red">Discard</small>
       <?php } ?>
        
    </div>
</div>
<?php if(!empty($select_demo->cancel_reason) && $select_demo->demoStatus==3) { ?>
<div class="col-md-6 col-sm-6 p-0">
    <div class="col-sm-4 col-xs-4 p-1 m-1 text-right">
        <span>Cancel Reason :</span>
    </div>
    <div class="col-sm-8 col-xs-8 p-1 m-1 text-uppercase">
        <span><?php echo $select_demo->cancel_reason; ?></span> 
       
    </div>
</div>
<?php } ?>
<div class="clearfix"></div>
<!-- row close -->
</div>
<hr noshade="noshade"/>
<div class="row">
    <div class="col-xs-6">
    <h4>Demo Remarks :</h4>
    </div>
    <div class="col-xs-6">
    <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal_Remarks">Add Remarks</button>
    </div>
    
     <!-- Modal -->
  <div class="modal fade" id="myModal_Remarks" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Remarks</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url(); ?>Enquiry/demoView">
            <div class="form-group">
              <label for="comment">Comment:</label>
                <input type="hidden" name="demo_id"  value="<?php echo $select_demo->demo_id; ?>">
              <textarea class="form-control" name="demo_remark_comment" rows="5" id="comment"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" value="Save" name="submit_remark" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    
    <div class="clearfix"></div>
    <div class="table-responsive">          
        <table class="table">
    <thead>
      <tr>
        <th>Remark Date And Time</th>
        <th>Comment</th>
        <th>By</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($select_remarks as $val) { ?>
      <tr>
        <td><?php echo $val->demo_remark_date; ?></td>
        <td><?php echo $val->demo_remark_comment; ?></td>
        <td><?php echo $val->demo_remark_by; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>                                               
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
    <h4>Demo Attendance Details :</h4>
    </div>
    <div class="clearfix"></div>
    <div class="table-responsive">          
                                                              <table class="table color-table primary-table table-striped">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>Attendance</th>
                                                                    <th>Mark by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <?php $all_att = explode("&&",$select_demo->attendance);
                                                                 for($i=0;$i<sizeof($all_att);$i++)
    									                        {
    														        $att = explode("/",$all_att[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$att[0]; ?></td>
                                                                    <td><?php echo @$att[1]; ?></td>
                                                                    <td><?php echo @$att[2] ?></td>
                                                                    <td><?php echo @$att[3] ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
</div>
<div class="row">
    <div class="col-xs-6">
    <h4>Demo follow up Details :</h4>
    </div>
    <div class="clearfix"></div>
    <div class="table-responsive">          
                       <table class="table color-table primary-table table-striped">
                                                                <thead>
                                                                  <tr>
                                                                    
                                                                    <th>Date</th>
                                                                    <th>follow up</th>
                                                                    <th>follow by</th>
                                                                    <th>Time</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                    
                                                                 <?php
                                                                 @$all_re = explode("&&",$select_demo->reason);
                                                                 for($i=0;$i<sizeof(@$all_re);$i++)
    									                        {
    														        @$res = explode("|/|",@$all_re[$i]);
    														    ?>   
                                                                  <tr>
                                                                    <td><?php echo @$res[0]; ?></td>
                                                                    <td><?php echo @$res[1]; ?></td>
                                                                    <td><?php echo @$res[2]; ?></td>
                                                                    <td><?php echo @$res[3]; ?></td>
                                                                   
                                                                  </tr>
                                                                  <?php } ?>
                                                                </tbody>
                                                              </table>
                                                              </div>
</div>

<hr noshade="noshade"/>
  <?php if(!empty($select_demo->enquiry_id)) { ?> 
<div class="row">
<!-- row start -->
<div class="col-xs-6">
    <h4>Enquiry Follow Up History :</h4>
</div>
<div class="col-xs-6">
    <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal_add_followup">
     Add Follow Up
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal_add_followup"  role="dialog">
<div class="modal-dialog modal-lg" >
<div class="modal-content" style="padding:15px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Follow Up</h4>
    </div>
    <form method="post" action="<?php echo base_url(); ?>Enquiry/add_followup">
    <div class="modal-body">
        <h3>Follow Up</h3>
        <input type="hidden" name="enquiry_id" value="<?php echo $select_enquiry->enquiry_id; ?>">
        <input type="hidden" name="demo_id" value="<?php echo $select_demo->demo_id; ?>">
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
    <div class="col-md-6 m-1 p-1 right" >
        <label>Interest Rating:*</label>
    </div>
    <div class="col-md-6 m-1 p-1">
         <select class="ex" name="follwup_interestRating" required>
             <option value=""></option>
             <?php  for($i=1;$i<=5;$i++) { ?>
           <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
           <?php } ?>
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
        </div>
        
        <div class="row">
        
            <div class="col-md-3 m-1 p-1 right">
                <label>Next Followup Date And time:* </label>
            </div>
            <div class="col-md-9 m-1 p-1">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text'  class="form-control" name="enquiry_next_followp" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
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
    </div>
    
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save" name="submit_followup">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
    </div>
    </form>
</div>
</div>
</div>

<div class="clearfix"></div>

<div class="clearfix"></div>
<div class="table-responsive">
    
<table class="table color-table primary-table table-striped">
<thead>
<tr>
    <th>Date</th>
	<th>Next FollowUp Date-Time</th>
	<th>Followup By</th>
	<th>Comments</th>
	<th>Student Response</th>
	<th>Interest Level</th>
	<th>Followup Action</th>
	<th>Followup Mode</th>
	<th>Edit</th>
</tr>
</thead>

<tbody>
    <?php foreach($select_followup as $row) { ?>
<tr>
    <td><?php echo $row->follwup_date; ?></td>
    <td><?php echo $row->next_followup; ?></td>
    <td><?php echo $row->follwup_by; ?></td>
    <td><?php echo $row->follwup_comment; ?></td>
    <td><?php echo $row->follwup_studentResponse; ?></td>
    <td>
                    
                 <span class="fa fa-star <?php if($row->follwup_interestRating>=1) { echo "checked"; } ?>"></span>
                <span class="fa fa-star <?php if($row->follwup_interestRating>=2) { echo "checked"; } ?>"></span>
                <span class="fa fa-star <?php if($row->follwup_interestRating>=3) { echo "checked"; } ?>"></span>
                <span class="fa fa-star <?php if($row->follwup_interestRating>=4) { echo "checked"; } ?>"></span>
                <span class="fa fa-star <?php if($row->follwup_interestRating>=5) { echo "checked"; } ?>"></span>
                 <br>
        
        <?php echo $row->follwup_interestLevel; ?></td>
    <td><?php echo $row->follwup_action; ?></td>
    <td><?php echo $row->follwup_mode; ?></td>
    <td>
        <?php if($select_enquiry->enquiry_next_followp==$row->next_followup) { ?>
        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row->follwup_id; ?>">Edit</button>
        <?php } ?></td>
     <?php if($select_enquiry->enquiry_next_followp==$row->next_followup) { ?>
    <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $row->follwup_id; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Followup</h4>
        </div>
        <form method="post" action="<?php echo base_url(); ?>Enquiry/demoView/">
            <div class="modal-body">
             <h3>Follow Up</h3>
            <input type="hidden" name="update_id" value="<?php echo $row->follwup_id; ?>">
             <input type="hidden" name="demo_id" value="<?php echo $select_demo->demo_id; ?>">
            <input type="hidden" name="enquiry_id" value="<?php echo $select_enquiry->enquiry_id; ?>">
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="col-md-6 m-1 p-1 right">
                <label>Interest Level:*</label>
            </div>
            <div class="col-md-6 m-1 p-1">
                <select class="w-100 select2" required name="follwup_interestLevel">
                    <option value="">Select</option>
                     <?php foreach($all_list_interest_level as $val) { ?>
                    <option <?php if($row->follwup_interestLevel==$val->interest_level_name) { echo "selected"; } ?> value="<?php echo $val->interest_level_name; ?>"><?php echo $val->interest_level_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-6 p-0">
            <div class="col-md-6 m-1 p-1 right">
                <label>Interest Rating:*</label>
            </div>
            <div class="col-md-6 m-1 p-1">
                 <select  name="follwup_interestRating" required>
                     <option value="">Rating</option>
                     <?php for($i=1;$i<=5;$i++) { ?>
                   <option <?php if($row->follwup_interestRating==$i) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                   <?php } ?>
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
                <option  <?php if($row->follwup_studentResponse==$val->student_response_name) { echo "selected"; } ?> value="<?php echo $val->student_response_name; ?>"><?php echo $val->student_response_name; ?></option>
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
                <option <?php if($row->follwup_action==$val->followup_action_name) { echo "selected"; } ?> value="<?php echo $val->followup_action_name; ?>"><?php echo $val->followup_action_name; ?></option>
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
                <option <?php if($row->follwup_mode==$val->follow_up_mode_name) { echo "selected"; } ?> value="<?php echo $val->follow_up_mode_name; ?>"><?php echo $val->follow_up_mode_name; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    </div>
    
    <div class="row">
    
        <div class="col-md-3 m-1 p-1 right">
            <label>Next Followup Date And time:* </label>
        </div>
        <div class="col-md-9 m-1 p-1">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' value="<?php echo $row->next_followup; ?>" class="form-control" name="enquiry_next_followp" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
        </div>
    
    
    </div>
    
    <div class="row">
        <div class="col-md-3 m-1 p-1 right">
            <label>Comments:* </label>
        </div>
        <div class="col-md-9 m-1 p-1">
            <textarea class="w-100" name="follwup_comment" required><?php echo $row->follwup_comment; ?></textarea>
        </div>
    </div>
    
    
    
    <hr noshade="noshade"/>
            </div>
            <div class="modal-footer">
             
              <input type="submit" class="btn btn-primary" value="Save" name="submit_followup_edit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<!-- row close -->
</div>
<?php } ?>
</div>
            </div>
    </div>
    </div>
    
    
    <div class="col-md-12">
                	    <div class="container" id="showtime">
                                 
                                  <!-- Modal -->
                      </div>           
                          
                     </div>
                     
                     
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
  
 
	 
    
<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright©2018 Red & White Multimedia.</strong> All rights reserved.
</footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>



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

<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- DataTables -->
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
<!-- page script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.1/jquery.barrating.min.js"></script>
<!-- page script -->
<script>
    // jQuery / jQuery Bar Rating
  // FontAwesome / Bootstrap / jBR plugin

  $(function() {
    $('.ex').barrating({
      theme: 'fontawesome-stars'
    });
  });

 
</script>



<script>
function selecttime()
	{
			var faculty_id = $('#faculty').val();
			var courseName = $('#courseName').val();
			var demo_date = $('#date_selected').val();
			if(faculty_id!="")
			{
				$.ajax({
					url : '<?php echo base_url(); ?>Enquiry/checkTime',
					type:"post",
					
					data:{
						'faculty_id':faculty_id,
						'courseName':courseName,
						'demo_date':demo_date
						},
						success: function(data)
						{
							
							
							$('#showtime').html(data);
							$('#myModal').modal("show");
							
						}
					});
				
			}
	}
	
	
	function setTime(time_id)
	{
	    var stime = $('#stimes'+time_id).val();
	    var etime = $('#etimes'+time_id).val();
	   
	    $('#fromTime').val(stime);
	    $('#toTime').val(etime);
	    
	    $('#myModal').modal("hide");
	   
	}

function select_faculty()
	{
	    
	    var branch_id = $('#branch_id').val();
	   
               var course = $('#courseName').val();
               
               if(course!="")
               {
            	   $.ajax({
            			url:'<?php echo base_url(); ?>Enquiry/filter_faculty',
            			type:"post",
            			data:{
            				'course_name' : course,
            				'branch_id' : branch_id
            				},
            				
            			success: function(data)
            			{
            				$('#display_faculty').html(data);
            			}
            		});
               }
	   
	    
	}
	
	
    function select_package_course()
	{
	    
	    
            var packages = $('#packageName').val();
            if(packages!="")
            {
            	   $.ajax({
            			url:'<?php echo base_url(); ?>Enquiry/filter_package_course',
            			type:"post",
            			data:{
            				'package_name' : packages
            				
            				},
            				
            			success: function(data)
            			{
            				$('#pk_course').html(data);
            			}
                });  
            }
	    
	}
	
	function select_package_course_demo()
	{
	    
	    
            var packages = $('#packageNamedemo').val();
            if(packages!="")
            {
            	   $.ajax({
            			url:'<?php echo base_url(); ?>Enquiry/filter_package_course_demo',
            			type:"post",
            			data:{
            				'package_name' : packages
            				
            				},
            				
            			success: function(data)
            			{
            				$('#pk_course_demo').html(data);
            			}
                });  
            }
	    
	}
</script>

<script>
    
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
  }
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
    function selectCorPDemo(st)
    {
        var depart = $('#demo_category').val();
             $.ajax({
                url:'<?php echo base_url(); ?>Enquiry/getCrsPkgDemo',
                type:'post',
                data:{
                    'status':st,
                    'department_id':depart
                },
                success: function(data)
                {
                    if(st==1)
                    {
                        $('#singlecdemo').html(data);
                    }
                    if(st==2)
                    {
                        $('#cpackagedemo').html(data);
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
                   //  document.getElementById("getcourse").required= false;
                   for(var j=0;j<=10;j++)
                    {
                                
                                $('#hel'+j).remove();
                    }
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
                   // document.getElementById("getpackage").required= false;
                   for(var j=0;j<=10;j++)
                    {
                                
                                $('#hel'+j).remove();
                    }
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
    
    function whichSelectDemo(wh)
    {
                
        $.ajax({
            url:'<?php echo base_url(); ?>Enquiry/getcontentDemo',
            type:'post',
            data:{
                'status':'courseType',
                'wh':wh
            },
            success: function(data)
            {
                $('#selectoptiondemo').html(data);
              //  $('.select2').select2()
            }
        });
    }
    
</script>

<script>

function goBack() {
  window.history.back();
}



 //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
	   defaultTime: false
    })
    
    
//Date picker
    $('.datepicker').datepicker({
      autoclose: true,
        todayHighlight: true,
	  format:"yyyy-mm-dd"
    })
    
     $(".datepicker" ).datepicker("show");


$(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
                });
            });
            
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
