
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Middle Menu
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Middle Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        
     	    <div class="row">
		        <div class="col-md-12">
          <!-- general form elements -->
                     <div class="box box-primary" style="padding:20px;">
                        <div class="box-header with-border" style="margin-bottom:10px;">
                          <h3 class="box-title">Middle Menu</h3>
                        </div>
           
            
            
                     <form  method="post" action="<?php echo base_url(); ?>settings/ad_mid_menu"> 
                            <div class="row" style="padding:10px">
            				     <div class="col-md-6" >
                                    	
                                    <input type="hidden" name="m_id" value="<?php if(isset($m_all)){echo $m_all->m_module_id; } ?>">
                                      <div class="row" id="showCourse" >
                                        </div>

                                           <div class="form-group" >
                                            <label for="pwd">First Module:</label>
                                            <select class="form-control" name="f_m_id">
                                            <option value="0">---select module---</option>
                                                <?php foreach($f_module as $v){ ?>
                                                  <option value="<?php echo $v->f_module_id; ?>" <?php if(isset($m_all)){ if($v->f_module_id == $m_all->f_module_id){echo "selected";} }?>><?php echo $v->f_module_name; ?></option>
                                                <?php } ?>
                                            </select>
                                          </div>
                                          <div class="form-group" >
                                            <label for="pwd">Name:</label>
                                           <input class="form-control"   type="text"  name="menu" placeholder="Enter Name" value="<?php if(isset($m_all)){echo $m_all->module_name; } ?>" required>
                                          </div>
                                           <div class="form-group" >
                                            <label for="pwd">Icon:</label>
                                           <input class="form-control"   type="text"  name="icon" placeholder="Enter Icon" value="<?php if(isset($m_all)){echo $m_all->module_icon; } ?>" required>
                                          </div>

                                
                                
                        <input type="submit" name="submit" value="Save" class="btn btn-primary pull-right" /> 
                          </div>
                          
                        </div>
                          </form> 
        					  
        
        					 <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <form method="post" action="<?php echo base_url(); ?>settings/m_upd_s">
              <button type="submit" name="action" value="d" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              <button type="submit" name="action" value="a" class="btn btn-primary"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
              <button type="submit" name="action" value="n" class="btn btn-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
            <div class="box-header with-border">
              <h3 class="box-title">Display STAFF</h3>
            </div>
            <!-- /.box-header -->

        
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="checkAll"></th>
                  <th>Menu</th>
                   <th>Icon</th>
                  <th>action</th>
                </tr>

                <?php  foreach($m_module as $value){ ?>
                <tr>
                    <td><input type="checkbox" name="id_all[]" value="<?php echo $value->m_module_id; ?>" class="check"></td>
                        </form>
                    <td><?php foreach ($f_module as $k => $v) {
                      if($v->f_module_id == $value->f_module_id)
                      {
                        echo $v->f_module_name;
                      }
                      # code...
                    } ?></td>
                    <td><?php echo $value->module_name; ?></td>
                    <td><?php echo $value->module_icon; ?></td>
                    <td>
                    <a href="<?php echo base_url(); ?>settings/m_de_menu/<?php echo $value->m_module_id; ?>">
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </a>
                    <a href="<?php echo base_url(); ?>settings/m_up_menu/<?php echo $value->m_module_id; ?>">
                    <button type="button" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    </a>

                    <?php if($value->status == 0){ ?>
                      <a href="<?php echo base_url(); ?>settings/m_change_s/<?php echo $value->status; ?>/<?php echo $value->m_module_id; ?>">
                    <button type="button" class="btn btn-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                    </a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url(); ?>settings/m_change_s/<?php echo $value->status; ?>/<?php echo $value->m_module_id; ?>">
                    <button type="button" class="btn btn-primary"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                    </a>
                    <?php } ?>
                    </td>
                </tr>
                <?php } ?>
                </thead>
                <tbody>
               
                
                </tfoot>
              </table>
              
            
          </div>
        
        </div>
        </div>

        			
                    </div>
        
                </div>
            </div>
           
           
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
	
    
    
    
    
    
    
 