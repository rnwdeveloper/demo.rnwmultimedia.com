
    
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
  

  <style>
    .modal-dialog{
     
        bottom: 10%;
        top:15%;
        width: 60%;
    }
    .modal-header{
      background: #3c8dbc;
    }
    .modal-title{
      color: white;
    }
  </style>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Add Student Grade Questions

      <div class="form-group" style="float:right;margin-top: 10px;">
        <div class="col-md-2">
    <a class="btn btn-primary" href="<?php echo base_url(); ?>FormController/viewgradeStudentsQuestions">view Student Grade Questions</a>
        </div>
      </div>    


      </h1>
      <?php if($_SESSION['logtype']=="Super Admin") { ?> 
    <div style="margin-left: 320px; margin-top: -40px;">
      <a href="<?php echo base_url() ?>PropertyController/place" class="btn btn-success">PlaceType</a>
      <a href="<?php echo base_url() ?>PropertyController/producttype" class="btn btn-primary">productType</a>
      <a href="<?php echo base_url() ?>PropertyController/productlist" class="btn btn-warning">ProductList</a>
       <a href="<?php echo base_url() ?>PropertyController/viewComplain" class="btn btn-info">ViewComplain</a>
    </div>
    <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Add Complain</li>
      </ol>
    </section>

  <section class="content" >
    <div class="col-md-12" >
      <div class="box box-success" style="padding:10px;">
      <?php if(!empty($msg_alert)) { ?>
        <div class="col-md-8" >
          <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red">
            <?php echo $msg_alert; ?>
          </div>
        </div>
      <?php } ?>
        <div class="row"> 
          <div class="col-md-4">
            <form  method="post" action="<?php echo base_url(); ?>FormController/add_questions_grade">
              <div class="form-group">  
                <label for="comment">Enter How Many Section:</label>
                  <input type="text" name="types" class="form-control" value="<?php echo @$this->session->userdata('type'); ?>">   
                  <input type="submit" name="addTypes" value="submit" >
              </div>  
            </form>              
          </div>
        </div>    
      </div>
    </div>
  </section>

    <!-- Main content -->
    <form method="post" action="<?php echo base_url(); ?>FormController/add_questions_grade">
      <?php 
        $record = array("first","second","third","forth","fifth","sixth","seventh");
        $type =  @$this->session->userdata('type');
  if(@$type > 0){
  for($i=0;$i<$type;$i++){ 
     ?>

     <section class="content" style="margin-top:-110px;">
    <div class="col-md-12" >
      <div class="box box-success" style="padding:10px;">
      <?php 
      $msg_alert =  @$this->session->flashdata('msg_alert');
      if(!empty($msg_alert)) { ?>
        <div class="col-md-8">
          <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red">
            <?php echo $msg_alert; ?>
          </div>
        </div>
      <?php } ?>
        <div class="row"> 
          <div class="col-md-12">
            <form  method="post" action="<?php echo base_url(); ?>FormController/add_questions_grade">
             <div class="form-group">
              <label class="col-md-2 control-label" for="action_id">Header Name</label>  
              <div class="col-md-3">
                <input id="header_name" name="<?php echo $record[$i]; ?>_record[]" type="text" placeholder="First header Name" class="form-control input-md">
              </div>
                  
              <div class="col-md-2">
                <input id="perce" name="<?php echo $record[$i]; ?>_per[]" type="text" placeholder="Total Percentage" class="form-control input-md">
              </div>
            </div>
            <br>
            <div id="<?php echo $record[$i]; ?>">
              <div id="<?php echo $record[$i]; ?>0">
                <div class="form-group">
                  <label class="col-md-2 control-label" for="action_name">Question 1</label>  
                  <div class="col-md-4">
                    <input id="action_name" name="<?php echo $record[$i]; ?>_record[]" type="text" placeholder="" class="form-control input-md">
                  </div>
                  

                  <div class="col-md-1">
                    <input id="perce" name="<?php echo $record[$i]; ?>_per[]" type="text" placeholder="" class="form-control input-md">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-2">
                    <button id="add-more<?php echo $i; ?>" name="add-more<?php echo $i; ?>" class="btn btn-primary">Add More</button>
                  </div>
                </div>
            </div>
                     
          </div>
        </div>    
      </div>
    </div>
  </section>

       
       <?php } }?>
       <?php if($type >0 ) { ?>
        <div class="form-group" style="margin-top:-100px;">
                  <div class="col-md-2">
                    <input id="submit" name="submit" value="submit" type="submit" class="btn btn-primary">
                  </div>
        </div>
      <?php } ?>
    <form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    
    
    
    
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights
    reserved.
  </footer>

 
</div>
<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
<script>
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

<script>
  function selectPlace()
  {
    var b_id = $('#branch_id').val();
    //alert(b_id);
    $.ajax({
      url:"<?php echo base_url(); ?>PropertyController/branchWisePlace",
      type:"post",
      data:{
        'branch_id':b_id
      },
      success : function(data){
        $('#place_box').html(data);
      
      }
    });
      
  }
</script>

<script>
  function selectproduct()
  {
    var product_id = $('#product_type_id').val();
    var branch_id = $('#branch_id').val();
     var place_id = $('#place_type_id').val();

    // alert(place_id);
    $.ajax({
      url:"<?php echo base_url(); ?>PropertyController/productWise",
      type:"post",
      data:{
        'product_type_id': product_id,
        'branch_id' : branch_id,
        'place_id' : place_id
      },
      success : function(data){
        // $('#msg').html(data);
        $('#list_property').html(data);
      
      }

    });
      
  } 


 function select_list()
  {

    // $('#list_property').change(function(){
        //alert($('#list_property').val());
        var m = $('#list_property').val();
        

          $.ajax({
      url:"<?php echo base_url(); ?>PropertyController/demo_data",
      type:"post",
      data:{
       d_id : m
      },
      success : function(data){
        // $('#msg').html(data);
        $('#demo_data').html(data);
      
      }

    });
    //});
      $('#dialog-modal').modal("show");
  } 
  

  $(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    var i=1;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        i =  i + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!-- Text input--><div class="form-group"><label class="col-md-2 control-label" for="action_id">Question '+i+'</label>  <div class="col-md-6"><input id="action_id" name="questions[]" type="text" placeholder="add question" class="form-control input-md"></div><div class="col-md-1"><input id="percentage[]" name="percentage[]" type="text" placeholder="0 to 100" class="form-control input-md"></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});

</script>




<script>
$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more0").click(function(e){
        e.preventDefault();
        var addto = "#first" + next;
        var addRemove = "#first" + (next);
        next = next + 1;
        var newIn = ' <div id="first'+next+'" name="first'+next+'"> <div class="form-group"><label class="col-md-2 control-label" for="action_name">Question</label><div class="col-md-4"><input id="action_name" name="first_record[]" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-1"><input id="perce" name="first_per[]" type="text" placeholder="" class="form-control input-md"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="removefirst' + (next - 1) + '" class="btn btn-danger remove-me-first" >Remove</button></div></div><div id="first">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#first" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me-first').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#first" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});



$(document).ready(function () {
    //@naresh action dynamic childs
    var nextnext = 0;
    $("#add-more1").click(function(e){
        e.preventDefault();
        var addto = "#second" + nextnext;
        var addRemove = "#second" + (nextnext);
        nextnext = nextnext + 1;
        var newIn = ' <div id="second'+nextnext+'" name="second'+nextnext+'"> <div class="form-group"><label class="col-md-2 control-label" for="action_name">Action Name</label><div class="col-md-4"><input id="action_name" name="second_record[]" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-1"><input id="second_per[]" name="second_per[]" type="text" placeholder="" class="form-control input-md"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="removesecond' + (nextnext - 1) + '" class="btn btn-danger remove-me-second" >Remove</button></div></div><div id="second">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#second" + nextnext).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(nextnext);  
        
            $('.remove-me-second').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#second" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});


$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more2").click(function(e){
        e.preventDefault();
        var addto = "#third" + next;
        var addRemove = "#third" + (next);
        next = next + 1;
        var newIn = ' <div id="third'+next+'" name="third'+next+'"> <div class="form-group"><label class="col-md-2 control-label" for="action_name">Action Name</label><div class="col-md-4"><input id="action_name" name="third_record[]" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-1"><input id="perce" name="third_per[]" type="text" placeholder="" class="form-control input-md"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="removethird' + (next - 1) + '" class="btn btn-danger remove-me-third" >Remove</button></div></div><div id="third">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#removethird" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me-third').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
        
                var fieldID = "#third" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});



$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more3").click(function(e){
        e.preventDefault();
        var addto = "#forth" + next;
        var addRemove = "#forth" + (next);
        next = next + 1;
        var newIn = ' <div id="forth'+next+'" name="forth'+next+'"> <div class="form-group"><label class="col-md-2 control-label" for="action_name">Action Name</label><div class="col-md-4"><input id="action_name" name="forth_record[]" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-1"><input id="perce" name="forth_per[]" type="text" placeholder="" class="form-control input-md"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="removeforth' + (next - 1) + '" class="btn btn-danger remove-me-forth" >Remove</button></div></div><div id="forth">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#removeforth" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me-forth').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#forth" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});




// $(document).ready(function () {
//     //@naresh action dynamic childs
//     var addnext = 0;
//     $("#add_section").click(function(e){
//         e.preventDefault();
//         var addto = "#section" + addnext;
//         var addRemove = "#section" + (addnext);
//         addnext = addnext + 1;
//         var newIn = '<div class="col-xs-12" id="section'+addnext+'" name="section'+addnext+'"><div class="col-md-12" style="background-color:red; padding-top:10px;margin-top:10px;"><div class="form-group"><label class="col-md-2 control-label" for="action_id">Header Name</label><div class="col-md-3"><input id="header_name" name="header_name" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-2"><input id="perce" name="perce" type="text" placeholder="" class="form-control input-md"></div></div><br><div id="field'+addnext+'"><div id="field'+addnext+'0"><div class="form-group"><label class="col-md-2 control-label" for="action_name">Action Name</label>  <div class="col-md-4"><input id="action_name" name="action_name" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-1"><input id="perce" name="perce" type="text" placeholder="" class="form-control input-md"></div></div><div class="form-group"><div class="col-md-2"><button id="addaddmore" name="add-more'+addnext+'" class="btn btn-primary">Add More</button></div></div><br><br></div></div></div>';
//         var newInput = $(newIn);
//         var removeBtn = '<button id="remove' + (addnext - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="section">';
//         var removeButton = $(removeBtn);
//         $(addto).after(newInput);
        
//         $(addRemove).after(removeButton);
//         $("#section" + addnext).attr('data-source',$(addto).attr('data-source'));
//         $("#count").val(addnext);  
        
//             $('.remove-me').click(function(e){
//                 e.preventDefault();
//                 var fieldNum = this.id.charAt(this.id.length-1);
//                 var fieldID = "#section" + fieldNum;
//                 $(this).remove();
//                 $(fieldID).remove();
//             });
//     });

// });

  </script>

  <script>

$(document).ready(function () {
    var next1 = 0;
    $("#addaddmore").click(function(e){
        
    console.log("tet");

    });

});


  </script>
</body>
</html>

    
    
    
 