
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Last Menu
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Last Menu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
        
          <div class="row">
            <div class="col-md-12">
          <!-- general form elements -->
                     <div class="box box-primary" style="padding:20px;">
                        <div class="box-header with-border" style="margin-bottom:10px;">
                          <h3 class="box-title">Last Menu</h3>
                        </div>
           
            
            
                     <form  method="post" action="<?php echo base_url(); ?>settings/ad_las_menu"> 
                            <div class="row" style="padding:10px">
                         <div class="col-md-6" >
                                      
                                    <input type="hidden" name="m_id" value="<?php if(isset($m_all)){echo $m_all->l_module_id; } ?>">
                                      <div class="row" id="showCourse" >
                                        </div>

                                           <div class="form-group" >
                                            <label for="pwd">First Module:</label>
                                            <select class="form-control" name="f_m_id">
                                            <option value="0">---Select Last module---</option>
                                                <?php foreach($m_module as $v){ ?>
                                                  <option value="<?php echo $v->m_module_id; ?>" <?php if(isset($m_all)){ if($v->m_module_id == $m_all->m_module_id){echo "selected";} } ?>><?php echo $v->module_name; ?></option>
                                                <?php } ?>
                                            </select>
                                          </div>
                                          <div class="form-group" >
                                            <label for="pwd">Name:</label>
                                           <input class="form-control"   type="text"  name="menu" placeholder="Enter Name" value="<?php if(isset($m_all)){echo $m_all->name; } ?>" required>
                                          </div>
                                           <div class="form-group" >
                                            <label for="pwd">Icon:</label>
                                           <input class="form-control"   type="text"  name="icon" placeholder="Enter Icon" value="<?php if(isset($m_all)){echo $m_all->icon; } ?>" required>
                                          </div>
                                          <div class="form-group" >
                                            <label for="pwd">Controller:</label>
                                           <input class="form-control"   type="text"  name="controller" placeholder="Enter Controller" value="<?php if(isset($m_all)){echo $m_all->controller; } ?>" required>
                                          </div>
                                          <div class="form-group" >
                                            <label for="pwd">Method:</label>
                                           <input class="form-control"   type="text"  name="method" placeholder="Enter method" value="<?php if(isset($m_all)){echo $m_all->method; } ?>" required>
                                          </div>
                        <input type="submit" name="submit" value="Save" class="btn btn-primary pull-right" /> 
                          </div>
                          
                        </div>
                          </form> 
                    
        
                   <div class="row">
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <form method="post" action="<?php echo base_url(); ?>settings/l_upd_s">
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
                  <th>Middle menu</th>
                  <th>Menu</th>
                   <th>Icon</th>
                   <th>Controller</th>
                   <th>Method</th>
                  <th>action</th>
                </tr>

                <?php  foreach($l_module as $value){ ?>
                <tr>
                    <td><input type="checkbox" name="id_all[]" value="<?php echo $value->m_module_id; ?>" class="check"></td>
                        </form>
                    <td><?php foreach ($m_module as $k => $v) {
                      if($v->m_module_id == $value->m_module_id)
                      {
                        echo $v->module_name;
                      }
                      # code...
                    } ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->icon; ?></td>
                    <td><?php echo $value->controller; ?></td>
                    <td><?php echo $value->method; ?></td>
                    <td style="display: flex;">
                    <a href="<?php echo base_url(); ?>settings/l_de_menu/<?php echo $value->l_module_id; ?>">
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </a>
                    <a href="<?php echo base_url(); ?>settings/l_up_menu/<?php echo $value->l_module_id; ?>">
                    <button type="button" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    </a>

                    <?php if($value->status == 0){ ?>
                      <a href="<?php echo base_url(); ?>settings/l_change_s/<?php echo $value->status; ?>/<?php echo $value->l_module_id; ?>">
                    <button type="button" class="btn btn-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                    </a>
                    <?php }else{ ?>
                    <a href="<?php echo base_url(); ?>settings/l_change_s/<?php echo $value->status; ?>/<?php echo $value->l_module_id; ?>">
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
  
 
  
    
    
    
    
    
    
 