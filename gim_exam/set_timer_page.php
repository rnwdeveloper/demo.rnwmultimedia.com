<?php 

	 ob_start();
    include('config.php');

	$grid = $_SESSION["grId"];

	$se = "SELECT * FROM gim_students WHERE grid='$grid'";

	$re = mysqli_query($conn,$se);
	$r = mysqli_fetch_assoc($re);

	$s_id = $r['schedule_id'];

	if($r['e_status']==2){
		$_SESSION['exam_c'] = "Time is Up!";
		?>

<script>
		$('#myModal').modal({
			backdrop: 'static'
		});
</script>

<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Completed Your Exam</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>YOUR Exam Time is Over</p>
                    <p class="text-danger"><small>Your EXAM TIME is OVER</small></p>
                    <p class="text-info"><small><strong>Note:</strong> Close This Tab</small></p>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>



		<?php
		
	}

	$time = $_POST['seconds'];
	$lang = '';

    if(@$_POST['language_type'] == 'c'){
    	$_SESSION['c_lang']= $_POST['seconds'];
    	$lang = "c_lang";
	}else if(@$_POST['language_type'] == 'p'){
    	$_SESSION['p_lang']= $_POST['seconds'];
		$lang = "psd";
	}
	else if(@$_POST['language_type'] == 'a'){
    	$_SESSION['a_lang']= $_POST['seconds'];
		$lang = "animate";
	}
	else if(@$_POST['language_type'] == 'pg'){
    	$_SESSION['d_lang']= $_POST['seconds'];
		$lang = "psd_g";
	}
	else if(@$_POST['language_type'] == 'l'){
    	$_SESSION['l_lang']= $_POST['seconds'];
		$lang = "logic";
	}

	if($time>0){

		$que = "SELECT * From gim_sub_time WHERE `grid`='$grid' AND schedule_id='$s_id'";
		$res = mysqli_query($conn,$que);

		if(mysqli_num_rows($res)<=0){
			$sql = "INSERT INTO gim_sub_time (`grid`,`$lang`,`schedule_id`) VALUES ('$grid','$time','$s_id')";
		} else {
			$sql = "UPDATE gim_sub_time SET `$lang`='$time' WHERE `grid`='$grid' AND schedule_id='$s_id'";
		}

		// echo $sql;

		$re = mysqli_query($conn,$sql);
		

	}


?>