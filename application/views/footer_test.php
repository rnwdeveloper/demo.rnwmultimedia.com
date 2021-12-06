

<script src="<?php echo base_url(); ?>New_Demo_Soft/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>New_Demo_Soft/js/bootstrap-timepicker.js"></script>
<!-- <script src="<?php echo base_url(); ?>New_Demo_Soft/js/main.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

 <script type="text/javascript">
   function change_logtype(id)
  {


    if($('#'+id).is(':checked'))
    {
      // alert();
        $('.logtype'+id).each(function(){

                 $('.logtype'+id).prop('checked',true);
            });
    }
    else
    {
        $('.logtype'+id).each(function(){

                 $('.logtype'+id).prop('checked',false);
            });
    }
  }



    $(function () {
    $('.example1').DataTable({
        "pageLength": 25
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

 </script>



