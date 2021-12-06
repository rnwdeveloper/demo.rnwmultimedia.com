<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChatController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['ChatModel', 'OuthModel', 'UserModel', 'Dbcommon']);
        $this->load->helper('string');
        $this->load->helper('loggs');
        $this->load->helper('urldata');
    }
    public function index() {
        $data['strTitle'] = '';
        $data['strsubTitle'] = '';
        $list = [];
        $list_admin = $this->UserModel->select_all("admin");
        $list_user = $this->UserModel->select_all("user");
        $list_faculty = $this->UserModel->select_all("faculty");
        $data['strTitle'] = 'All Connected Clients';
        $data['strsubTitle'] = 'Clients';
        $data['chatTitle'] = 'Select User with Chat';
        $f_list = [];
        foreach ($list_faculty as $u) {
            $f_list[] = ['id' => $this->OuthModel->Encryptor('encrypt', $u['faculty_id']), 'faculty_id' => $u['faculty_id'], 'name' => $u['name'], 'logtype' => $u['logtype'], 'picture_url' => $this->UserModel->PictureUrlById("faculty", "faculty_id", $u['faculty_id']), ];
        }
        $data['faculty_list'] = $f_list;
        $u_list = [];
        foreach ($list_user as $u) {
            $u_list[] = ['id' => $this->OuthModel->Encryptor('encrypt', $u['user_id']), 'user_id' => $u['user_id'], 'name' => $u['name'], 'logtype' => $u['logtype'], 'picture_url' => $this->UserModel->PictureUrlById("user", "user_id", $u['user_id']), ];
        }
        $data['user_list'] = $u_list;
        $a_list = [];
        foreach ($list_admin as $u) {
            $a_list[] = ['id' => $this->OuthModel->Encryptor('encrypt', $u['id']), 'admin_id' => $u['id'], 'name' => $u['name'], 'logtype' => $u['logtype'], 'picture_url' => $this->UserModel->PictureUrlById("admin", "id", $u['id']), ];
        }
        $data['admin_list'] = $a_list;
        $update['upd_faculty'] = $this->Dbcommon->view_all("faculty");
        $update['upd_branch'] = $this->Dbcommon->view_all("branch");
        $update['upd_see'] = $this->Dbcommon->check_update("demo");
        if ($_SESSION['logtype'] == "Super Admin") {
            $receiver_logtype = "Super Admin";
        } else if ($_SESSION['logtype'] == "Faculty") {
            $receiver_logtype = "Faculty";
        } else {
            $receiver_logtype = "User";
        }
        $receiver_id = $_SESSION['user_id'];
        $data['ChatHistory'] = $this->ChatModel->ChatHistory($receiver_id, $receiver_logtype);
        $this->load->view('header', $update);
        $this->load->view('construction_services/chat_template', $data);
    }
    public function send_text_message() {
        $post = $this->input->post();
        $messageTxt = 'NULL';
        $attachment_name = '';
        $file_ext = '';
        $mime_type = '';
        $receiver_logtype = $post['receiver_logtype'];
        if ($_SESSION['logtype'] == "Super Admin") {
            $sender_logtype = "Super Admin";
        } else if ($_SESSION['logtype'] == "Faculty") {
            $sender_logtype = "Faculty";
        } else {
            $sender_logtype = "User";
        }
        if (isset($post['type']) == 'Attachment') {
            $AttachmentData = $this->ChatAttachmentUpload();
            //print_r($AttachmentData);
            $attachment_name = $AttachmentData['file_name'];
            $file_ext = $AttachmentData['file_ext'];
            $mime_type = $AttachmentData['file_type'];
        } else {
            $messageTxt = reduce_multiples($post['messageTxt'], ' ');
        }
        $data = ['sender_id' => $this->session->userdata['Admin']['id'], 'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']), 'receiver_logtype' => $receiver_logtype, 'sender_logtype' => $sender_logtype, 'message' => $messageTxt, 'attachment_name' => $attachment_name, 'file_ext' => $file_ext, 'mime_type' => $mime_type, 'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
        'ip_address' => $this->input->ip_address(), ];
        $query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data));
        $response = '';
        if ($query == true) {
            $response = ['status' => 1, 'message' => ''];
        } else {
            $response = ['status' => 0, 'message' => 'sorry we re having some technical problems. please try again !'];
        }
        echo json_encode($response);
    }
    public function ChatAttachmentUpload() {
        $file_data = '';
        if (isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])) {
            $config['upload_path'] = './uploads/attachment';
            $config['allowed_types'] = '*';
            //$config['max_size']             = 500;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachmentfile')) {
                echo json_encode(['status' => 0, 'message' => '<span style="color:#900;">' . $this->upload->display_errors() . '<span>']);
                die;
            } else {
                $file_data = $this->upload->data();
                //$filePath = $file_data['file_name'];
                return $file_data;
            }
        }
    }
    public function get_chat_history_by_vendor() {
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id'));
        $receiver_logtype = $this->input->get('receiver_logtype');
        $Logged_sender_id = $this->session->userdata['Admin']['id'];
        $upd_data['seen'] = 1;
        $r = $_SESSION['user_id'];
        $s = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id'));
        $s_logtype = $this->input->get('receiver_logtype');
        if ($_SESSION['logtype'] == "Super Admin") {
            $r_logtype = "Super Admin";
        } else if ($_SESSION['logtype'] == "Faculty") {
            $r_logtype = "Faculty";
        } else {
            $r_logtype = "User";
        }
        $this->ChatModel->update_data($upd_data, $r, $s, $s_logtype, $r_logtype);
        if ($receiver_logtype == "Super Admin") {
            $table = "admin";
            $where = "id";
        } else if ($receiver_logtype == "User") {
            $table = "user";
            $where = "user_id";
        } else if ($receiver_logtype == "Faculty") {
            $table = "faculty";
            $where = "faculty_id";
        }
        if ($_SESSION['logtype'] == "Super Admin") {
            $sender_logtype = "Super Admin";
        } else if ($_SESSION['logtype'] == "Faculty") {
            $sender_logtype = "Faculty";
        } else {
            $sender_logtype = "User";
        }
        $history = $this->ChatModel->GetReciverChatHistory($receiver_id, $receiver_logtype, $sender_logtype);
        foreach ($history as $chat) {
            $message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
            $sender_id = $chat['sender_id'];
            $userName = $this->UserModel->GetName($table, $where, $chat['sender_id']);
            $userPic = $this->UserModel->PictureUrlById($table, $where, $chat['sender_id']);
            $message = $chat['message'];
            $messagedatetime = date('d M H:i A', strtotime($chat['message_date_time']));
?>
        	<?php
            $messageBody = '';
            if ($message == 'NULL') { //fetach media objects like images,pdf,documents etc
                $classBtn = 'right';
                if ($Logged_sender_id == $sender_id) {
                    $classBtn = 'left';
                }
                $attachment_name = $chat['attachment_name'];
                $file_ext = $chat['file_ext'];
                $mime_type = explode('/', $chat['mime_type']);
                $document_url = base_url('uploads/attachment/' . $attachment_name);
                if ($mime_type[0] == 'image') {
                    $messageBody.= '<img src="' . $document_url . '" onClick="ViewAttachmentImage(' . "'" . $document_url . "'" . ',' . "'" . $attachment_name . "'" . ');" class="attachmentImgCls">';
                } else {
                    $messageBody = '';
                    $messageBody.= '<div class="attachment">';
                    $messageBody.= '<h4>Attachments:</h4>';
                    $messageBody.= '<p class="filename">';
                    $messageBody.= $attachment_name;
                    $messageBody.= '</p>';
                    $messageBody.= '<div class="pull-' . $classBtn . '">';
                    $messageBody.= '<a download href="' . $document_url . '"><button type="button" id="' . $message_id . '" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                    $messageBody.= '</div>';
                    $messageBody.= '</div>';
                }
            } else {
                $messageBody = $message;
            }
?>
            
            
        
             <?php if ($Logged_sender_id != $sender_id) { ?>     
                  <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"> 
 <?=$userName; ?></span>
                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic; ?>" alt="<?=$userName; ?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                         <?=$messageBody; ?>
                      </div>
                      <!-- /.direct-chat-text -->
                      
                    </div>
                    <!-- /.direct-chat-msg -->
			<?php
            } else { ?>
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?=$userName; ?></span>
                        <span class="direct-chat-timestamp pull-left"><?php if ($chat['seen'] == 1) { ?><i style="font-size:20px; margin-right:5px; color:#6B8E23" class="fa fa-eye" aria-hidden="true"></i> <?php
                } else { ?>
                       <i style="font-size:20px; margin-right:5px; color:#FF4500" class="fa fa-eye-slash" aria-hidden="true"></i>

                        <?php
                } ?> <?=$messagedatetime; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic; ?>" alt="<?=$userName; ?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      	<?=$messageBody; ?>
                          	<!--<div class="spiner">
                             	<i class="fa fa-circle-o-notch fa-spin"></i>
                            </div>-->
                       </div>
                       <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
             <?php
            } ?>
        
        <?php
        }
    }
    public function chat_clear_client_cs() {
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id'));
        $receiver_logtype = $this->input->get('receiver_logtype');
        $messagelist = $this->ChatModel->GetReciverMessageList($receiver_id, $receiver_logtype);
        foreach ($messagelist as $row) {
            if ($row['message'] == 'NULL') {
                $attachment_name = unlink('uploads/attachment/' . $row['attachment_name']);
            }
        }
        $this->ChatModel->TrashById($receiver_id, $receiver_logtype);
    }
}
