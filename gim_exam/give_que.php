<?php 

    ob_start();
    session_start();
    include('config.php');

$sqls = "SELECT * FROM gim_students WHERE schedule_id='6'";
$resu = mysqli_query($conn,$sqls);




$selected_sub = 'l';

$que_ = "SELECT * FROM gim_logic WHERE status='1'";

$res_ = mysqli_query($conn,$que_);

if($selected_sub == 'p'){
    $que = "SELECT id FROM gim_question where `subject`=1 AND `status`='1'";
} else if($selected_sub == 'a'){
    $que = "SELECT id FROM gim_question where `subject`=2 AND `status`='1'";
} else if($selected_sub == 'c'){
    $que = "SELECT id FROM gim_question where `subject`=3 AND `status`='0'";
} else if($selected_sub == 'pg'){
    $que = "SELECT id FROM gim_question where `subject`=4 AND `status`='1'";
} else if($selected_sub == 'l'){
    $que = "SELECT id FROM gim_question where `subject`=5 AND `status`='1'";
} else {
    header("location:profile.php");
}
$res = mysqli_query($conn,$que);


while($p_row = mysqli_fetch_assoc($res)){

    $rooo[] = $p_row;

}

while($row = mysqli_fetch_assoc($resu))
{

    $grid = $row['grid'];

    $schedule_id = $row['schedule_id'];

    $qq = "SELECT * FROM gim_schedule WHERE id='$schedule_id'";
    $rr = mysqli_query($conn,$qq);

    while($rr = mysqli_fetch_assoc($rr)){
        $status = $rr['status'];
    }

    if($status==1){

        $selec = array();
    

        if($selected_sub == 'p'){

            $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$schedule_id'";
            $p_res = mysqli_query($conn,$p_sql);

            if(mysqli_num_rows($p_res)>0){

                
                if($p_row['psd_w'] != ""){
                    
                    $_SESSION['p_pos'] = explode("#",$p_row['psd_w']);
                    $nums = $_SESSION['p_pos'];
                    
                } else {
                    
                    // if(!(isset($_SESSION['p_pos']))) {
                        $nums_p = get_rand_number(0,mysqli_num_rows($res)-1,1);
                        $_SESSION['p_pos'] = $nums_p;
                        // }
                        $nums = $_SESSION['p_pos'];

                        for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                            $selec[] = $rooo[$nums[$i2]]['id'];
    
                        }
                        echo $row['grid']." = PSD W<br>";
                        print_r($selec);
                        echo "<br><br>";
                        $d = implode("#",$selec);
                        $pi_sql = "UPDATE gim_std_paper SET psd_W='$d' WHERE grid='$grid' AND schedule_id='$schedule_id'";
                        $pi_res = mysqli_query($conn,$pi_sql);    
                        
                    }
                    
                } else {
                    
               
                    $nums_p = get_rand_number(0,mysqli_num_rows($res)-1,1);
                   
                    $_SESSION['p_pos'] = $nums_p;
                // }
                $nums = $_SESSION['p_pos'];
            
                for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                    $selec[] = $rooo[$nums[$i2]]['id'];

                }

                echo $row['grid']." = PSD W<br>";
                print_r($selec);
                echo "<br><br>";

                $d = implode("#",$selec);
                $pi_sql = "INSERT INTO gim_std_paper (grid,psd_w,schedule_id) VALUES ('$grid','$d','$schedule_id')";
                $pi_res = mysqli_query($conn,$pi_sql);
            }

        } else if($selected_sub == 'a'){

            $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$schedule_id'";
            $p_res = mysqli_query($conn,$p_sql);

            

            if(mysqli_num_rows($p_res)>0){

                $p_row = mysqli_fetch_assoc($p_res);

                if($p_row['animate'] != ""){

                    $_SESSION['a_pos'] = explode("#",$p_row['animate']);
                    $nums = $_SESSION['a_pos'];
                } else {

                    // if(!(isset($_SESSION['a_pos']))) {
                        $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                        $_SESSION['a_pos'] = $nums_a;
                    // }
                    
                    $nums = $_SESSION['a_pos'];                

                    for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                        $selec[] = $rooo[$nums[$i2]]['id'];

                    }
                    echo $row['grid']." = Animate<br>";
                    print_r($selec);
                    echo "<br><br>";

                    $d = implode("#",$selec);
                    $pi_sql = "UPDATE gim_std_paper SET animate='$d' WHERE grid='$grid' AND schedule_id='$schedule_id'";
                    $pi_res = mysqli_query($conn,$pi_sql);    

                }




            } else {

                // if(!(isset($_SESSION['a_pos']))) {
                    $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                    $_SESSION['a_pos'] = $nums_a;
                // }
                $nums = $_SESSION['a_pos'];

                for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                    $selec[] = $rooo[$nums[$i2]]['id'];

                }

                $d = implode("#",$selec);

                echo $row['grid']." = Animate<br>";
                print_r($selec);
                echo "<br><br>";

                $pi_sql = "INSERT INTO gim_std_paper (grid,animate,schedule_id) VALUES ('$grid','$d','$schedule_id')";
                $pi_res = mysqli_query($conn,$pi_sql);
            }


        } else if($selected_sub == 'c'){

            $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$schedule_id'";
            $p_res = mysqli_query($conn,$p_sql);

            if(mysqli_num_rows($p_res)>0){

                $p_row = mysqli_fetch_assoc($p_res);

                if($p_row['c_lang'] != ""){

                    $_SESSION['c_pos'] = explode("#",$p_row['c_lang']);
                    $nums = $_SESSION['c_pos'];
                } else {

                    // if(!(isset($_SESSION['c_pos']))) {
                        $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,5);
                        $_SESSION['c_pos'] = $nums_a;
                    // }
                    $nums = $_SESSION['c_pos'];
                    
                    for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                        $selec[] = $rooo[$nums[$i2]]['id'];

                    }
                    
                    echo $row['grid']." = C Lang<br>";
                    print_r($selec);
                    echo "<br><br>";

                    $d = implode("#",$selec);

                    $pi_sql = "UPDATE gim_std_paper SET c_lang='$d' WHERE grid='$grid' AND schedule_id='$schedule_id'";
                    $pi_res = mysqli_query($conn,$pi_sql);    

                }




            } else {


                // if(!(isset($_SESSION['c_pos']))) {
                    $nums_c = get_rand_number(0,mysqli_num_rows($res)-1,5);
                    $_SESSION['c_pos'] = $nums_c;
                // }
                $nums = $_SESSION['c_pos'];

                for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                    $selec[] = $rooo[$nums[$i2]]['id'];

                }

                echo $row['grid']." = C Lang<br>";
                print_r($selec);
                echo "<br><br>";

                $d = implode("#",$selec);
                $pi_sql = "INSERT INTO gim_std_paper (grid,c_lang,schedule_id) VALUES ('$grid','$d','$schedule_id')";
                $pi_res = mysqli_query($conn,$pi_sql);
            }


        } else if($selected_sub == 'pg'){

            $p_sql = "SELECT * FROM gim_std_paper WHERE grid='$grid' AND schedule_id='$schedule_id'";
            $p_res = mysqli_query($conn,$p_sql);

            if(mysqli_num_rows($p_res)>0){

                $p_row = mysqli_fetch_assoc($p_res);

                if($p_row['psd_g'] != ""){

                    $_SESSION['d_pos'] = explode("#",$p_row['psd_g']);
                    $nums = $_SESSION['d_pos'];
                } else {

                    // if(!(isset($_SESSION['d_pos']))) {
                        $nums_a = get_rand_number(0,mysqli_num_rows($res)-1,1);
                        $_SESSION['d_pos'] = $nums_a;
                    // }
                    $nums = $_SESSION['d_pos'];

                    for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                        $selec[] = $rooo[$nums[$i2]]['id'];

                    }

                    echo $row['grid']." = PSD G<br>";
                    print_r($selec);
                    echo "<br><br>";

                    $d = implode("#",$selec);
                    $pi_sql = "UPDATE gim_std_paper SET psd_g='$d' WHERE grid='$grid' AND schedule_id='$schedule_id'";
                    $pi_res = mysqli_query($conn,$pi_sql);    

                }




            } else {


                // if(!(isset($_SESSION['d_pos']))) {
                    $nums_d = get_rand_number(0,mysqli_num_rows($res)-1,1);
                    $_SESSION['d_pos'] = $nums_d;
                // }
                $nums = $_SESSION['d_pos'];

                for ($i2=0; $i2 <sizeof($nums) ; $i2++) { 
                        
                    $selec[] = $rooo[$nums[$i2]]['id'];

                }
                echo $row['grid']." = PSD G<br>";
                print_r($selec);
                echo "<br><br>";

                $d = implode("#",$selec);
                $pi_sql = "INSERT INTO gim_std_paper (grid,psd_g,schedule_id) VALUES ('$grid','$d','$schedule_id')";
                $pi_res = mysqli_query($conn,$pi_sql);
            }


        } else if($selected_sub == 'l'){

            
        
        
            $p_sql = "SELECT * FROM gim_logic_ans WHERE grid='$grid' AND schedule_id='$schedule_id'";
            $p_res = mysqli_query($conn,$p_sql);
            
            if(mysqli_num_rows($p_res)>0){
                
                $p_row = mysqli_fetch_assoc($p_res);
                
                
                if($p_row['que'] != ""){
                    
                    $_SESSION['l_pos'] = explode("#",$p_row['que']);
                    $nums = $_SESSION['l_pos'];
                    while($result_data = mysqli_fetch_assoc($res_)) {
                        $new[] = $result_data;
                    }
                    
                    
                    for($i=0 ; $i<sizeof($nums); $i++) {
                        
                        for($j=0 ; $j<sizeof($new); $j++) {
                            
                            if($nums[$i] == $j) {
                                
                                $datas[] = $new[$j]; 
                                $ids[] = $new[$j]['id'];
                                
                            }
                            
                            
                        }
                        
                    }
                } else {
                    
                    // if(!(isset($_SESSION['l_pos']))) {
                        $nums_a = get_rand_number(0,mysqli_num_rows($res_)-1,30);
                        $_SESSION['l_pos'] = $nums_a;
                    // }
                    $nums = $_SESSION['l_pos'];
                    
                    while($result_data = mysqli_fetch_assoc($res_)) {
                        $new[] = $result_data;
                    }
                    
                    
                    for($i=0 ; $i<sizeof($nums); $i++) {
                        
                        for($j=0 ; $j<sizeof($new); $j++) {
                            
                            if($nums[$i] == $j) {
                                
                                $datas[] = $new[$j]; 
                                $ids[] = $new[$j]['id'];
                                
                            }
                            
                            
                        }
                        
                    }
                    print_r($ids);
                    $d = implode("#",$ids);
                    
                    $pi_sql = "UPDATE gim_logic_ans SET que='$d' WHERE grid='$grid' AND schedule_id='$schedule_id'";
                    $pi_res = mysqli_query($conn,$pi_sql);    
                    
                }
                
                
                
                
            } else {
                
                // $nums_l = array();
                // if(!(isset($_SESSION['l_pos']))) {
                    $nums_l = get_rand_number(0,mysqli_num_rows($res_)-1,30);
                    $_SESSION['l_pos'] = $nums_l;
                // }
                $nums = $_SESSION['l_pos'];
                
                        // $new = array();
                        
                        while($result_data = mysqli_fetch_assoc($res_)) {
                            $new[] = $result_data;
                        }
                        
                        $datas = array();
                        $ids = array();
                
                for($i=0 ; $i<sizeof($nums); $i++) {
                    
                    for($j=0 ; $j<sizeof($new); $j++) {
                        
                        if($nums[$i] == $j) {
                            
                            $datas[] = $new[$j]; 
                            $ids[] = $new[$j]['id'];
                            
                        }
                        
                        
                    }
                    
                }
                
                $d = implode("#",$ids);
                echo "$d <br>";
                $pi_sql = "INSERT INTO gim_logic_ans (grid,que,schedule_id) VALUES ('$grid','$d','$schedule_id')";
                $pi_res = mysqli_query($conn,$pi_sql);
            }
            

        }

    } else {
        echo "Nathi Khali";
    }  

}

function get_rand_number($start=1,$end=10,$length=4){
    $connt=0;
    $temp=array();
    while($connt<$length){
        $temp[]=mt_rand($start,$end);
        $data=array_unique($temp);
        $connt=count($data);
    }
    sort($data);
    echo "<pre>";
    return $data;
}

function get_rand_number1($arr,$c=0){
    $connt=0;
    // $length=30;
    // $temp=array();

    print_r($arr);
    
    foreach($arr as $ids){

        $d = $ids['id'];


    }
    
    $data = array();
    
    // while($connt<$end){
    //     $a[] = $connt;
    //     $connt++; 
    // }
    
    // echo "<br> Helllll<br>";
    $rand_keys = array_rand($d, 3);
    
    
    for($i=0 ; $i<sizeof($rand_keys) ; $i++){
        $data[] = $arr[$rand_keys[$i]];
    }
    // echo count($data)."<br>";

    sort($data);
    return $data;
}


?>