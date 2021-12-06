<?php

    session_start();
    ob_start();
    include('conn.php');

    if(!isset($_SESSION['email'])) {
        header('location:index.php');
    }

    @$_SESSION['lab'] = "A";

    $que = "SELECT * FROM lab_a WHERE time='7:00 AM'";
    $result = mysqli_query($conn, $que);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/gm_form.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>
    
    <section style="margin-top:20px;">
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square"></div>
			<div class="square"></div>
			<div class="square"></div>
			<div class="square"></div>
			<div class="square"></div>
            <div class="btn-group radio-button" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="t1" value="7:00 AM" autocomplete="off" checked="">
                <label class="btn btn-outline-dark" for="t1">7:00 AM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t2" value="8:00 AM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t2">8:00 AM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t3" value="9:00 AM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t3">9:00 AM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t4" value="10:00 AM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t4">10:00 AM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t5" value="11:00 AM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t5">11:00 AM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t6" value="12:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t6">12:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t7" value="1:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t7">1:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t8" value="2:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t8">2:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t9" value="3:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t9">3:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t10" value="4:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t10">4:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t11" value="5:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t11">5:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t12" value="6:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t12">6:00 PM</label>
                <input type="radio" class="btn-check" name="btnradio" id="t13" value="7:00 PM" autocomplete="off">
                <label class="btn btn-outline-dark" for="t13">7:00 PM</label>
               
              </div>
              <div class="btn-group radio-button" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="lab" id="l1" value="lab_a" autocomplete="off" checked="">
                <label class="btn btn-outline-dark" for="l1">IT Lab - A</label>
                <input type="radio" class="btn-check" name="lab" id="l2" value="lab_b" autocomplete="off">
                <label class="btn btn-outline-dark" for="l2">IT Lab - B</label>
          
              </div>
			<div class="container1">
                <div id="datas" style="width: -webkit-fill-available;">
				<table class="table table-bordered border-dark">
                    <tr class="text-center">
                        <th width="10%">PC NO.</th>
                        <th>STUDENT'S NAME</th>
                        <th width="20%">GR ID</th>
                        <th width="10%">ACTION</th>
                    </tr>

                    <?php 
                    
                    while($row = mysqli_fetch_assoc($result)) {
                       
                    ?>
                    <tr>
                        <td><?php echo $row['pc'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['grid'] ?></td>
                        <td><a href="gm_login_form.php?id=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a></td>
                    </tr>
                    <?php } ?>
          
                </table>
                </div>
			</div>
		</div>
	</section>

</body>
</html>

<script>

$(document).ready(function() {

   


    $('input[name="btnradio"]').click(function() {


        var time = $(this).val();
        var lab = $("input[name='lab']:checked").val();

        $.ajax({

            url: "ajax_table.php",
            type: "POST",
            data: {
                'time': time,
                'lab': lab
            },
            success: function(data) {
                $('#datas').html(data);
            }

        })


    })

    $('input[name="lab"]').click(function() {

        var lab = $(this).val();
        var time = $("input[name='btnradio']:checked").val();
        alert("Hello");

        $.ajax({

            url: "ajax_table.php",
            type: "POST",
            data: {
                'time': time,
                'lab': lab
            },
            success: function(data) {
                $('#datas').html(data);
            }

        })


    })

})

</script>