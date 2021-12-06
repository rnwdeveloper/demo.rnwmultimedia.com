
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://www.rnwmultimedia.com/wp-content/uploads/2019/03/favicon-16x16.png" type="image/x-icon">
    <title>Shining Sheet</title>
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assign_student/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assign_student/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assign_student/css/datepicker.min.css" type="text/css">

    <style type="text/css">
      .card-header{
    background-color: #0b527e;
    color: white;
    font-size: 18px;
   }
    </style>
</head>

<body>



<div class="color-theme-1">
<div class="container text-center pt-3 pb-3">
    <a href="https://www.rnwmultimedia.com/" target="_blank" style="display: inline-block;"><img src="https://www.rnwmultimedia.com/wp-content/uploads/2020/05/logoWhite.png" width="300" alt="Red & White MUltimedia Education" title="Red & White MUltimedia Education"/></a>
</div>
</div>

<section>
<div class="container">
   
<div class="card">
  <div class="card-header">
   Student Shining Sheet
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">
    <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>'AddmissionController/assign_student">    
    <div class="row">
      <div class="col-sm-6">
  <div class="form-group">
    <label for="example-date-input"><b>Topic</b></label>
    <textarea class="form-control" rows="5" id="topic" name="topic"></textarea>
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label for="example-date-input"><b>Date</b></label>
    <input type="date" class="form-control" name="date" id="example-date-input" placeholder="Example input" >
  </div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="exampleInputEmail1"><b>Present/Absent</b></label><br>
<input type="radio"  name="p_a" id="exampleInputEmail1" value="P"  placeholder="content">Present
<input type="radio"  name="p_a" id="exampleInputEmail1" value="A"  placeholder="content">Absent                  
</div>
</div>
<div class="col-sm-6">
  <label><b>Feed Back</b> </label>
  <div class="form-group">
  <div class="form-check">
  <input  type="checkbox" id="blankCheckbox" name="feed_back[]" value="Good" >Good
   <input  type="checkbox" id="blankCheckbox" name="feed_back[]" value="option1">Very Good
   <input  type="checkbox" id="blankCheckbox" name="feed_back[]" value="Excelent">Excelent
   <input  type="checkbox" id="blankCheckbox" name="feed_back[]" value="poor">Bad
</div>
</div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label for="example-name-input"><b>Signature Uplode</b></label>
    <input type="file" class="form-control" name="file_name" placeholder="Enter Number Of Day" >
  </div>
</div>
<div class="col-sm-12">
  <div class="form-group">
    <input type="submit" class="btn btn-success" value="submit" name="submit">
  </div>
</div>
</form>

    </p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>
</section>


<!--  Terms & Conditions for students modal -->

<!--  email Confimation modal -->



<!--  Footer Section  -->
<section class="pt-3 pb-3 text-center text-white copyright" style="background-color: #1c2023;">
<div class="container">
    © Copyright 2020. <a href="https://www.rnwmultimedia.com/" target="_blank">Red & White Multimedia Education</a>. All Rights Reserved.
</div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.js" type="text/javascript"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assign_student/js/datepicker.min.js" type="text/javascript"></script>
<script>
    $('[data-toggle="datepicker"]').datepicker();
</script>




</body>
</html>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>




