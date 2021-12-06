<?php 
   @$user_permission =  explode(",",@$_SESSION['user_permission']);
   @$branch_ids = explode(",",$_SESSION['branch_ids']);
   @$depart_ids = explode(",",$_SESSION['department_id']);
   
   if($_SESSION['logtype']=="Faculty"){
    //   echo $_SESSION['course_ids']; die();
       @$faculty_course_ids = explode(",",$_SESSION['course_ids']);
       @$faculty_package_ids = explode(",",$_SESSION['package_ids']);
   }
   ?>
<?php 

   $overdue=false;
   
   if($viewStatus=="as")  { $visible="all"; }
   if($viewStatus=="rd")  { $visible="0"; }
   if($viewStatus=="ord") { $visible="0"; $overdue = true; }
   if($viewStatus=="ld")  { $visible="2"; }
   if($viewStatus=="dd")  { $visible="1"; }
   if($viewStatus=="cd")  { $visible="3"; } 
   if($viewStatus=="cfd")  { $visible="4"; } 
   
     date_default_timezone_set("Asia/Calcutta");
     for($i = 1; $i <= 2; $i++){
         $display_sdate= date('Y-m-d', strtotime("-$i month"));
     }
   
     $display_edate = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>RNW</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container-fluid">
         <button class="btn btn-success" onclick="createExcel()">Download</button> 
         <a onclick="goBack()" class="btn btn-primary">Back</a>
         <form method="post" id="frm_data" action="<?php  echo base_url();?>Enquiry/download_excel">
            <input type="hidden" id="tb_data" name="data">  
         </form>
         <div id="leads_table">
            <table  class="table table-bordered">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Demo Id</th>
                     <th>Demo Status</th>
                     <th>Demo Name</th>
                     <th>Demo Mobile</th>
                     <th>Demo Attadance</th>
                     <th>Demo Date</th>
                     <th>Demo Time</th>
                     <th>Course</th>
                     <th>Branch Details</th>
                     <th>Faculty</th>
                     <th> Remarks</th>
                     <th> Last Follow-Up</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $no=1; foreach($demo_all as $val) {  if($val->discard=="0") {
                     if(in_array($val->branch_id,$branch_ids) && in_array($val->department_id,$depart_ids) || $_SESSION['logtype']=="Super Admin") {
                         if($visible=="all" || $visible==$val->demoStatus) {
                     
                         $isRelavent = false;    
                     
                         if($_SESSION['logtype']=="Faculty"){
                             if($val->course_type=="Single Course"){
                                 if(in_array($val->courseName,$faculty_course_ids)) { $isRelavent=true;   }
                             }

                             if($val->course_type=="Package"){
                                 if(in_array($val->packageName,$faculty_package_ids)) { $isRelavent=true;   }
                             }
                     
                             if(in_array($val->startingCourse,$faculty_course_ids)){ 
                                 $isRelavent=true;   
                             }
                         }
                 
                     
                if($isRelavent==true || $_SESSION['logtype']!="Faculty") {
                    $day=0;
                     
                     $all_att = explode("&&",$val->attendance);
                     
                     for($i=0;$i<sizeof($all_att);$i++){
                     $att = explode("/",$all_att[$i]);
                    
                     if(@$att[1]=="P"){
                        $day++; 
                       }
                     }
                         if($overdue==false || $day>=5) {
                     ?>
                  <tr>
                     <td><?php echo $no; ?></td>
                     <td><?php echo $val->demo_id; ?></td>
                     <td><?php if($val->demoStatus==0) { echo "Running"; } ?>
                        <?php if($val->demoStatus==1) { echo "Demo"; } ?>
                        <?php if($val->demoStatus==2) { echo "Leave"; } ?>
                        <?php if($val->demoStatus==3) { echo "Cancel"; } ?>
                     </td>
                     <td><?php echo $val->name;  ?> 
                     </td>
                     <td><?php  echo $val->mobileNo; ?></td>
                     <td> <?php  $day=0;
                        $all_att = explode("&&",$val->attendance);
                        for($i=0;$i<sizeof($all_att);$i++){
                          $att = explode("/",$all_att[$i]);
                          if(@$att[1]=="P"){
                            $day++; 
                          }
                        }
                        if($val->attendance=="") { $day=0; } 
                         echo $day;  ?>  
                     </td>
                     <td><?php echo $val->demoDate;  ?>  </td>
                     <td><?php echo $val->fromTime;  ?> To <?php echo $val->toTime;  ?> </td>
                     <td><?php if($val->course_type=="Package") { echo $val->packageName; } else { echo $val->courseName; }  ?> </td>
                     <td><?php  foreach($branch_all as $row) {  if($val->branch_id==$row->branch_id) {
                        echo $row->branch_name;  } } ?>
                     </td>
                     <td><?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) {   echo $row->name; } }  ?> </td>
                     <td><?php foreach($all_remarks as $row) { 
                        if($val->demo_id == $row->demo_id){
                          echo $row->demo_remark_comment;
                          echo "<br>";
                         }
                        }  ?> </td>
                     <td>  
                        <?php
                           @$all_re = explode("&&",$val->reason);
                           for($i=0;$i<sizeof(@$all_re);$i++)
                           {
                               @$res = explode("|/|",@$all_re[$i]);
                               $follow = @$res[1]." Follow-Up By :".@$res[2]." Follow-Up Time :".@$res[3];
                             }
                             echo $follow;
                           ?> 
                     </td>
                  </tr>
                  <?php $no++; } } } } }  } ?>
                  </tfoot>
            </table>
         </div>
      </div>
      <script>
         function createExcel(){
            var excel_data = $('#leads_table').html();  
            $('#tb_data').val(excel_data);
            $('#frm_data').submit();
         }
         
         function goBack() {
           window.history.back();
         }
      </script>
   </body>
</html>