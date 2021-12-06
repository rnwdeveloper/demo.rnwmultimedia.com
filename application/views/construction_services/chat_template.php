

<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php ?>
<style>
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:250px; margin-left: -25px; cursor:pointer; }

</style>
 



<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
   
  
  <!-- Main content -->
  
  <section class="content">
     <div class="row">
           

            
            <div class="col-md-6" id="chatSection" >
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border" >
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

                  <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content" style="height:400px;">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
                    <div class="input-group">
                     <?php
						$obj=&get_instance();
						$obj->load->model('UserModel');
						$profile_url = $obj->UserModel->PictureUrl();
						$user=$obj->UserModel->GetUserData();
 					?>
                    	
                        <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                        <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
                    	
                    	<input type="hidden" id="ReciverId_txt">
                    	<input type="hidden" id="Reciver_logtype">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                             <input type="file" name="file" class="upload_attachmentfile"/></div>
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"> </h3>

                  <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="panel panel-info">
                        <div class="panel-body">Super Admin</div>
                      </div>
                   
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($admin_list)){
						foreach($admin_list as $v){
						    
						    $nom = 0;
						    foreach($ChatHistory as $val){
						        if($val['sender_id']==$v['admin_id'] && $val['sender_logtype']=="Super Admin") {
						            if($val['seen']=="0"){
						                $nom++;
						            }
						            
						        }
						    }
						?>
                        <li class="selectAdmin" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                            <?php if($nom!=0) { ?>
                            <span class="label label-success pull-right" style="margin-right:20%"><?php echo $nom; ?></span>
                            <?php } ?>
                          <img class="profile-user-img img-responsive img-circle" src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php }?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Staff's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  
                  
                   <div class="panel panel-info">
                        <div class="panel-body">Managment</div>
                      </div>
                    
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($user_list)){
						foreach($user_list as $v) { 
						    $nom = 0;
						    foreach($ChatHistory as $val){
						        if($val['sender_id']==$v['user_id'] && $val['sender_logtype']=="user") {
						            if($val['seen']=="0"){
						                $nom++;
						            }
						            
						        }
						    }
						    
						   
						?>
                        <li class="selectUser" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                            <?php if($nom!=0) { ?>
                            <span class="label label-success pull-right" style="margin-right:20%"><?php echo $nom; ?></span>
                            <?php } ?>
                          <img class="profile-user-img img-responsive img-circle" src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php  } ?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Staff's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                    
                    
                    
                    <div class="panel panel-info">
                        <div class="panel-body">Staff</div>
                      </div>
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($faculty_list)){
						foreach($faculty_list as $v){
						    $nom = 0;
						    foreach($ChatHistory as $val)
						    {
						        if($val['sender_id']==$v['faculty_id'] && $val['sender_logtype']=="Faculty") 
						        {
						            if($val['seen']=="0")
						            {
						                $nom++;
						            }
						            
						        }
						    }
						
						?>
                        <li class="selectFaculty" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                            <?php if($nom!=0) { ?>
                            <span class="label label-success pull-right" style="margin-right:20%"><?php echo $nom; ?></span>
                            <?php } ?>
                          <img class="profile-user-img img-responsive img-circle" src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php } ?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Staff's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
    
    
    
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
<!-- Modal -->
  
<?php $this->load->view('include/footer');?>

<script>
$(function() {
$('.message').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
       sendTxtMessage($(this).val());
    }
});
$('.btnSend').click(function(){
    
       sendTxtMessage($('.message').val());
});
$('.selectAdmin').click(function(){
	ChatSection(1);
      var receiver_id = $(this).attr('id');
      
	  //alert(receiver_id);
	  $('#ReciverId_txt').val(receiver_id);
	  $('#ReciverName_txt').html($(this).attr('title'));
	  $('#Reciver_logtype').val("Super Admin");
	  GetChatHistory(receiver_id);
 				
});

$('.selectUser').click(function(){
	ChatSection(1);
      var receiver_id = $(this).attr('id');
      
	  //alert(receiver_id);
	  $('#ReciverId_txt').val(receiver_id);
	  $('#ReciverName_txt').html($(this).attr('title'));
	  $('#Reciver_logtype').val("User");
	  
	  GetChatHistory(receiver_id);
 				
});

$('.selectFaculty').click(function(){
	ChatSection(1);
      var receiver_id = $(this).attr('id');
      
	  //alert(receiver_id);
	  $('#ReciverId_txt').val(receiver_id);
	  $('#ReciverName_txt').html($(this).attr('title'));
	  $('#Reciver_logtype').val("Faculty");
	  GetChatHistory(receiver_id);
 				
});
$('.upload_attachmentfile').change(function(){
	
	DisplayMessage('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
	ScrollDown();
	
	var file_data = $('.upload_attachmentfile').prop('files')[0];
	var receiver_id = $('#ReciverId_txt').val();   
	var receiver_logtype = $('#Reciver_logtype').val();
    var form_data = new FormData();
    form_data.append('attachmentfile', file_data);
	form_data.append('type', 'Attachment');
	form_data.append('receiver_id', receiver_id);
	form_data.append('receiver_logtype', receiver_logtype);
	
	$.ajax({
                url: '<?php echo base_url(); ?>ChatController/send_text_message', 
                dataType: 'json',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                        
                type: 'post',
                success: function(response){
					
					$('.upload_attachmentfile').val('');
					GetChatHistory(receiver_id);
				},
				error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
				}
	 });
	
});
$('.ClearChat').click(function(){
       var receiver_id = $('#ReciverId_txt').val();
       var receiver_logtype = $('#Reciver_logtype').val();
  	 			$.ajax({
						  //dataType : "json",
  						  url: '<?php echo base_url(); ?>ChatController/chat_clear_client_cs?receiver_id='+receiver_id+'&receiver_logtype='+receiver_logtype,
						  success:function(data)
						  {
  							 GetChatHistory(receiver_id);		 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
 				
});

 

});	///end of jquery

function ViewAttachment(message_id){
//alert(message_id);
			/*$.ajax({
						  //dataType : "json",
  						  url: 'view-chat-attachment?message_id='+message_id,
						  success:function(data)
						  {
  							 		 
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});*/
}
function ViewAttachmentImage(image_url,imageTitle){
	$('#modelTitle').html(imageTitle); 
	$('#modalImgs').attr('src',image_url);
	$('#myModalImg').modal('show');
}

function ChatSection(status){
	//chatSection
	if(status==0){
		$('#chatSection :input').attr('disabled', true);
    } else {
        $('#chatSection :input').removeAttr('disabled');
    }   
}
ChatSection(0);


function ScrollDown(){
	var elmnt = document.getElementById("content");
    var h = elmnt.scrollHeight;
   $('#content').animate({scrollTop: h}, 1000);
}
window.onload = ScrollDown();

function DisplayMessage(message){
	var Sender_Name = $('#Sender_Name').val();
	var Sender_ProfilePic = $('#Sender_ProfilePic').val();
	
		var str = '<div class="direct-chat-msg right">';
				str+='<div class="direct-chat-info clearfix">';
				 str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
				 str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
				 str+='</div><img class="direct-chat-img" src="'+Sender_ProfilePic+'" alt="">';
				 str+='<div class="direct-chat-text">'+message;
				 str+='</div></div>';
		$('#dumppy').append(str);
}

function sendTxtMessage(message){
	var messageTxt = message.trim();
	if(messageTxt!=''){
		//console.log(message);
	
 		DisplayMessage(messageTxt);
		       
				var receiver_id = $('#ReciverId_txt').val();
				var receiver_logtype = $('#Reciver_logtype').val();
				$.ajax({
						  dataType : "json",
						  type : 'post',
						  data : {messageTxt : messageTxt, receiver_id : receiver_id, receiver_logtype : receiver_logtype },
						  url: '<?php echo base_url(); ?>ChatController/send_text_message',
						  success:function(data)
						  {
  							GetChatHistory(receiver_id);
  							
						  },
						  error: function (jqXHR, status, err) {
 							  alert('Local error callback');
						  }
 					});
					
		
		
		ScrollDown();
		$('.message').val('');
		$('.message').focus();
	}else{
		$('.message').focus();
	}
}

function GetChatHistory(receiver_id){
    var receiver_logtype = $('#Reciver_logtype').val();
				$.ajax({
						  //dataType : "json",
  						  url: '<?php echo base_url(); ?>ChatController/get_chat_history_by_vendor?receiver_id='+receiver_id+'&receiver_logtype='+receiver_logtype,
						  success:function(data)
						  {
  							$('#dumppy').html(data);
						
						  },
						  error: function (jqXHR, status, err) {
 							 // alert('Local error callback');
						  }
 					});
}

setInterval(function(){ 
	var receiver_id = $('#ReciverId_txt').val();
	if(receiver_id!=''){GetChatHistory(receiver_id);}
}, 3000);

    
</script>


 
</body>
</html>