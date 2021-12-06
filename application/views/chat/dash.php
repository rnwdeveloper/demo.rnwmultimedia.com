<?php session_start(); 

// print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<h1><?php echo $_SESSION['name']; ?></h1>
<a href="logout.php">Logout</a>
<div id="u_detail"></div>
<div id="user_model_details"></div>




<script src="offlinejs.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		userdata();

		setInterval(function(){
			last_activity();
			userdata();
			update_chat_history_data();
		},5000);


		function userdata()
		{
			$.ajax({
			url:'user_data.php',
			type:'POST',
			success:function(res)
			{
				$('#u_detail').html(res);
			}
			
		});
		}


		function last_activity()
		{
			$.ajax({
				url:'last_activity.php',
				success:function()
				{

				}
			});
		}

		function make_chat_dialog_box(to_user_id,to_user_name)
		{
			var modal_content = '<div id ="user_dialog_'+to_user_id+'" class="user_dialog"  title="You have chat with '+to_user_name+'">';
			modal_content += '<div style="height:400px;border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px;padding:16px;width:300px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id
			+'">';
			modal_content += fetch_user_chat_history(to_user_id);
			modal_content += '</div>';
			modal_content += '<div class ="form-group">';
			modal_content += 
			'<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
			modal_content += '</div><div class="form-group" align="right">';
			modal_content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
			$('#user_model_details').html(modal_content);
		}


		$(document).on('click','.start_chat',function(){

			var to_user_id  = $(this).data('touserid');
			var to_user_name = $(this).data('tousername');
			alert(to_user_id);
			make_chat_dialog_box(to_user_id,to_user_name);
			$("#user_dialog_"+to_user_id).dialog({
				autoOpen:false,
				width:400
			});
			 $('#user_dialog_'+to_user_id).dialog('open');
		});



		$(document).on('click','.send_chat',function(){

			var to_user_id = $(this).attr('id');
			var chat_message =  $('#chat_message_'+to_user_id).val();
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{
					to_user_id:to_user_id,
					chat_message:chat_message
				},
				success:function(res)
				{
					$('#chat_message_'+to_user_id).val('');
					$('#chat_history_'+to_user_id).html(res);
				}
			});
		});



		function fetch_user_chat_history(to_user_id)
		{
			$.ajax({

				url:"fetch_user_chat_history.php",
				type:'POST',
				data:{
					to_user_id:to_user_id
				},
				success:function(res)
				{
					$('#chat_history_'+to_user_id).html(res);
				}
			});
		}


		function update_chat_history_data()
		{
				$('.chat_history').each(function(){
					var to_user_id = $(this).data('touserid');
					fetch_user_chat_history(to_user_id);
				});
		}



		$(document).on('focus','.chat_message',function(){

			var is_type = 'yes';
			$.ajax({
				url:"update_is_type_status.php",
			type:'POST',
			data:{
				is_type:is_type
			},
			success:function()
			{

			}
			});
			
		});

		$(document).on('blur','.chat_message',function(){

			var is_type = 'no';
			$.ajax({

				url:"update_is_type_status.php",
				type:'POST',
				data:{
					is_type:is_type

				},
				success:function()
				{

				}
			});


		});

	});
</script>
</body>
</html>