
    
    
    
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
  
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Set mail Details       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       
     	    
		
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-success" style="padding:20px;">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
             <?php if(!empty($msg_alert)) { ?>
     	            <div class="col-md-8" >
     	        
     	        <div id="yellow" style="padding:2px 5px 2px 5px" class="box yellow bg-red"><?php echo $msg_alert; ?></div>
     	    </div>
     	    <?php } ?>
           <div class="row"> 
               <div class="col-md-8">
                   
                 
               <form class="form-inline" method="post" action="<?php echo base_url(); ?>Settings/setmail">
                  <input type="hidden" name="update_id" value="<?php if(!empty($select_email->email_id)) { echo $select_email->email_id; } ?>">
                   <div class="form-group">  
                <select  class="form-control" name="branch_id"  required>
                        	<option value="">Select Branch</option>
                            <?php foreach($branch_all as $row) { 
                                if($row->branch_status=="0") {
					         if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?> ?>
                      
							<option <?php if(@$select_email->branch_id==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      
                     	<?php  } } } ?>
                </select>       
               </div>    
                <div class="form-group">
                  
                  <input type="email" class="form-control" value="<?php if(!empty($select_email->email)) { echo $select_email->email; } ?>" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group">
                  
                  <input type="password" class="form-control" id="pwd" value="<?php if(!empty($select_email->password)) { echo $select_email->password; } ?>" placeholder="Enter password" name="password" required>
                </div>
               
                <input type="submit" class="btn btn-default" name="submit" value="Save">
              </form>
              
              
              
              <?php if(!empty($mail_address_all)) { ?>
              <table class="table" style="margin-top:50px;">
                <thead>
                  <tr>
                     <th>Branch</th>
                    <th>Email</th>
                     <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($mail_address_all as $val) { ?>
                  <tr>
                   <td><?php foreach($branch_all as $row) { if($val->branch_id==$row->branch_id) {  echo $row->branch_name; } } ?></td>
                    <td><?php echo $val->email; ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a href="<?php echo base_url(); ?>settings/setmail?action=edit&id=<?php echo @$val->email_id; ?>"> Edit</a></li>
                             
                              <li ><a href="<?php echo base_url(); ?>settings/setmail?action=delete&id=<?php echo @$val->email_id; ?>">Delete</a></li>
                            
                            </ul>
                          </div>
                        
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              
              <?php } ?>
              </div>
              
               <div class="col-md-4" style="padding:20px">
                   <h4>Instructions For Gmail Account Settings:</h4>
                   <p>
                       
                        Step 1: Go to https://www.gmail.com and sign in by existing username or password.
                        
                     <br>  <br> Step 2: Go to My Account Settings.
                        
                  <br>  <br>    Step 3: In security section we should edit two sections:-
                        
                   <br>   <br>  Find 2-step verification and disable it.
                  <br>  <br>    In Account permissions section, find Access for less secure apps and enable it.
                    <br>  <br>  Step 4: Please use link: https://accounts.google.com/b/0/DisplayUnlockCaptcha to unlock google/gmail captcha security settings, if it is enabled.
                        
                  <br>  <br>    Step 5: Open the 'Forwarding and POP/IMAP' tab on your 'Settings' page, and enable POP. After enabling this in Gmail, make sure you click 'Save Changes' so Gmail can communicate with your mail client.

                       
                   </p>
                </div>
             
          </div>		
            
          </div>
        
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 
	
    
    
    
    
    
 