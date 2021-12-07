<?php
class DemoReportController extends CI_controller
{
	function __construct()
	{
		@parent::__construct();
		$this->load->model("Dbcommon", "cm");
		$this->load->model("AdminSettingsModel", "admin");
		$this->load->model("Quickadmissionprocess", "admi");
		$this->load->model("CommonModel", "co");
		$this->load->model("Task", "tm");
		$this->load->library("pagination"); 
		$this->load->library('email');
		$this->load->helper('cookie');
		$this->load->library('upload');
		$this->load->library('session');
		Header('Access-Control-Allow-Origin: *'); 
		Header('Access-Control-Allow-Headers: *'); 
		Header('Access-Control-Allow-Methods: POST, OPTIONS, PUT, DELETE , GET');



        function number_of_working_days($from, $to) {
            $workingDays = [1, 2, 3, 4, 5]; # date format = N (1 = Monday, ...)
            $holidayDays = ['*-12-25', '*-01-01','*-01-14','*-01-26','*-03-01','*-03-19','*-03-20','*-08-12','*-08-15','*-08-19','*-10-05','*-10-26','*-10-27','*-01-25']; # variable and fixed holidays
        
            $from = new DateTime($from);
            $to = new DateTime($to);
            $to->modify('+1 day');
            $interval = new DateInterval('P1D');
            $periods = new DatePeriod($from, $interval, $to);
        
            $days = 0;
            foreach ($periods as $period) {
                if (!in_array($period->format('N'), $workingDays)) continue;
                if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
                if (in_array($period->format('*-m-d'), $holidayDays)) continue;
                $days++;
            }
            return $days;
        }
    }

    public function view_report(){
        // $data = $this->cm->admi->expense_reco("expenses");
        // print_r($data); die();
            if (!empty($this->input->post('submit'))) {
                $data = $this->input->post();
                $display['demo_all'] = $this->GoogleModel->filter_ReportDemo("demo" , $data);
                $branch_ids = $_SESSION['branch_ids'];
                $b_id = explode(',',$branch_ids);
                $demoreco = array();
                foreach($display['demo_all'] as $val=>$k){
                    for($i=0;$i<sizeof($b_id); $i++){
                        if($b_id[$i] == $k->branch_id){
                            $demoreco[] = $k;
                        }
                    }
                }
                if($_SESSION['logtype'] == 'Faculty'){
                    $facdemo = array();
                        $faculty_idss = $_SESSION['user_id'];
                        foreach($display['demo_all'] as $val=>$k){
                            if($faculty_idss == $k->faculty_id){
                                $facdemo[] = $k;
                            }
                        }
                        $facfinaldemo = array();
                        for($i=0;$i<sizeof($facdemo);$i++)
                        {
                            $facdemoid = $facdemo[$i]->demo_id;
                            $flag = 1;
                            for($j=0;$j<sizeof($facfinaldemo);$j++)
                            {
                                if($facdemoid == $facfinaldemo[$j]->demo_id)
                                {
                                    $flag=0;
                                    break;
                                }
                            }
                            if($flag==1){
                                $facfinaldemo[] = $facdemo[$i];
                            }
                        }
                    $display['demo_all'] = $facfinaldemo;
                } elseif($_SESSION['logtype'] == 'HOD'){
                        $hoddemo = array();
                        $hod_ids = $_SESSION['user_id'];
                        $fac_idsss = $_SESSION['faculty_id'];
                        $fac_ids = explode(',', $fac_idsss);
                        foreach($display['demo_all'] as $val=>$k)
                        {
                            for($i=0;$i<sizeof($fac_ids);$i++)
                            {
                                if($fac_ids[$i] == $k->faculty_id)
                                {
                                    $hoddemo[] = $k;
                                }
                            }
                        }
                        $hodfacdemo = array();
                        for($i=0;$i<sizeof($hoddemo);$i++)
                        {
                            $hoddemoid = $hoddemo[$i]->demo_id;
                            $flag=1;
                            if($flag==1)
                            {
                                $hodfacdemo[] = $hoddemo;
                            }
                        }
                    $display['demo_all'] = $hodfacdemo;
                }
                $display['demo_all'] = $demoreco;
            }else
            {
                $display['demo_all'] = $this->cm->view_all("demo");
                $branch_ids = $_SESSION['branch_ids'];
                $b_id = explode(',',$branch_ids);
                $demoreco = array();
                foreach($display['demo_all'] as $val=>$k){
                    for($i=0;$i<sizeof($b_id); $i++){
                        if($b_id[$i] == $k->branch_id){
                            $demoreco[] = $k;
                        }
                    }
                }
                if($_SESSION['logtype'] == 'Faculty'){
                    $facdemo = array();
                        $faculty_idss = $_SESSION['user_id'];
                        foreach($display['demo_all'] as $val=>$k)
                        {
                            if($faculty_idss == $k->faculty_id)
                            {
                                $facdemo[] = $k;
                            }
                        }
                        $facfinaldemo = array();
                        for($i=0;$i<sizeof($facdemo);$i++)
                        {
                            $facdemoid = $facdemo[$i]->demo_id;
                            $flag = 1;
                            for($j=0;$j<sizeof($facfinaldemo);$j++)
                            {
                                if($facdemoid == $facfinaldemo[$j]->demo_id)
                                {
                                    $flag=0;
                                    break;
                                }
                            }
                            if($flag==1){
                                $facfinaldemo[] = $facdemo[$i];
                            }
                        }
                    $display['demo_all'] = $facfinaldemo;
                } elseif($_SESSION['logtype'] == 'HOD'){
                        $hoddemo = array();
                        $hod_ids = $_SESSION['user_id'];
                        $fac_idsss = $_SESSION['faculty_id'];
                        $fac_ids = explode(',', $fac_idsss);
                        foreach($display['demo_all'] as $val=>$k)
                        {
                            for($i=0;$i<sizeof($fac_ids);$i++)
                            {
                                if($fac_ids[$i] == $k->faculty_id)
                                {
                                    $hoddemo[] = $k;
                                }
                            }
                        }
                        $hodfacdemo = array();
                        for($i=0;$i<sizeof($hoddemo);$i++)
                        {
                            $hoddemoid = $hoddemo[$i]->demo_id;
                            $flag=1;
                            if($flag==1)
                            {
                                $hodfacdemo[] = $hoddemo;
                            }
                        }
                    $display['demo_all'] = $hodfacdemo;
                }
                $display['demo_all'] = $demoreco;
            }
            

        if (!empty($this->input->post('search'))) {
            $data = $this->input->post();   
            $display['demo_all'] = $this->go->filter_report("demo" , $data);
            $branch_ids = $_SESSION['branch_ids'];
            $b_id = explode(',',$branch_ids);    
            $demoreco = array();
            foreach($display['demo_all'] as $val=>$k){
                for($i=0;$i<sizeof($b_id); $i++){
                    if($b_id[$i] == $k->branch_id){ 
                        $demoreco[] = $k;
                    }
                }
            }
            $display['two_analysis'] = $demoreco;
            if($_SESSION['logtype'] == 'Faculty'){
                $facdemo = array();
                    $faculty_idss = $_SESSION['user_id'];
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        if($faculty_idss == $k->faculty_id)
                        {
                            $facdemo[] = $k;
                        }
                    }
                    $facfinaldemo = array();
                    for($i=0;$i<sizeof($facdemo);$i++)     
                    {
                        $facdemoid = $facdemo[$i]->demo_id;
                        $flag = 1;
                        for($j=0;$j<sizeof($facfinaldemo);$j++)
                        {
                            if($facdemoid == $facfinaldemo[$j]->demo_id)
                            {
                                $flag=0;
                                break;
                            }
                        }
                        if($flag==1){
                            $facfinaldemo[] = $facdemo[$i];
                        }
                    }
                $display['two_analysis'] = $facfinaldemo;
            } elseif($_SESSION['logtype'] == 'HOD'){
                    $hoddemo = array();
                    $hod_ids = $_SESSION['user_id'];
                    $fac_idsss = $_SESSION['faculty_id'];
                    $fac_ids = explode(',', $fac_idsss);
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        for($i=0;$i<sizeof($fac_ids);$i++)
                        {
                            if($fac_ids[$i] == $k->faculty_id)
                            {
                                $hoddemo[] = $k;
                            }
                        }
                    }
                    $hodfacdemo = array();
                    for($i=0;$i<sizeof($hoddemo);$i++)
                    {
                        $hoddemoid = $hoddemo[$i]->demo_id;
                        $flag=1;
                        if($flag==1)
                        {
                            $hodfacdemo[] = $hoddemo;
                        }
                    }
                $display['two_analysis'] = $hodfacdemo;
            }
        }else{ 
            $display['two_analysis'] = $this->cm->view_all("demo");
                $branch_ids = $_SESSION['branch_ids'];
                $b_id = explode(',',$branch_ids);
                $demoreco = array();
                foreach($display['two_analysis'] as $val=>$k){
                    for($i=0;$i<sizeof($b_id); $i++){
                        if($b_id[$i] == $k->branch_id){
                            $demoreco[] = $k;
                        }
                    }
                }
                $display['two_analysis'] = $demoreco;
                if($_SESSION['logtype'] == 'Faculty'){
                    $facdemo = array();
                        $faculty_idss = $_SESSION['user_id'];
                        foreach($display['two_analysis'] as $val=>$k)
                        {
                            if($faculty_idss == $k->faculty_id)
                            {
                                $facdemo[] = $k;
                            }
                        }
                        $facfinaldemo = array();
                        for($i=0;$i<sizeof($facdemo);$i++)
                        {
                            $facdemoid = $facdemo[$i]->demo_id;
                            $flag = 1;
                            for($j=0;$j<sizeof($facfinaldemo);$j++)
                            {
                                if($facdemoid == $facfinaldemo[$j]->demo_id)
                                {
                                    $flag=0;
                                    break;
                                }
                            }
                            if($flag==1){
                                $facfinaldemo[] = $facdemo[$i];
                            }
                        }
                    $display['two_analysis'] = $facfinaldemo;
                } elseif($_SESSION['logtype'] == 'HOD'){
                        $hoddemo = array();
                        $hod_ids = $_SESSION['user_id'];
                        $fac_idsss = $_SESSION['faculty_id'];
                        $fac_ids = explode(',', $fac_idsss);
                        foreach($display['two_analysis'] as $val=>$k)
                        {
                            for($i=0;$i<sizeof($fac_ids);$i++)
                            {
                                if($fac_ids[$i] == $k->faculty_id)
                                {
                                    $hoddemo[] = $k;
                                }
                            }
                        }
                        $hodfacdemo = array();
                        for($i=0;$i<sizeof($hoddemo);$i++)
                        {
                            $hoddemoid = $hoddemo[$i]->demo_id;
                            $flag=1;
                            if($flag==1)
                            {
                                $hodfacdemo[] = $hoddemo;
                            }
                        }
                    $display['two_analysis'] = $hodfacdemo;
                }
        }






        if (!empty($this->input->post('filter_outstanding_fees'))) {
            $data = $this->input->post();   
            // print_r($data);
            // die;
            $display['demo_all'] = $this->go->filter_report("demo" , $data);
            $branch_ids = $_SESSION['branch_ids'];
            $b_id = explode(',',$branch_ids);    
            $demoreco = array();
            foreach($display['demo_all'] as $val=>$k){
                for($i=0;$i<sizeof($b_id); $i++){
                    if($b_id[$i] == $k->branch_id){ 
                        $demoreco[] = $k;
                    }
                }
            }
            $display['faculty_analysis'] = $demoreco;
            if($_SESSION['logtype'] == 'Faculty'){
                $facdemo = array();
                    $faculty_idss = $_SESSION['user_id'];
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        if($faculty_idss == $k->faculty_id)
                        {
                            $facdemo[] = $k;
                        }
                    }
                    $facfinaldemo = array();
                    for($i=0;$i<sizeof($facdemo);$i++)     
                    {
                        $facdemoid = $facdemo[$i]->demo_id;
                        $flag = 1;
                        for($j=0;$j<sizeof($facfinaldemo);$j++)
                        {
                            if($facdemoid == $facfinaldemo[$j]->demo_id)
                            {
                                $flag=0;
                                break;
                            }
                        }
                        if($flag==1){
                            $facfinaldemo[] = $facdemo[$i];
                        }
                    }
                $display['faculty_analysis'] = $facfinaldemo;
            } elseif($_SESSION['logtype'] == 'HOD'){
                    $hoddemo = array();
                    $hod_ids = $_SESSION['user_id'];
                    $fac_idsss = $_SESSION['faculty_id'];
                    $fac_ids = explode(',', $fac_idsss);
                    foreach($display['two_analysis'] as $val=>$k)
                    {
                        for($i=0;$i<sizeof($fac_ids);$i++)
                        {
                            if($fac_ids[$i] == $k->faculty_id)
                            {
                                $hoddemo[] = $k;
                            }
                        }
                    }
                    $hodfacdemo = array();
                    for($i=0;$i<sizeof($hoddemo);$i++)
                    {
                        $hoddemoid = $hoddemo[$i]->demo_id;
                        $flag=1;
                        if($flag==1)
                        {
                            $hodfacdemo[] = $hoddemo;
                        }
                    }
                $display['faculty_analysis'] = $hodfacdemo;
            }
        }else{ 
            $display['two_analysis'] = $this->cm->view_all("demo");
                $branch_ids = $_SESSION['branch_ids'];
                $b_id = explode(',',$branch_ids);
                $demoreco = array();
                foreach($display['two_analysis'] as $val=>$k){
                    for($i=0;$i<sizeof($b_id); $i++){
                        if($b_id[$i] == $k->branch_id){
                            $demoreco[] = $k;
                        }
                    }
                }
                $display['faculty_analysis'] = $demoreco;
                if($_SESSION['logtype'] == 'Faculty'){
                    $facdemo = array();
                        $faculty_idss = $_SESSION['user_id'];
                        foreach($display['two_analysis'] as $val=>$k)
                        {
                            if($faculty_idss == $k->faculty_id)
                            {
                                $facdemo[] = $k;
                            }
                        }
                        $facfinaldemo = array();
                        for($i=0;$i<sizeof($facdemo);$i++)
                        {
                            $facdemoid = $facdemo[$i]->demo_id;
                            $flag = 1;
                            for($j=0;$j<sizeof($facfinaldemo);$j++)
                            {
                                if($facdemoid == $facfinaldemo[$j]->demo_id)
                                {
                                    $flag=0;
                                    break;
                                }
                            }
                            if($flag==1){
                                $facfinaldemo[] = $facdemo[$i];
                            }
                        }
                    $display['faculty_analysis'] = $facfinaldemo;
                } elseif($_SESSION['logtype'] == 'HOD'){
                        $hoddemo = array();
                        $hod_ids = $_SESSION['user_id'];
                        $fac_idsss = $_SESSION['faculty_id'];
                        $fac_ids = explode(',', $fac_idsss);
                        foreach($display['two_analysis'] as $val=>$k)
                        {
                            for($i=0;$i<sizeof($fac_ids);$i++)
                            {
                                if($fac_ids[$i] == $k->faculty_id)
                                {
                                    $hoddemo[] = $k;
                                }
                            }
                        }
                        $hodfacdemo = array();
                        for($i=0;$i<sizeof($hoddemo);$i++)
                        {
                            $hoddemoid = $hoddemo[$i]->demo_id;
                            $flag=1;
                            if($flag==1)
                            {
                                $hodfacdemo[] = $hoddemo;
                            }
                        }
                    $display['faculty_analysis'] = $hodfacdemo;
                }
        }
            $re = $this->db->query("SELECT * FROM demo WHERE demoDate < Now() and demoDate > DATE_ADD(Now(), INTERVAL- 6 MONTH)");
            $display['last'] = $re->result();			
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        //$display['faculty_analysis'] = $this->cm->view_all("demo");  
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['all_user'] = $this->cm->view_all("user");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_report',$display);
    }

    public function getlogtypeuser()
    {
        $data = $this->input->post();
        $b_id = $data['branch_id'];
        $logtype = $data['logtype_name'];  
        $User = $this->cm->select_result('user','logtype',$logtype);
        echo '<option value="">----Select Package----</option>';
        foreach ($User as $val) {
            $flag = 0;
            $dnbi = explode(',', $val->branch_ids);
            if (in_array($b_id, $dnbi)) {
                $flag = 1;
            }
            if ($flag == 1) {
                ?>
                <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                <?php
            }
        }           
    }
    public function view_faculty_report(){
        if (!empty($this->input->post('faculty_analysis'))) {
        $data = $this->input->post();
        $display['faculty_analysis'] = $this->cm->filter_demo_faculty_analysis("demo", $data);
        $display['filter_demoDate_start'] = @$data['filter_demoDate_start'];
        $display['filter_demoDate_end'] = @$data['filter_demoDate_end'];
        } else {
            $display['faculty_analysis'] = $this->cm->view_all("demo");
        }       
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_faculty_report',$display);
    }

    public function view_notification()
    {
        $display['notified_data'] = $this->co->get_notification('admission_courses');
        $branch_ids = $_SESSION['branch_ids'];
        $b_id = explode(',',$branch_ids);
        $notifyreco = array();
        foreach($display['notified_data'] as $val=>$k){
            for($i=0;$i<sizeof($b_id); $i++){
                if($b_id[$i] == $k->branch_id){
                    $notifyreco[] = $k;
                }
            }
        }
        // $notifirecordbranch = array();
        // for($i=0;$i<sizeof($notifyreco);$i++){
        //     $facnotid = $notifyreco[$i]->gr_id;
        //     $flag = 1;
        //     for($j=0;$j<sizeof($notifirecordbranch);$j++){
        //         if($facnotid == $notifirecordbranch[$j]->gr_id){
        //             $flag=0;
        //             break;
        //         }
        //     }
        //     if($flag==1){
        //         $notifirecordbranch[] = $notifyreco[$i];
        //     }
        // }
        $display['notified_data'] = $notifyreco;
        if($_SESSION['logtype'] == 'Faculty'){
            $facnotifi = array();
            $batches = $this->cm->view_all("batches");
            $faculty = $this->cm->view_all_faculty("faculty");
            foreach($display['notified_data'] as $k->$val){
                foreach($batches as $row){
                    if($k->batch_id == $row->batches_id){
                        foreach($faculty as $vh){
                            if($vh->faculty_id == $row->faculty_id){
                                $facnotifi[] = $k;
                            }
                        }
                    }
                }
            }
            $facultynotifie = array();
            for($i=0;$i<sizeof($facnotifi);$i++){
                $facnotid = $facnotifi[$i]->gr_id;
                $flag = 1;
                for($j=0;$j<sizeof($facultynotifie);$j++){
                    if($facnotid == $facultynotifie[$j]->gr_id){
                        $flag=0;
                        break;
                    }
                }
                if($flag==1){
                    $facultynotifie[] = $facnotifi[$i];
                }
            }
            $display['notified_data'] = $facultynotifie;  
        } elseif($_SESSION['logtype'] == 'hod'){
            $hodreco = array();
            $batches = $this->cm->view_all("batches");
            $faculty = $this->cm->view_all_faculty("faculty");
            $hod_ids = $_SESSION['user_id'];
            $fac_idsss = $_SESSION['faculty_id'];
            $fac_ids = explode(',', $fac_idsss);
            foreach($display['notified_data'] as $k=>$val){
                for($i=0;$i<sizeof($fac_ids);$i++){
                    foreach($batches as $row){
                        if($val->batch_id == $row->batches_id){
                            foreach($faculty as $vh){
                                if($vh->faculty_id == $fac_ids[$i]){
                                    $hodreco[] = $val;
                                }
                            }
                        }
                    }
                }     
            }
            $hodnotifie = array();
            for($i=0;$i<sizeof($hodreco);$i++){
                $hodinsot = $hodreco[$i]->gr_id;
                $flag = 1;
                for($j=0;$j<sizeof($hodnotifie);$j++){
                    if($hodinsot == $hodnotifie[$j]->gr_id){
                        $flag=0;
                        break;
                    }
                }
                if($flag==1){
                    $hodnotifie[] = $hodreco[$i];
                }
            }
            $display['notified_data'] = $hodnotifie;  
        }
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['doc_list'] = $this->cm->view_all("admission_documents");
        $display['list_department'] = $this->cm->view_all("department");
		$display['list_branch'] = $this->cm->view_all("branch");
		$display['list_course'] = $this->cm->view_all("rnw_course");
		$display['list_package'] = $this->cm->view_all("rnw_package");
		$display['list_source'] = $this->cm->view_all("lead_source");
		$display['list_country'] = $this->cm->view_all("country");
		$display['list_state'] = $this->cm->view_all("state");
		$display['list_user'] = $this->cm->view_all("user");
		$display['list_city'] = $this->cm->view_all("cities");
		$display['list_area'] = $this->cm->view_all("area");
		$display['list_batch'] = $this->cm->view_all("batches");
		$display['all_admission'] = $this->cm->view_all("admission_process");
		$display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		$display['faculty_all'] = $this->cm->view_all("faculty");   
		$display['batches_all'] = $this->cm->view_all("batches");
		$display['college_courses_all'] = $this->cm->view_all("college_courses");
		$display['admisison_process_data'] = $this->cm->view_all("admission_process");
		$display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");
		$display['sms_template_list'] = $this->cm->view_all("sms_template");
		$display['list_email_template'] = $this->cm->view_all("email_template_category");
		$display['list_all_admission_count'] = $this->admi->all_count_admission("admission_process");
		$display['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_notification',$display);
    }


  //   public function view_all_permission()
  //   {
  //       if(@$_GET['logtype'] != ''){
  //           $log = $_GET['logtype'];
  //           $select_reco = $this->cm->get_reco('logtype', 'logtype_id', $log);
  //           $f_pers = $select_reco->f_permission;
  //           $f_perms = explode(",",$f_pers);
  //           $display['f_perms'] = $f_perms;
  //           $m_pers = $select_reco->m_permission;
  //           $m_perms = explode(",",$m_pers); 
  //           $display['m_perms'] = $m_perms;
  //           $pers = $select_reco->permission;
  //           $perms = explode(",",$pers);
  //           $display['permis'] = $perms;

  //           $ppers = $select_reco->p_permission;
  //           $pperms = explode(",",$ppers);
  //           $display['ppermis'] = $pperms;
  //       }else{
  //           $select_reco = $this->cm->get_reco('logtype', 'logtype_name', "Admin");
  //           $f_pers = $select_reco->f_permission;
  //           $f_perms = explode(",",$f_pers);
  //           $display['f_perms'] = $f_perms;
  //           $m_pers = $select_reco->m_permission;
  //           $m_perms = explode(",",$m_pers); 
  //           $display['m_perms'] = $m_perms;
  //           $pers = $select_reco->permission;
  //           $perms = explode(",",$pers);
  //           $display['permis'] = $perms;

  //           $ppers = $select_reco->p_permission;
  //           $pperms = explode(",",$ppers);
  //           $display['ppermis'] = $pperms;
  //       }

  //       $update['upd_see'] = $this->cm->check_update("demo");
  //       $update['f_module'] = $this->cm->view_all("f_module");
  //       $update['m_module'] = $this->cm->view_all("m_module");
  //       $update['l_module'] = $this->cm->view_all("l_module");
  //       $update['p_module'] = $this->cm->view_all("p_module");
  //       $display['p_modules'] = $this->cm->view_all("p_module");
  //       $display['department_all'] = $this->cm->view_all("department");
  //       $display['branch_all'] = $this->cm->view_all("branch");
  //       $display['course_all'] = $this->cm->view_all("course");
  //       $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
  //       $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
  //       $display['doc_list'] = $this->cm->view_all("admission_documents");
  //       $display['list_department'] = $this->cm->view_all("department");
		// $display['list_branch'] = $this->cm->view_all("branch");
		// $display['list_course'] = $this->cm->view_all("rnw_course");
		// $display['list_package'] = $this->cm->view_all("rnw_package");    
		// $display['list_source'] = $this->cm->view_all("lead_source");
		// $display['list_country'] = $this->cm->view_all("country");
		// $display['list_state'] = $this->cm->view_all("state");
		// $display['list_user'] = $this->cm->view_all("user");
		// $display['list_city'] = $this->cm->view_all("cities");
		// $display['list_area'] = $this->cm->view_all("area");
		// $display['list_batch'] = $this->cm->view_all("batches");
		// $display['all_admission'] = $this->cm->view_all("admission_process");
		// $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
		// $display['faculty_all'] = $this->cm->view_all("faculty");   
		// $display['batches_all'] = $this->cm->view_all("batches");
		// $display['college_courses_all'] = $this->cm->view_all("college_courses");
		// $display['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");
  //       $display['log_all'] = $this->cm->view_all("logtype");
  //       $display['msg_dwmo'] = "helllo world";

  //       $this->load->view('erp/erpheader',$update);
  //       $this->load->view('common/view_all_permission',$display);
  //   }

       public function view_all_permission()
    {
            if(@$_GET['logtype'] != ''){
                $log = $_GET['logtype'];
                $select_reco = $this->cm->get_reco('logtype', 'logtype_id', $log);
                $f_pers = $select_reco->f_permission;
                $f_perms = explode(",",$f_pers);
                $display['f_perms'] = $f_perms;
                $m_pers = $select_reco->m_permission;
                $m_perms = explode(",",$m_pers); 
                $display['m_perms'] = $m_perms;
                $pers = $select_reco->permission; 
                $perms = explode(",",$pers);
                $display['permis'] = $perms;
                $ppers = $select_reco->p_permission;
                $pperms = explode(",",$ppers);
                $display['ppermis'] = $pperms;
                $display['log_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
            }else{
                $select_reco = $this->cm->get_reco('logtype', 'logtype_name', "Admin");
                $f_pers = $select_reco->f_permission;     
                $f_perms = explode(",",$f_pers);
                $display['f_perms'] = $f_perms;
                $m_pers = $select_reco->m_permission;
                $m_perms = explode(",",$m_pers); 
                $display['m_perms'] = $m_perms;
                $pers = $select_reco->permission;
                $perms = explode(",",$pers);
                $display['permis'] = $perms;
                $ppers = $select_reco->p_permission;
                $pperms = explode(",",$ppers);
                $display['ppermis'] = $pperms;
                $display['log_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
            }
            $display['log_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
            $update['upd_see'] = $this->cm->check_update("demo");
            $update['f_module'] = $this->cm->view_all("f_module");
            $update['m_module'] = $this->cm->view_all("m_module");
            $update['l_module'] = $this->cm->view_all("l_module");
            $update['p_module'] = $this->cm->view_all("p_module");
            $display['department_all'] = $this->cm->view_all("department");
            $display['branch_all'] = $this->cm->view_all("branch");
            $display['course_all'] = $this->cm->view_all("course");
            $display['faculty_all'] = $this->cm->view_all_faculty("faculty");     
            $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
            $display['doc_list'] = $this->cm->view_all("admission_documents");
            $display['list_department'] = $this->cm->view_all("department");
            $display['list_branch'] = $this->cm->view_all("branch");
            $display['list_course'] = $this->cm->view_all("rnw_course");
            $display['list_package'] = $this->cm->view_all("rnw_package");    
            $display['list_source'] = $this->cm->view_all("lead_source");
            $display['list_country'] = $this->cm->view_all("country");
            $display['list_state'] = $this->cm->view_all("state");
            $display['list_user'] = $this->cm->view_all("user");
            $display['list_city'] = $this->cm->view_all("cities");
            $display['list_area'] = $this->cm->view_all("area");
            $display['list_batch'] = $this->cm->view_all("batches");
            $display['all_admission'] = $this->cm->view_all("admission_process");
            $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
            $display['faculty_all'] = $this->cm->view_all("faculty");   
            $display['batches_all'] = $this->cm->view_all("batches");
            $display['college_courses_all'] = $this->cm->view_all("college_courses");
            $display['admisison_process_data'] = $this->cm->view_all("admission_process");
            $display['overdue_fees_counting_list'] = $this->admi->overdue_fees_counting("admission_installment");
            $display['sms_template_list'] = $this->cm->view_all("sms_template");
            $display['list_email_template'] = $this->cm->view_all("email_template_category");
            $display['list_all_admission_count'] = $this->admi->all_count_admission("admission_process");
            $display['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");
    
            $this->load->view('erp/erpheader', $update);
            $this->load->view('common/view_all_permission',$display);
    }


    public function get_per_logtype(){
        $data = $this->input->post();
        $log = $data['logtype_id'];
        $select_reco = $this->cm->get_reco('logtype', 'logtype_id', $log);
        $f_pers = $select_reco->f_permission;
        $f_perms = explode(",",$f_pers);
        $display['f_perms'] = $f_perms;
        $m_pers = $select_reco->m_permission;
        $m_perms = explode(",",$m_pers); 
        $display['m_perms'] = $m_perms;
        $pers = $select_reco->permission; 
        $perms = explode(",",$pers);
        $display['permis'] = $perms;
        $ppers = $select_reco->p_permission;
        $pperms = explode(",",$ppers);
        $display['ppermis'] = $pperms;
        // echo "<pre>";
        // print_r($display);
        // die;
        $display['f_module'] = $this->cm->view_all("f_module");
        $display['m_module'] = $this->cm->view_all("m_module");
        $display['l_module'] = $this->cm->view_all("l_module");
        $display['p_module'] = $this->cm->view_all("p_module");
        //$display['log_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
        $this->load->view('common/ajex_permission_log',$display);
    }


    public function upd_permission()
	{
		$data = $this->input->post();
        $fper = implode(",",$data['fpermission']);
        $lper = implode(",",$data['lpermission']);
        $mper = implode(",",$data['mpermission']);
        if(!empty($data['ppermission'])){
        $pper = implode(",",$data['ppermission']);
        }else {
            $pper = '';
        }
        if($data['logtype_id'] != ''){
            $logtype_id = $data['logtype_id'];
            $select_reco = $this->cm->get_reco('logtype', 'logtype_id', $logtype_id);
            $log_name = $select_reco->logtype_name;
            $record = array('f_permission' => $fper, 'permission' => $lper, 'm_permission' => $mper , 'p_permission' => $pper);
            $query = $this->admi->batch_course_status('logtype' , $record , 'logtype_id' , $logtype_id);
            $query3 = $this->admi->batch_course_status('user' , $record , 'logtype' , $log_name);
            if($query)
            {
                $recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp);
            }else
            {
                $recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
                echo json_encode($recp);
            }
        }else{
            $logtype_id = 1;
            $select_reco = $this->cm->get_reco('logtype', 'logtype_id', $logtype_id);
            $log_name = $select_reco->logtype_name;
            $record = array('f_permission' => $fper, 'permission' => $lper, 'm_permission' => $mper , 'p_permission' => $pper);
            $query = $this->admi->batch_course_status('logtype' , $record , 'logtype_id' , $logtype_id);
            $query3 = $this->admi->batch_course_status('user' , $record , 'logtype' , $log_name);
            if($query)
            {
                $recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp);
            }else
            {
                $recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
                echo json_encode($recp);
            }
        }
		
	}


    public function view_all_user_permission()
    {
        if($_GET['user'] != ''){
            $log = $_GET['user'];
            $select_reco = $this->cm->get_reco('user', 'user_id', $log);
            $f_pers = $select_reco->f_permission;
            $f_perms = explode(",",$f_pers);
            $display['f_perms'] = $f_perms;
            $m_pers = $select_reco->m_permission;
            $m_perms = explode(",",$m_pers); 
            $display['m_perms'] = $m_perms;
            $pers = $select_reco->permission;
            $perms = explode(",",$pers);
            $display['permis'] = $perms;
            $ppers = $select_reco->p_permission;
            $pperms = explode(",",$ppers);
            $display['ppermis'] = $pperms;
        }else{
            $log = 6;
            $select_reco = $this->cm->get_reco('user', 'user_id', $log);
            $f_pers = $select_reco->f_permission;
            $f_perms = explode(",",$f_pers);
            $display['f_perms'] = $f_perms;
            $m_pers = $select_reco->m_permission;
            $m_perms = explode(",",$m_pers); 
            $display['m_perms'] = $m_perms;
            $pers = $select_reco->permission;
            $perms = explode(",",$pers);
            $display['permis'] = $perms;
            $ppers = $select_reco->p_permission;
            $pperms = explode(",",$ppers);
            $display['ppermis'] = $pperms;
        }   
        $update['upd_see'] = $this->cm->check_update("demo");
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $update['p_module'] = $this->cm->view_all("p_module");
        $display['p_modules'] = $this->cm->view_all("p_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['doc_list'] = $this->cm->view_all("admission_documents");
        $display['list_department'] = $this->cm->view_all("department");
        $display['list_branch'] = $this->cm->view_all("branch");
        $display['list_course'] = $this->cm->view_all("rnw_course");
        $display['list_package'] = $this->cm->view_all("rnw_package");    
        $display['list_source'] = $this->cm->view_all("lead_source");
        $display['list_country'] = $this->cm->view_all("country");
        $display['list_state'] = $this->cm->view_all("state");
        $display['list_user'] = $this->cm->view_all("user");
        $display['list_city'] = $this->cm->view_all("cities");
        $display['list_area'] = $this->cm->view_all("area");
        $display['list_batch'] = $this->cm->view_all("batches");
        $display['all_admission'] = $this->cm->view_all("admission_process");
        $display['hod_all'] = $this->cm->view_all_hod_demo("hod");
        $display['faculty_all'] = $this->cm->view_all("faculty");   
        $display['batches_all'] = $this->cm->view_all("batches");
        $display['college_courses_all'] = $this->cm->view_all("college_courses");
        $display['list_dropdown_adm'] = $this->cm->view_all("dropdown_adm");
        $display['log_all'] = $this->cm->filter_data("logtype", "parent_id", "0");
        $display['msg_dwmo'] = "helllo world";

        $this->load->view('erp/erpheader',$update);
        $this->load->view('common/view_all_user_permission',$display);
    }

    public function get_user_logtype_wise(){
        $data = $this->input->post();
        $logtype = $data['logtype_name'];  
        $User = $this->cm->select_result('user','logtype',$logtype);
        echo '<option value="">Select User</option>';
        foreach ($User as $val) {
                ?>
                <option value="<?php echo $val->user_id; ?>"><?php echo $val->name; ?></option>
                <?php
        }          
    }


    public function get_log_user_permission()
    {
        $data = $this->input->post();
        $log = $data['user_id'];
        $select_reco = $this->cm->get_reco('user', 'user_id', $log);
        $f_pers = $select_reco->f_permission;
        $display['user_name'] = $select_reco->name;
        $f_perms = explode(",",$f_pers);
        $display['f_perms'] = $f_perms;
        $m_pers = $select_reco->m_permission;
        $m_perms = explode(",",$m_pers); 
        $display['m_perms'] = $m_perms;
        $pers = $select_reco->permission;
        $perms = explode(",",$pers);
        $display['permis'] = $perms;
        $ppers = $select_reco->p_permission;
        $pperms = explode(",",$ppers);
        $display['ppermis'] = $pperms;
        $display['f_module'] = $this->cm->view_all("f_module");
        $display['m_module'] = $this->cm->view_all("m_module");
        $display['l_module'] = $this->cm->view_all("l_module");
        $display['p_module'] = $this->cm->view_all("p_module");
        // echo "<pre>";-
        // print_r($display);
        // die;
        $this->load->view('common/ajex_permission_log_user',$display);
    }
    
     public function upd_user_permission()
    {
        $data = $this->input->post();
        // echo "<pre>";
        // print_r($data);
        // die;
        $fper = implode(",",$data['fpermission']);
        $lper = implode(",",$data['lpermission']);
        $mper = implode(",",$data['mpermission']);
        if(!empty($data['ppermission'])){
        $pper = implode(",",$data['ppermission']);
        } else {
            $pper = '';
        }
        if($data['user_id'] != ''){
            $user_id = $data['user_id'];
            $record = array('f_permission' => $fper, 'permission' => $lper, 'm_permission' => $mper , 'p_permission' => $pper);
            $query = $this->admi->batch_course_status('user' , $record , 'user_id' , $user_id);
            if($query){
                $recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp);
            } else {
                $recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
                echo json_encode($recp);
            }
        } else {
            $logtype_id = 6;
            $record = array('f_permission' => $fper, 'permission' => $lper, 'm_permission' => $mper , 'p_permission' => $pper);
            $query = $this->admi->batch_course_status('user' , $record , 'user_id' , $user_id);
            if($query){
                $recp['all_record'] = array( 'status' => 1 , "msg" => "HI! This Record Successfully Updated");
                echo json_encode($recp);
            } else {
                $recp['all_record'] = array('status' => 2 ,"msg" => " Try again!!");
                echo json_encode($recp);
            }
        }
        
    }


    public function view_certificate()
    {
	$config = get_config();
	echo "<pre>";
	print_r($config);
	die;
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['faculty_analysis'] = $this->cm->view_all("demo");  
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['user_all'] = $this->cm->view_all("user");
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['certificate_admi'] = $this->cm->view_all('admission_certificate');
        $display['certificate_course'] = $this->cm->view_all('cer_course_list');
        $display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['all_user'] = $this->cm->view_all("user");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_certificate',$display);
    }

    public function add_certificate_request()
    {
        $data = $this->input->post(); 
        $record = $this->cm->get_reco("admission_process" , "gr_id" , $data['gr_id']); 
        $dep_code = $this->cm->get_reco("department" , "department_id " , $record->department_id); 
        $last_reco_id = $this->cm->get_lastreco("admission_certificate");
        $b_all = $this->cm->select_data('branch', 'branch_id', $data['branch_id']);
        $x = $this->db->query("SELECT count(id) as c , branch  FROM admission_certificate GROUP BY branch");
        $y =  $x->result_array();
        $dm = date('Y');
        $flag = 0;
        foreach($y as $v)
        {
            if($v['branch']==$data['branch_id'])
            {
               $erno =  $v['c']+1;
               $flag =1;
            }
        }
        if($flag == 0)
        {
            $erno = 1;
        }
        $feron = '';
        if($erno < 10){
            $feron = '0'.$erno;
        }
        $ins_data['reg_no'] = $b_all->branch_code . $dep_code->department_code . $dm .$feron;
        $ins_data['reg_code'] = $data['gr_id'];
        $ins_data['email'] = $record->email;
        $ins_data['bdate'] = $record->stu_dob;
        $ins_data['mob'] = $record->mobile_no;
        $ins_data['gen'] = $record->gender;
        $ins_data['date'] = date("Y-m-d");
        $ins_data['course'] = $data['course_name'];
        $ins_data['fees'] = $record->tuation_fees;
        $ins_data['reg_fees'] = $record->registration_fees;
        $ins_data['branch'] = $b_all->branch_area;
        $ins_data['city'] = $record->present_city_id;
        $ins_data['cen_name'] = $b_all->branch_area;
        $admi_id = $record->admission_id;
        $this->db->select('SUM(paid_amount) as amount');
        $this->db->from('admission_installment');
        $this->db->where('admission_id', $admi_id);
        $query = $this->db->get();
        foreach ($query->result() as $key => $value) {
            $ins_data['paid_fees'] = $value->amount;
        } 
        $ins_data['branch'] = $b_all->branch_area;
        $ins_data['name'] = strtoupper($data['fullname']);
        $ins_data['address'] = strtoupper($record->present_flate_house_no.','.$record->present_city_id);
        $ins_date = number_of_working_days($data['start_date'] , $data['end_date']);
        $ins_data['duration'] = round($ins_date / 30.5);
        $ins_data['sdate'] = $data['start_date'];
        $ins_data['edate'] = $data['end_date'];
        $ins_data['IssueDate'] = $data['issue_date'];
        $ins_data['confer_status'] = 1;
        $ins_data['status'] = 0;
        $ins_data['grid'] = $data['gr_id'];
        $ins_data['certificate_generate_date'] = date("Y-m-d h:i:sa");
        $ins_data['cen_code'] = $b_all->branch_code;
        $ins_data['grade'] = $data['grade'];
        if($record->admission_status == "Completed" && $ins_data['paid_fees'] == $record->tuation_fees){ 
            $query = $this->cm->save_data("admission_certificate" , $ins_data);
            if ($query) {
                $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
                echo json_encode($recp); // echo "1";
            } else {
                $recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
                echo json_encode($recp); // echo "2";
            }
        }else{
                $recp["all_record"] = array('status' => 4, "msg" => "Something Wrong");
                echo json_encode($recp);
        }
    }


    public function Download_certificate()
    {
        $data = $this->input->get('id');
        $record['get_cert'] = $this->cm->get_reco("admission_certificate" , "id" , $data); 
        $reco = array('name' => $record['get_cert']->name , 'reg_code' => $record['get_cert']->reg_code ,'reg_no' => $record['get_cert']->reg_no,'course' => $record['get_cert']->course,'sdate' => $record['get_cert']->sdate,'edate' => $record['get_cert']->edate , 'IssueDate' => $record['get_cert']->IssueDate , 'branch' => $record['get_cert']->branch, 'grade' => $record['get_cert']->grade, 'print_date' => date("Y-m-d H:i:s A") , 'status' => 0);
        $query = $this->cm->save_data("certificate_table" , $reco);
        $print_status = array('print_status' => 1 );
        $query = $this->cm->update_job_position_record('admission_certificate' ,'id' , $data , $print_status);
        $this->load->view('common/certificate',$record);
    }



    public function Add_certificate_remark()
    {
        $data = $this->input->post();
        $record['single_reco'] = $this->cm->get_reco("admission_process" , "gr_id" , $data['grid']); 
        echo json_encode($record);
    }


    public function rmark_certi()
    {
        $data = $this->input->post();
        $record['single_reco'] = $this->cm->get_reco("admission_process" , "admission_id" , $data['admission_id']); 
        $ins_data['branch_id'] = $record['single_reco']->branch_id;
        $ins_data['admission_id'] = $data['admission_id'];
        $ins_data['rating'] = $data['rating'];
        $ins_data['admission_remrak'] = $data['remark'];
        $ins_data['labels'] = 'Certificate';
        $ins_data['remarks_date'] = date("Y-m-d");
        $ins_data['remarks_time'] = date("H:i A");
        $ins_data['addby'] = $_SESSION['user_name'];
        $ins_data['timestamp'] = date("Y-m-d H:i:s A");
        $query = $this->cm->save_data("admission_remarks" , $ins_data);
        if ($query) {
            $recp["all_record"] = array('status' => 1, "msg" => "HI! This Record Successfully Inserted");
            echo json_encode($recp); // echo "1";
        } else {
            $recp["all_record"] = array('status' => 2, "msg" => "Something Wrong");
            echo json_encode($recp); // echo "2";
        }
    }


    public function view_certificate_permission()
    {
        $update['upd_see'] = $this->cm->check_update("demo");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['faculty_analysis'] = $this->cm->view_all("demo");  
        $update['f_module'] = $this->cm->view_all("f_module");
        $update['m_module'] = $this->cm->view_all("m_module");
        $update['l_module'] = $this->cm->view_all("l_module");
        $display['department_all'] = $this->cm->view_all("department");
        $display['branch_all'] = $this->cm->view_all("branch");
        $display['course_all'] = $this->cm->view_all("course");
        $display['user_all'] = $this->cm->view_all("user");
        $display['certificate_admi'] = $this->cm->view_all('admission_certificate');
        $display['faculty_all'] = $this->cm->view_all_faculty("faculty");
        $display['cancel_reason_all'] = $this->cm->view_all("cancel_reason_list");
        $display['logtypestaff_all'] = $this->cm->view_all("staff_logtype");
        $display['all_user'] = $this->cm->view_all("user");

        $this->load->view('erp/erpheader', $update);
        $this->load->view('common/view_certificate_permission',$display);
    }

}    
