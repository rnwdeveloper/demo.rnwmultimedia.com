 <div class="row" id="se_all">
                 <div class="col-md-12" >
                    
                   <table id="example1" class="table table-bordered table-striped example10">
                <thead>
                <tr>
                    <th><th>Question AND Answer</th>
                    <th>Action</th>    
                </tr>
                </thead>
                <?php for ($num=0; $num<1; $num++) ?>
                <?php foreach($faq as $row) { ?>
                <tbody>
                  <tr>
                    <td rowspan="0"><?php echo $num++ ?></td>
                    <td><b><?php echo $row->question; ?></b></td>
                    <td><a href="">Download</a></td>
                  </tr>
                <tr>
                  <td><?php echo $row->answer; ?></td>
                <td nowrap=""> 
                     <!-- <a href="<?php echo base_url().'/FaqController/updateFaq/'.$row->id; ?>" class="btn btn-primary btn_edit"><i class="fa fa-edit"></i></a>  -->
                    <a href="<?php echo base_url().'/FaqController/delete_fun/'.$row->id; ?>" onclick="return confirm('Are you sure you want to delete this task?');" class="btn btn-danger btn_delete"><i class="fa fa-trash"></i></a></td>
              </tr>
                </tbody>
                <?php }   ?>

              </table>                  
                 </div>
            </div>



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