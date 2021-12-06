<?php

$con  = mysqli_connect("localhost","mzfrxmujjb","Q23bQYkskc","mzfrxmujjb") or die("Db not connected");

$branch_data  ="select * from branch";
$branch_data1 = mysqli_query($con,$branch_data);

$course_data  ="select * from course";
$course_data1 = mysqli_query($con,$course_data);

$faculty_data  ="select * from faculty";
$faculty_data1 = mysqli_query($con,$faculty_data);

$app_job  = "select * from application_job";
$app_job1 = mysqli_query($con,$app_job);

$num = mysqli_num_rows($app_job1);
// $num = 199;
    if($num>0 && $num<10)
    {
      $app_no = "RWTP000".$num;
    }
    else if($num>=10 && $num <100)
    {

      $app_no = "RWTP00".$num;
    }
    else if($num>=100 && $num <1000)
    {
        $app_no = "RWTP0".$num;
    }
     else if($num>=1000 && $num <10000)
    {
        $app_no = "RWTP".$num;
    }



if(isset($_POST['submit']))
{
    $application_id = $_POST['application_id'];
    
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $name = $fname." ".$mname." ".$lname;

    $branch_id = $_POST['branch_id'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $zipcode = $_POST['zipcode'];
    $number = $_POST['number'];
    $gr_id = $_POST['gr_id'];
    $course = $_POST['course'];
    $qualification = isset($_POST['qualification'])?$_POST['qualification'] : "";
    $faculty_id = isset($_POST['faculty_id'])? $_POST['faculty_id']:"";
    $position_for_apply = isset($_POST['position_for_apply'])?$_POST['position_for_apply']:"";
    $salary_expectation = isset($_POST['salary_expectation'])?$_POST['salary_expectation']:"";
    $running_topic = isset($_POST['running_topic'])? $_POST['running_topic'] : "";
    $prefer_job_location = isset($_POST['prefer_job_location'])? $_POST['prefer_job_location'] : "" ;
    $batch_time = isset($_POST['batch_time'])? $_POST['batch_time'] : "";
    $remarks = isset($_POST['remarks'])? : "";
    $company_name = isset($_POST['company_name'])? $_POST['company_name'] : "";
    $company_number = isset($_POST['company_number'])? $_POST['company_number'] : "";
    $company_sup_name = isset($_POST['company_sup_name'])? $_POST['company_sup_name'] : "";
    $job_title = isset($_POST['job_title'])? $_POST['job_title'] :"";
    $starting_salary = isset($_POST['starting_salary'])? $_POST['starting_salary'] : "";
    $ending_salary = isset($_POST['ending_salary'])? $_POST['ending_salary'] : "";
    $responsibilities = isset($_POST['responsibilities'])? $_POST['responsibilities'] : "";
    $leave_from = isset($_POST['leave_from'])? $_POST['leave_from'] :"";
    $leave_to = isset($_POST['leave_to'])? $_POST['leave_to'] :"";
    $leave_reason = isset($_POST['leave_reason'])? $_POST['leave_reason'] : "" ;
    $application_date = isset($_POST['application_date'])? $_POST['application_date'] : "";
    $skill = isset($_POST['skills'])? $_POST['skills']:"";
    $image = $_FILES['image']['name'];
    // exit;
	$path ="https://www.rnwmultimedia.com/applications/images/application_images/".$image;    
    move_uploaded_file($_FILES['image']['tmp_name'], $path);


    $query ="insert into application_job(`application_id`,`name`,`branch_id`,`skill`,`address`,`city`,`area`,`zipcode`,`number`,`gr_id`,`course`,`qualification`,`faculty_id`,`position_for_apply`,`salary_expectation`,`running_topic`,`prefer_job_location`,`batch_time`,`remarks`,`company_name`,`company_number`,`company_sup_name`,`job_title`,`starting_salary`,`ending_salary`,`responsibilities`,`leave_from`,`leave_to`,`leave_reason`,`application_date`,`photo`)values('$application_id','$name','$branch_id','$skill','$address','$city','$area','$zipcode','$number','$gr_id','$course','$qualification','$faculty_id','$position_for_apply','$salary_expectation','$running_topic','$prefer_job_location','$batch_time','$remarks','$company_name','$company_number','$company_sup_name','$job_title','$starting_salary','$ending_salary','$responsibilities','$leave_from','$leave_to','$leave_reason','$application_date','$image')";





    

    $query1 = mysqli_query($con,$query);
    if($query1)
    {
        $msg = "Your JOB Application Submitted Successfully";
    }
    else
    {
        $msg = "Something Went Wrong";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Job Application Submission Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/datepicker.min.css" type="text/css">
</head>

<body>
<section class="color-theme-1">
<div class="container text-center pt-3 pb-1">
    <img src="img/rnw.png" width="320" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/>
</div>
</section>

<section>
<div class="container">
<form method="post" enctype="multipart/form-data">
<div class="row">
    <?php if(isset($msg)) { ?>

            <div class="alert alert-success"><?php echo $msg; ?></div>

    <?php } ?>
    <div class="col-lg-8 my-3">
        <h3>Employment Application</h3>
    </div>
    <div class="col-lg-4 my-3">
        <span>APPLICATION NO.: <?php echo $app_no; ?></span>
        <input type="hidden" class="form-control" name="application_id" required  value="<?php echo $app_no; ?>" readonly/>
    </div>
    <div class="w-100 text-center color-theme-1 text-white py-1 my-3">
        <h2>Applicant Information</h2>
    </div>
    <div class="col-lg-3 my-3">
        <label>First Name</label>
        <input type="text" class="form-control" name="fname" placeholder="First Name" required />
    </div>

    <div class="col-lg-3 my-3">
        <label>Middle Name</label>
        <input type="text" class="form-control" name="mname" placeholder="Middle Name" required />
    </div>

    <div class="col-lg-3 my-3">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="Last Name" required />
    </div>


    <div class="form-group col-md-3 my-3">
        <label>Select Your Branch</label>
        <select id="inputState" class="form-control" required name="branch_id">
            <option value="">Branch</option>\

            <?php while($branch_data2  = mysqli_fetch_array($branch_data1))  { ?>
            <option value="<?php echo $branch_data2['branch_id']; ?>"><?php echo $branch_data2['branch_code']; ?></option>
        <?php } ?>
            
        </select>
    </div> 
    <div class="col-lg-4 my-3">
        <label>Upload Photo</label>
        <input type="file" class="form-control"  name="image"/>
    </div>
    <div class="col-lg-8 my-3">
        <label>Residential Address</label>
        <textarea type="text" class="form-control" placeholder="Your Address" name="address" required></textarea>
    </div>
    <div class="col-lg-4 my-3">
        <label>City</label>
        <input type="text" class="form-control"  placeholder="City" required name="city"/>
    </div>
    <div class="col-lg-4 my-3">
        <label>Area</label>
        <input type="text" class="form-control" placeholder="Area" required name="area"/>
    </div>
    <div class="col-lg-4 my-3">
        <label>Zipcode</label>
        <input type="text" class="form-control"  placeholder="395006" required onkeypress="return isNumberKey(event);" maxlength="6" name="zipcode"/>
    </div>
    <div class="col-lg-4 my-3">
        <label  for="phone">Phone</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
            </div>
            <input type="text" class="form-control" id="phone" name="number" placeholder="Mobile Number" required onkeypress="return isNumberKey(event);" maxlength="10" />
        </div>
    </div>
    <div class="col-lg-2 my-3">
        <label for="GrId">Gr Id</label>
        <input type="text" class="form-control" id="GrId" name="gr_id" placeholder="0001" required />
    </div>
    <div class="col-lg-3 my-3">
        <label >Course</label>
       
        <select id="inputState" class="form-control" required name="course">
            <option disabled selected>Courses</option>
            <?php while($course_data2 = mysqli_fetch_array($course_data1))  { ?>
                    <option value="<?php echo $course_data2['course_name']; ?>"><?php echo $course_data2['course_name']; ?></option>
            <?php } ?>
           
             
        </select>
    </div>
    <div class="col-lg-3 my-3">
        <label >Qualification</label>
       <select id="inputState" class="form-control" required name="qualification">
            <option disabled selected>Qualification</option>
            <option>10TH</option>
            <option>12TH</option>
            <option>Graduation</option>
            <option>Post Graduation</option>
             
        </select>
    </div>
    <div class="col-lg-4 my-3">
        <label >Faculty Name</label>
        <select id="inputState" class="form-control" required  name="faculty_id">
            <option disabled selected>--select--</option>
             <?php while($faculty_data2 = mysqli_fetch_array($faculty_data1))  { ?>
             <option value="<?php echo $faculty_data2['faculty_id']; ?>"><?php echo $faculty_data2['name']; ?></option>
            <?php } ?>
            
           
        </select>
    </div>
    <div class="col-lg-4 my-3">
        <label >Position Applied for</label>
        <select id="inputState" class="form-control" required name="position_for_apply">
            <option disabled selected>--select--</option>
            <option>PhotoShop</option>
            <option>Video Editor</option>
            <option>Web Designer</option>
            <option>Graphic Designer</option>
            <option>Front Developer</option>
            <option>Laravel Developer</option>
            <option>Core PHP</option>
            <option>Codeigniter</option>
            <option>Autocad</option>
            <option>Codeigniter</option>
        </select>
    </div>
    <div class="col-lg-4 my-3">
        <label>Salary expectation</label>
        <input type="text" class="form-control"  placeholder="15000/-" required  name="salary_expectation"/>
    </div>
    <div class="col-lg-3 my-3">
        <label >Running Topic</label>
        <input type="text" class="form-control" id="Topic" placeholder="Enter Running Topic" required  name="running_topic" />
    </div>
    <div class="col-lg-3 my-3">
        <label>Prefer Location For Job</label>
        <select id="inputState" class="form-control" required name="prefer_job_location">
            <option disabled selected>--select--</option>
            <option>Varachha</option>
            <option>Yogichowck</option>
            <option>Sarthana</option>
            <option>Amroli</option>
            <option>Station</option>
            <option>Lal Darawaja</option>
            <option>Bhattar</option>
            <option>Uttran</option>
            <option>Piplod</option>
            <option>Vesu</option>
            <option>Adajan</option>
            <option>Nanpura</option>
        </select>
    </div>
    <div class="col-lg-3 my-3">
        <label>Batch Time</label>
        <select id="inputState" class="form-control" required name="batch_time">
            <option disabled selected>--select--</option>
            <option>8:00 AM</option>
            <option>9:00 AM</option>
            <option>10:00 AM</option>
            <option>11:00 AM</option>
            <option>12:00 PM</option>
            <option>1:00 PM</option>
            <option>2:00 PM</option>
            <option>3:00 PM</option>
            <option>4:00 PM</option>
            <option>5:00 PM</option>
            <option>6:00 PM</option>
            <option>7:00 PM</option>
            
        </select>
        
    </div>

    <div class="col-lg-3 my-3">
        <label>Skills</label>
        <input type="text" class="form-control"  placeholder="Like Banner, web Appli" required  name="skills"/>
    </div> 


    <div class="col-lg-12 my-3">
        <label>Remarks</label>
        <textarea type="text" class="form-control"  placeholder="Any Remarks" required  name="remarks"/></textarea>
    </div>                          
    <div class="w-100 text-center color-theme-1 text-white py-1 my-3">
        <h2>Previous Employment</h2>
    </div>

    <div class="col-lg-12 my-3">
        <h4>
            If Previous Employement<br>
            <input type="checkbox" name="" onclick="return emplo_pre_data_yes();" id="yes"/> Yes
            <input type="checkbox" name="" onclick="return emplo_pre_data_no();" id="no"/> No
            
        </h4>
    </div>
</div>
<div id="Employement_previous" class="row">
    <div class="col-lg-8 my-3">
        <label>Company</label>
        <input type="text" class="form-control"  placeholder="Company Name"  name="company_name" />
    </div>
    <div class="col-lg-4 my-3">
        <label>Company Number</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
            </div>
            <input type="text" class="form-control" id="phone-2" placeholder="company mobile number" name="company_number"   onkeypress="return isNumberKey(event);" maxlength="10" />
        </div>
    </div>
    <div class="col-lg-8 my-3">
        <label>Address</label>
        <input type="text" class="form-control"  placeholder="Company Address"  name="company_address"/>
    </div>
    <div class="col-lg-4 my-3">
        <label>Supervisor</label>
        <input type="text" class="form-control"  placeholder="Company Supervisor"  name="company_sup_name" />
    </div>
    <div class="col-lg-4 my-3">
        <label>Job Title</label>
        <input type="text" class="form-control"  placeholder="Designation"  name="job_title" />
    </div>
    <div class="col-lg-4 my-3">
        <label>Starting Salary</label>
        <input type="text" class="form-control"  placeholder="8000/-"  name="starting_salary"/>
    </div>
    <div class="col-lg-4 my-3">
        <label>Ending Salary</label>
        <input type="text" class="form-control"  placeholder="12000/-"  name="ending_salary"/>
    </div>
    <div class="col-lg-6 my-3">
        <label>Responsibilities</label>
        <input type="text" class="form-control"  placeholder=""  name="responsibilities"/>
    </div>
    <div class="col-lg-3 my-3">
        <label>Form</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY"  data-toggle="datepicker" name="leave_from"/>
    </div>
    <div class="col-lg-3 my-3">
        <label>To</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY"  data-toggle="datepicker" name="leave_to"/>
    </div>
    <div class="col-lg-12 my-3">
        <label>Reason For Leaving</label>
        <textarea type="text" class="form-control"  placeholder=""  name="leave_reason"/></textarea>
    </div>
    <div class="col-lg-8 my-3">
        <h5>May we contact your previous supervisor for a reference?</h5>
    </div> 
    <div class="col-lg-4 my-3">
        <div class="form-check float-left mr-3" >
            <input class="form-check-input" type="radio" name="exampleRadios" id="Yes" value="option1" checked />
            <label class="form-check-label" for="Yes">Yes</label>
        </div>
        <div class="form-check float-left">
            <input class="form-check-input" type="radio" name="exampleRadios" id="No" value="option2" />
            <label class="form-check-label" for="No">No</label>
        </div>
    </div>
</div>
    <hr/>
<div class="row">
    <div class="col-lg-8 my-3">
        <label for="Signature">Student Signature</label>
        <input type="file" class="form-control-file" placeholder="" id="Signature" required />
    </div>
    <div class="col-lg-4 my-3">
        <label>Select Date</label>
        <?php $date = date("m/d/Y"); ?>
        <input type="text" class="form-control"  name="application_date" value="<?php echo $date; ?>"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" />
    </div>
    <div class="col-lg-12 my-3">
        <h5>
            <input type="checkbox" id="cust_checkbox" data-toggle="modal" data-target="#exampleModal">
            I have read the rules of job application and I agree with it. Which attach with this application.
</h5>
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RNW Training & Placement Department</h5>
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            <font><p size="5"><b>A. Student Rules</b></p></font>
            <p size="0.5">a. જયારે વિદ્યાર્થી જોબ માટે એપ્લાય કરવા માંગે છે તો એમને સૌથી પહેલા પોતાની  બ્રાન્ચના  Training & Placement Responsible Person ને મળવું. જો વિદ્યાર્થી  Main Branch  ના છે તો એમને આ બ્રાન્ચ ના  Training & Placement Department ની મુલાકાત લેવી.<br>
                b. Training & Placement Responsible Person  જે પ્રમાણે સૂચના આપે આ પ્રમાણે વિદ્યાર્થીએ કાર્ય કરવાનું રહેશે.<br>
                c. જયારે પણ વિદ્યાર્થી ને વર્ક અને  Resume લઈને આવવા જાણવવામાં આવે ત્યારે નિયત કરેલા સમય કરતા ૧૫ મિનિટ વહેલા આવવાનું રહેશે. જો કોઈ વિદ્યાર્થી નિયત કરેલા સમય કરતા મોડો આવે છે અને જો એમને વેઇટ કરવો પડે છે તો એમના માટે એ પોતે જવાબદાર રહેશે.<br>
                d. જો તમને કોઈ પણ ટાસ્ક આપવામાં આવ્યું છે તો એ વર્ક તમારે ફેકલટીને નિયત કરેલા સમયે બતાવાનું રહેશે.<br>
                e. જયારે પણ વિદ્યાર્થી વર્ક અને  Resume  લઈને આવે છે ત્યારે એમને  Resume  ની હાર્ડ અને સોફ્ટ એમ બંને કોપી લાવવાની રહેશે.<br>
                f. જયારે વિદ્યાર્થી વર્ક લઈને આવે છે ત્યારે એમને પ્રોજેક્ટ જેમાંથી બનાવ્યો છે એ પ્રોજેક્ટ અથવા એની જો લિંક હોઈ તો આ લઈને આવવું કમ્પલસરી છે.<br>
                g. વિદ્યાર્થી જયારે પણ ઇન્ટરવ્યૂ માટે જાય છે તો  Compaulsary  એમને  Formal Dress Wearing  કરવાના રહેશે.<br>
                h. જ્યાં સુધી બ્રાન્ચ પરથી જોબ એપ્લિકેશન નઈ આવે ત્યાં સુધી વિદ્યાર્થીને જોબ પર મોકલવા માં આવશે નઈ. 
                </p>
                <font><p size="5"><b>B. Resume</b></p></font>
                <p size="0.5">
                    a. વિદ્યાર્થી એ  Resume માં નીચે પ્રમાણે ની કાળજી રાખવી.<br>
                           &nbsp;&nbsp; ૧.  Resume માં  Reference માં " Red & White Group of Institute"  લખવું.<br>
                          &nbsp;&nbsp;  ૨. વિદ્યાર્થીએ  Carrer Goal / Objective Resume માં લખવો જેથી કંપનીને એને આધારે  Desicion  લઇ શકે.<br>
                          &nbsp;&nbsp;  ૩. વિદ્યાર્થીએ  Professional Resume  બનાવવાનું રહેશે.<br>
                </p>
                <font><p size="5"><b>C. Discipline</b></p></font>
                <p size="0.5">
                    a. વિદ્યાર્થીઓએ પ્લેસમેન્ટ પ્રક્રિયા દરમિયાન લેતી દરેક ક્રિયામાં શિસ્ત જાળવવી જોઈએ અને નૈતિક વર્તન બતાવવું જોઈએ. કોઈપણ વિદ્યાર્થી કંપની દ્વારા નિયુક્ત શિસ્ત નિયમોનું ઉલ્લંઘન કરતી હોય અથવા સંસ્થાના નામની બદનામી કરતું જોવા મળે છે, તેને બાકીના શૈક્ષણિક વર્ષ માટે પ્લેસમેન્ટમાંથી મંજૂરી આપવામાં આવશે નહીં.<br>
                    b. પસંદગી પ્રક્રિયામાં (છેતરપિંડી / જીડી / ઇન્ટરવ્યુ) છેતરપિંડી અથવા ગેરવર્તણૂંક કરનાર વિદ્યાર્થીઓને બાકીના શૈક્ષણિક વર્ષ માટે પ્લેસમેન્ટમાંથી મંજૂરી આપવામાં આવશે નહીં.
                </p>
                <font><p size="5"><b>D. Job Offers</b></p></font>
                <p size="0.5">
                    a. Offer લેટરની નકલ પ્લેસમેન્ટ Department માં સબમિટ કરવાની રહેશે.<br>
                    b. જો વિદ્યાર્થીને બીજી નોકરીની ઓફર કરવામાં આવે છે, તો તેણે / તેણીએ કંપનીને અફસોસનો પત્ર આપવો જ જોઇએ, જેમાં પ્રથમ નોકરી અને બીજીને સ્વીકૃતિનો પત્ર આપવામાં આવ્યો હતો.<br>
                    c. જોબ Offer સ્વીકાર્યા પછી, જો કોઈ પણ વિદ્યાર્થી વર્ષ દરમિયાન કોઈપણ સમયે તેની સ્વીકૃતિ પાછો લેવાનો નિર્ણય લે છે, તો તેણે સંબંધિત કંપનીને તાત્કાલિક જાણ કરવી પડશે.<br>
                    d. પોસ્ટ પ્લેસમેન્ટ :- જો કોઈ પણ કારણસર કંપની ઉમેદવારની  Joining  બંધ કરે છે તો એના માટે કોલેજ કે ઈન્ટિટ્યૂટ જવાબદાર નથી.
                </p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1"  data-dismiss="modal">Accept T&C</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal 2-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RNW Training & Placement Department</h5>
        <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            <label for="email-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Proceed</button>
      </div>
    </div>
  </div>
</div>
        
    </div>
    
</div>
    <!-- <div class="w-100 text-center color-theme-1 text-white py-1 my-3">
        <h2>Office Use Only</h2>
    </div>
    <div class="col-lg-8 my-3">
        <label for="officeReceiver">Receive by</label>
        <select id="officeReceiver" class="form-control" required>
            <option disabled selected>Click Here</option>
            <option>Ruchita Ma'am</option>
            <option>Mital Ma'am</option>
            <option>Hinal Ma'am</option>
            <option>Rakesh Sir</option>  
        </select>
    </div> -->
    <!-- <div class="col-lg-4 my-3">
        <label>Receive Date</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" />
    </div>
    <div class="col-lg-8 my-3">
        <label for="FacultyReceiver">Receive Faculty</label>
        <select id="FacultyReceiver" class="form-control" required>
            <option disabled selected>Click Here</option>
            <option>Bhavin Sir</option>
            <option>Mehul Sir</option>
            <option>Divyesh Sir</option>
            <option>Rakesh Sir</option>  
        </select>
    </div> -->
    <!-- <div class="col-lg-4 my-3">
        <label>Receive Date</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" />
    </div>
    <div class="w-100 text-center color-theme-1 text-white py-1 my-3">
        <h2>Faculty Use Only</h2>
    </div>
    <div class="col-lg-8 my-3">
        <label>Company</label>
        <input type="text" class="form-control"  placeholder="Company Name" required />
    </div>
    <div class="col-lg-4 my-3">
        <label>Phone Number</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">+91</div>
            </div>
            <input type="number" class="form-control" id="phone-3" placeholder="92777 60777" required />
        </div>
    </div> -->
    <!-- <div class="col-lg-8 my-3">
        <label>Address</label>
        <input type="text" class="form-control"  placeholder="Company Address" required />
    </div>
    <div class="col-lg-4 my-3">
        <label>Supervisor</label>
        <input type="text" class="form-control"  placeholder="Supervisor Name" required />
    </div>
    <div class="col-lg-6 my-3">
        <label>Job Title</label>
        <input type="text" class="form-control"  placeholder="Web Designer" required />
    </div>
    <div class="col-lg-6 my-3">
        <label>Starting Salary</label>
        <input type="text" class="form-control"  placeholder="15000/-" required />
    </div>
    <div class="col-lg-12 my-3">
        <label>Responsibilities</label>
        <input type="text" class="form-control"  placeholder="Graphics & Web Design" required />
    </div>
    <div class="col-lg-4 my-3">
        <label>Form</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" />
    </div>
    <div class="col-lg-8 my-3">
        <label>Refrence By</label>
        <input type="text" class="form-control"  placeholder="" required />
    </div>
    <div class="form-group col-lg-4">
        <label for="S-sign">Student Sign</label>
        <input type="file" class="form-control-file" id="S-sign" required />
    </div>
    <div class="form-group col-lg-4">
        <label for="F-sign">Faculty Sign</label>
        <input type="file" class="form-control-file" id="F-sign" required />
    </div>
    <div class="col-lg-4 my-3">
        <label>Form</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" />
    </div>
    <div class="w-100 text-center color-theme-1 text-white py-1 my-3">
        <h2>Office Use Only</h2>
    </div>
    <div class="col-lg-8 my-3">
        <label>Receive By</label>
        <select id="Hod" class="form-control" required>
            <option disabled selected>HOD Department</option>
            <option>Bhavin Sir</option>
            <option>Mehul Sir</option>
            <option>Divyesh Sir</option>
            <option>Rakesh Sir</option>  
        </select>
    </div>
    <div class="col-lg-4 my-3">
        <label>Receive Date</label>
        <input type="text" class="form-control"  placeholder="MM/DD/YYYY" required data-toggle="datepicker" />
    </div> -->
    <div class="w-100 text-center mt-5 my-5">
        <input class="btn btn-success text-uppercase text-white w-100 rounded-0" type="submit" name="submit" value="submit">
    </div>               
</div>
</form>
</div>
</section>

<section class="pt-3 pb-3 mt-3 text-center text-white" style="background-color: #1c2023;">
<div class="container">
    © Copyright 2019. Red & White Multimedia Education. All Rights Reserved.
</div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/datepicker.min.js" type="text/javascript"></script>
<script>
    $('[data-toggle="datepicker"]').datepicker();
</script>
</body>
</html>









<script>

    $('#Employement_previous').hide();

function emplo_pre_data_yes()
{
    $('#Employement_previous').show(1000);
    $('#yes').prop('checked', true).attr('checked', 'checked');
    $('#no').prop('checked', false).attr('checked', 'checked');
}

function  emplo_pre_data_no()
{
    $('#Employement_previous').hide(1000);  
    $('#yes').prop('checked', false).attr('checked', 'checked');
    $('#no').prop('checked', true).attr('checked', 'checked'); 
}
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }




   $('input[type="checkbox"]').on('change', function(e){
        if(e.target.checked){
     $('#exampleModalLong').modal();
   }
});

</script>




<script>
$(document).ready(function(){
    $(".close-btn").click(function(){
        $("#cust_checkbox").prop("checked", false);
    });
});
</script>



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
  Launch demo modal
</button> -->

<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div> 
</div>