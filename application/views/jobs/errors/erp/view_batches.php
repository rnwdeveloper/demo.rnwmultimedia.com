
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<!-- old color code pagination #007bff -->
<style type="text/css">
.t1{
	background-color: #0b527e;
	color: white;
	font-size: 14px;
	text-align: center;    
}
.a{
	background-color: green;
	color: white;
	border-radius: 22px;
}
.d{
	background-color: red;
	color: white;
	border-radius: 22px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
	background-color: #2255a4;
	color: white;
	border: 1px solid #aaa;
	border-radius: 4px;
	cursor: default;
	float: left;
	margin-right: 5px;
	margin-top: 5px;
	padding: 0 5px;
}
.page-item.active .page-link {
	z-index: 3;
	color: #fff;
	background-color: #0b527e;
	border-color: #0b527e;
}
.td1{
	font-size: 12px;
	color: black;
	text-align: center;
}
/*.select2-container--default .select2-selection--multiple {
line-height: 27px;
}*/
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
	list-style: none;
}

/*.card-header{
background-color: #0b527e;
color: white;
font-size: 18px;
}
*/
.check1{
	height: 15px;
	width: 15px;
	margin-top: 1px;
	background-color: #eee;
	border:none !important;
}
.form-check-input{
	margin-left: -1.75rem;
}
.uncheck{
	display: none;
}
.radius{
	border-radius: 3px;
}

 .img-responsive{
		display: block;
		max-width: 100%;
		height: auto;
	}
	.form{
	    border: 0;
	} 
	 th img{
  	width: 200px;
    display: block;
    margin: auto;
    vertical-align: middle;
  }
  .table td, .table th{
  	font-size: 12px;
  	padding: 5px;
  	vertical-align: middle;
  }
  .function-icon{
		background-color: var(--custi-light-blue);
    color: #fff !important;
    width: 22px;
    border-radius: 100%;
    height: 22px;
    display: inline-block;
    text-align: center;
    line-height: 22px;
    margin: 0 !important;
    font-size: 10px;
	}
	.form-control{
		font-size: 12px;
		list-height:1;
	}
	.batch{
		max-width: 500px;
	}
	.btn{
		font-size: 12px;
	}

</style>
<main class="main_content d-inline-block">
<!-- <section class="page_title_block d-inline-block w-100 position-relative pb-0">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="page_heading">
<h1>Batch Created</h1>
</div>
</div>
</div>
</div>
</section> -->

<section>
	<div class="container-fluid">
		<div class="card">
			<div class="card-header extra_top_search_header_bar card-header d-flex align-items-center justify-content-between text-white">
				Display Batch Record <a href="<?php echo base_url(); ?>AddmissionController/batches" class="btn-sm  btn-primary float-right">back</a>
			</div>
			<div class="card-body">
				<blockquote class="blockquote mb-0">
					<div class="table-responsive">
						<div class="col-sm-12 p-0">
							<div class="checkbox">
							    <label>
							    	<!-- <input type="checkbox" name="fancy-checkbox-default" class="uncheck" id="fancy-checkbox-default" autocomplete="off"> -->
									<input type="checkbox" class="btn-sm btn-primary check check1"  id="checkAll" onclick="return selectAllData()"  style="margin-right: 5px; margin-top: -3px;" >
									<button type="button" class="btn-sm radius btn-primary" id="selectall">Select All</button>
									<button type="button" class="btn-sm radius btn-primary" data-toggle="modal" data-target="#exampleModals" onclick="return get_shiningsheet_record(<?php echo $batches->course_id;?>,<?php echo $batches->faculty_id; ?>,<?php echo $batches->batches_id; ?>)">ShiningSheet</button>
									<button type="button" class="btn-sm radius btn-primary" data-toggle="modal" data-target="#not_assigned_batch_model" onclick="return extra_batch_add(<?php echo $batches->batches_id; ?>,<?php echo $batches->course_id; ?>)"><i class="fas fa-plus"></i></button>
							    </label>
							</div>
						</div>

						<table id="example" class="table table-str iped">
							<thead>
								<tr class="t1">
									<th scope="col">SNo</th>
									<th scope="col">GR ID</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Course</th>
								</tr>
							</thead>
							<tbody>
								<?php $sno=1; foreach ($get_batch as $val) { ?>
								<tr class="td1">
								<td class="checkbox"><input class="form-check-input check1" type="checkbox"> <?php echo $sno; ?></td>
								<td><?php echo $val->gr_id; ?></td>
								<td><?php echo $val->first_name; ?> <?php echo $val->surname; ?></td>
								<td><?php echo $val->email; ?></td>
								<td>
								    <?php $branch_ids = explode(",",$val->courses_id);   
								    foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?>
								</td>
								</tr>
								<?php $sno++; } ?>

							</tbody>
						</table> 
					</div>
				</blockquote>
			</div>
		</div>
	</div>
</section>

<!-- Modal extra batch add -->

<div class="modal fade" id="not_assigned_batch_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content" id="get_data" style="margin-top: 60px;">

    </div>
  </div>
</div>
<!-- Modal Shining Sheet-->
<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content" style="margin-top: 60px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Shining Sheet</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="get_shiningsheet">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>


<!-- Data table and pagination & searching -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
$('#example').DataTable();
} );
</script>

<script>
function get_shiningsheet_record(course_id='',faculty_id='',batches_id=''){
    $.ajax({
      url : "<?php echo base_url(); ?>AddmissionController/ajax_shiningsheet_data_all_student_wise",
      type:"post",
      data:{
        'course_id':course_id , 'faculty_id':faculty_id , 'batches_id':batches_id
      },
      success:function(Resp){
        $('#get_shiningsheet').html(Resp);
      }
    });
  }

var count =1;
function selectAllData()
{
    if(count == 1)
    {
    	$('#selectall').html('Email');
    	count=0;
    }
    else
    {
    	count =1;
    	$('#selectall').html('SelectALL');
    }
}


 $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});

</script>

<script>
function extra_batch_add(batches_id='',course_id='')
{
  $.ajax({
    url : "<?php echo base_url(); ?>AddmissionController/get_not_assigned_batch",
    type : "post",
    data:{
      'batches_id' : batches_id , 'course_id' : course_id
    },
    success:function(Response)
    {
      $('#get_data').html(Response);
    }
  });
}
</script>

<script>
//***********************************//
// For select 2
//***********************************//
$(".select2").select2();

/*colorpicker*/
$('.demo').each(function() {
//
// Dear reader, it's actually very easy to initialize MiniColors. For example:
//
//  $(selector).minicolors();
//
// The way I've done it below is just for the demo, so don't get confused
// by it. Also, data- attributes aren't supported at this time...they're
// only used for this demo.
//
$(this).minicolors({
control: $(this).attr('data-control') || 'hue',
position: $(this).attr('data-position') || 'bottom left',

change: function(value, opacity) {
if (!value) return;
if (opacity) value += ', ' + opacity;
if (typeof console === 'object') {
console.log(value);
}
},
theme: 'bootstrap'
});

});


</script>

<script type="text/javascript">
$(document).ready(function(){

$(function () {
$('.example1').DataTable({
"pageLength": 10
})
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})

});
</script>


</body>
</html>