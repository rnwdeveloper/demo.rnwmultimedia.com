 <div class="row" id="se_all">
                 <div class="col-md-12" >
                    
                   <table  class="table table-responsive table-bordered table-striped example1">
                <thead>
                <tr>
                    <th><th>Question AND Answer</th>
                    <th>Action</th>                        
                </tr>
                </thead>
                <?php for ($num=0; $num<1; $num++) ?>
                
                <?php foreach($termsconditions as $row) { ?>
                <tbody>
                  <tr>
                    <td rowspan="0"><?php echo $num++ ?></td>
                    <td><b><?php echo $row->question; ?></b></td>
                    

                    <!-- <td><td><a href="">Download</a> -->
                     
                     <td nowrap="">
                     
                      <?php if($_SESSION['logtype']=="Super Admin") { ?>
                     <a href="<?php echo base_url().'/Tc_Controller/updatedata/'.$row->id; ?>" class="btn btn-primary btn_edit"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url().'/Tc_Controller/delete_fun/'.$row->id; ?>" onclick="return confirm('Are you sure you want to delete this task?');" class="btn btn-danger btn_delete"><i class="fa fa-trash"></i></a></td>
                    <?php } ?>
                  </tr>
                <tr>
                  <td><?php echo $row->answer; ?></td>
                
              </tr>
              <tr>
                 
                </tr>
                </tbody>
                <?php }   ?>

              </table> 
                               
                 </div>
            </div>