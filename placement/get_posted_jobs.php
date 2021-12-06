<?php
include('db.php');
if(isset($_POST['job_id']))
{
	$id =  $_POST['job_id'];
	$query ="select * from job_post JOIN company_detail ON job_post.company_id=company_detail.company_id where `job_post`.`jobpost_id`='$id'";
	$query1 = mysqli_query($con,$query);
	$query2 = mysqli_fetch_array($query1);

}

?>
<div ><b>Company Name </b>: <span style="color:gray"><?php echo $query2['company_name']; ?></span></div>
<div ><b>Created Date </b>: <span style="color:gray"><?php echo $query2['created_date']; ?></span></div> 
<div ><b>Job Title </b>: <span style="color:gray"><?php echo $query2['job_name']; ?></span></div> 
<div ><b>Job Position</b>: <span style="color:gray"><?php echo $query2['position']; ?></span></div> 
<div ><b>Job Subcategory </b>: <span style="color:gray"><?php echo $query2['job_subcategory']; ?></span></div> 
<div ><b>No of Vacancy </b>: <span style="color:gray"><?php echo $query2['no_of_vacancy']; ?></span></div> 
<div ><b>Salary </b>: <span style="color:gray"><?php echo $query2['salary']; ?></span></div> 
<div ><b>Job Start Date</b>: <span style="color:gray"><?php echo $query2['start_date']; ?></span></div> 
<div ><b>Job End Date</b>: <span style="color:gray"><?php echo $query2['end_date']; ?></span></div> 
<div ><b>Job City</b>: <span style="color:gray"><?php echo $query2['city']; ?></span></div> 
<div ><b>Job Area</b>: <span style="color:gray"><?php echo $query2['job_area']; ?></span></div> 
<div ><b>Job Description</b>: <span style="color:gray"><?php echo $query2['job_description']; ?></span></div> 
 




