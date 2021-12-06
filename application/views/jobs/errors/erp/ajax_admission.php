
     <div  id="m_data"> 
                <!-- <div class="table-responsive"> -->
              <table id="example1" class="table table-str iped example1">
                <thead>
                <tr class="t1">
                  <th  height="50">S_NO</th>
                  <th  height="50">Admission / Details</th>
                  <th  height="50">Student / Parents /
                                  Details</th>
                  <th  height="50">Category & Course Details /
                  Batch Details</th>
                  <th  height="50">Adm Branch
                  Assigned To</th>                
                  <th  height="50">Fees
                  Pmt Gateway</th>
                  <th>Combined / Amount</th>
                  <th  height="50">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sno=1; foreach($list_all_admission as $val) { ?>
                <tr>
                  <td class="td1">
                   <?php echo $sno; ?>
                    </td>
                    <td class="td1">
                        <?php echo "<b>RNW</b>/".''. $val->branch_code; ?>/<br>
                        <?php echo "<b>Year :</b>".''. $val->year; ?>/<br>
                        <?php echo "<b>GR ID :</b>".''. $val->gr_id; ?>/
                        <?php echo $val->admission_number; ?>/  
                        <?php echo  $val->admission_date; ?><br>
                        <?php echo  $val->admission_time; ?>
                        </td>
                        <td class="td1">
                          <?php echo $val->surname; ?> 
                          <?php echo $val->first_name; ?> 
                          <?php if(!empty($val->father_name)) { echo $val->father_name."<br>"; }  ?>
                          <?php if(!empty($val->email)) { echo $val->email."<br>"; }  ?>
                         <?php if(!empty($val->mobile_no)) { echo $val->mobile_no."<br>"; } ?>
                         <?php if(!empty($val->father_mobile_no)) { echo $val->father_mobile_no."<br>"; } ?>
                      </td>
                      <td class="td1">
                        <?php if(!empty($val->type)) { echo $val->type."<br>"; } ?>
                       <?php $branch_ids = explode(",",$val->package_id);
                        foreach($list_package as $row) { if(in_array($row->package_id,$branch_ids)) {  echo $row->package_name."<br>"; }  } ?>
                        <?php $branch_ids = explode(",",$val->course_id);
                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name."<br>"; }  } ?>
                        <?php $branch_ids = explode(",",$val->faculty_id);
                        foreach($faculty_all as $row) { if(in_array($row->faculty_id,$branch_ids)) {  echo $row->name."<br>"; }  } ?>
                        <?php $branch_ids = explode(",",$val->batch_id);
                        foreach($list_batch as $row) { if(in_array($row->batch_id,$branch_ids)) {  echo $row->batch_name; }  } ?>
                      </td>
                      <td class="td1">
                        <?php $branch_ids = explode(",",$val->admission_branch);
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?><br>
                        <?php echo $val->addby; ?>
                      </td>
                      <td class="td1">
                        <?php echo "<b>T :</b>".''. $val->tuation_fees; ?><br>
                        <?php echo "<b>P :</b>".''. $val->registration_fees; ?>
                      </td>
                      <td class="td1"></td>
                      <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>AddmissionController/basic_info?action=edit&id=<?php echo @$val->admission_id; ?>">view</a></li>
                            <li><a href="<?php echo base_url(); ?>AddmissionController/admission_update?action=edit&id=<?php echo @$val->admission_id; ?>">Edit</a></li>                            
                            </ul>
                          </div>
                      </td>
             </tr>
                
             <?php $sno++; } ?>
                
                </tfoot>
              </tbody>
            </table>  
                      <!--               <div class="row">
                                                <div class="col-xl-12 text-center">
                                                    <nav class="pagination_block">
                                                        <ul class="pagination justify-content-center">
                                                            <li class="page-item"><a  href="#">Previous</a></li>
                                                            <li class="page-item"><a  href="#"><?php echo $links; ?></a></li>  
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div> -->
          </div>


             <script type="text/javascript">
   function search_data()
  {
    var key = $('#master_search').val();
    //alert(key);
    $.ajax({
        url:"<?php echo base_url(); ?>AddmissionController/search_data",
        type:'POST',
        data:{
          s_key:key
        },
        success:function(res)
        {
            $('#m_data').html(res);
        } 
    });
  }
  </script>

           <script>

              
//session automatic  
    $(document).ready(function(){
        var submenu = sessionStorage.getItem("submenu");
         var leadsubmenu = sessionStorage.getItem("leadsubmenu");
           $('#sub_menu_'+submenu).addClass('show');
           $('#lead_submenu_'+leadsubmenu).addClass('show');
    });

    function getClick(id,subid){
      sessionStorage.setItem("submenu", id);
      sessionStorage.setItem("leadsubmenu", subid);
    }

    function hideMenu(id,subid){
      $("#sub_menu_"+id).removeClass('show');
      $("#lead_submenu_"+subid).removeClass('show');
    }
//end session of sidebar menu open 

            </script>