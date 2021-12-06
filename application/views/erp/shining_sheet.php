
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<style type="text/css">
  .t1{
    background-color: #0b527e;
    color: white;
    font-size: 15px;
    font: center; 
   }
   .card-header{
    background-color: #0b527e;
    color: white;
    font-size: 20px;
   }
   .preview{
    background-color: #fc4b6c;
    color: white;
   }
   .modal-header{
      background-color: #0b527e;
    }
    .modal-title{
      color: white;
      font-size: 20px;
    }
    .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #0b527e;
    border-color: #0b527e;
}
.td1{
  font-size: 14px;
  color: black;
  font: center;
}
  .sheet{
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
  text-align: left; 
  padding: 5px;
  text-align: left; 
}

</style>
<main  class="main_content d-inline-block">
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
  <section  class="all_demo_student_block Add_New_Addmision_page_2 d-inline-block w-100 position-relative pb-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="accordion" id="student_list_aoc">
                  <div id="data_insert_msg">
                <div class="card">
              <div class="card-header mb-0" style="background-color: #0b527e;">
                <h2 class="mb-0">
                  <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">
                   Shining Sheet<span class="d-inline-block float-right pluse_icon">✕</span>
                  </button>
                </h2>
              </div>
              <div id="student_filter_panel_4" class="collapse show" style="color: black;">
                <div class="card-body">
                  <form  method="post" action="<?php echo base_url(); ?>AddmissionController/shining_sheet">
                  <div class="col-sm-10">
                          <div class="form-group">
                            <select required class="form-control" name="course_id"  required>
                                <option value="">Select Course</option>
                                  <?php foreach($list_course as $val) { ?>
                                    <option  value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                        </div>
                        
                        <div class="col-sm-10">
                          <div class="form-group">
                             <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                        <td><textarea  name="addmore[][name]" placeholder="Enter Your Topic" class="form-control name_list" rows="4" required="" /></textarea></td>  
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                                </table> 
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="form-group">
                            <input  type="submit" name="submit" id="submit" class="btn t1" value="Submit" /> 
                            <button type="button" class="btn preview" data-toggle="modal" data-target="#exampleModal">
                            PreView
                          </button>
                          </div>
                        </div>
                      </form>
                </div>
              </div>  
            </div>
          </div>
           
          </div>
        </div>
      </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Shining Sheet</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="sheet">
  <tr>
    <th rowspan="3" colspan="2">Logo</th>
    <th colspan="6">FACULTY NAME :</th>
  </tr>
  <tr>
    <th colspan="4">STARTING DATE :</th>
    <th colspan="2">GRID :</th>
  </tr>
  <tr>
    <th colspan="4">ENDING DATE :</th>
    <th colspan="2">B. TIME :</th>
  </tr>
  <tr>
    <th colspan="5">STUDENT NAME :</th>
    <th colspan="3">GOOGLE CLASSROOM CODE :</th>
  </tr>
  <tr>
    <th colspan="6">COURSE NAME :</th>
    <th colspan="2">TOTAL DAYS:___/29</th>
  </tr>
  <tr class="sheet">
    <th>LEC.</th>
    <th>TOPIC</th>
    <th>DATE</th>
    <th>P/A</th>
    <th>DAY</th>
    <th>FEEDBACK</th>
    <th>STU. SIGN</th>
    <th>FACULTY SIGN</th>
  </tr>
  <tfoot>
    <tr class="sheet">
      <td>1</td>
      <td><b>INTRO</b> <br>
        - History   
      </td>
      <td>1-Jan-2021</td>
      <td>P</td>
      <td>2</td>
      <td>....</td>
      <td>....</td>
      <td>....</td>
    </tr>
  </tfoot>
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn t1" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script> 

<!-- Data table and pagination & searching -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><textarea type="text" name="addmore[][name]" placeholder="Enter Your Topic" class="form-control name_list" rows="4" required /></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });
  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
  
    });  
</script>
</section>


 <!--  <section>
    <div class="container-fluid">
      <div class="card">
  <div class="card-header"><b>
    Display Receipt Record</b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <table id="example" class="table table-str iped">
  <thead>
    <tr class="t1">
      <th scope="col">S_No</th>
      <th scope="col">Branch</th>
      <th scope="col">Department</th>
      <th scope="col">Sub Department</th>
      <th>Receipt Details</th>  
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    </tr>
  </tbody>
</table>
    </blockquote>
  </div>
</div>
    </div>
  </section> -->

