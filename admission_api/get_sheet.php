<?php
 include('config_api.php');
 ob_start();
 ob_clean();

    $foo = true;
    $faa = false;
    $courses_id = array();
    $courses_name = array();
    $courses = array();
    $courses_status = array();
    $admission_id = $_POST['admission_id'];
    
    if($admission_id != ""){
        $query = "SELECT * FROM admission_courses WHERE admission_id='$admission_id'";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)>=1){
            while($row = mysqli_fetch_assoc($result)){ 
                array_push($courses_id, $row['courses_id']);
                array_push($courses_status, $row['admission_courses_status']);
            }
            $all_courses_id = array($courses_id);

            // print_r($courses_status);

            for($i=0; $i < count($courses_id); $i++) { 
                $subcourse_query = "SELECT * FROM rnw_subcourse WHERE subcourse_id='$courses_id[$i]'";
                $result = mysqli_query($con,$subcourse_query);

                if(mysqli_num_rows($result)>=1){
                    while($row = mysqli_fetch_assoc($result)){ 
                        array_push($courses_name, $row['subcourse_name']);         
                    }
                }
            }
            $all_courses_name = array('course_id'=>$all_courses_id, 'course_name'=>$courses_name);

            for ($i=0; $i < count($courses_id); $i++) {
                $ss_query = "SELECT * FROM shining_sheet WHERE subcourse_id='$courses_id[$i]'";
                $result = mysqli_query($con,$ss_query);

               $t = $all_courses_id[0][$i];
                
               $all_topics = array();
                if(mysqli_num_rows($result)>=1){
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result)){
                       $row_id = $row['shining_sheet_id'];
                        $assign_student_query = "SELECT * FROM assign_student WHERE shining_sheet_id='$row_id' AND admission_id='$admission_id'";

                        $assign_student_result = mysqli_query($con,$assign_student_query);
                        if(mysqli_num_rows($assign_student_result)>=1){
                            while($assign_row = mysqli_fetch_assoc($assign_student_result)){ 
                                $all_topics[$count]['topic_date'] = $assign_row['date'];
                                $all_topics[$count]['feedback'] = $assign_row['feed_back'];
                                $all_topics[$count]['attendance'] = $assign_row['p_a'];
                            }
                        }

                        if($row > 1){
                            $all_topics[$count]['signing_sheet_id'] = trim(preg_replace('/\s\s+/', ' ', strip_tags($row['shining_sheet_id'])));
                            $all_topics[$count]['topic_name'] = trim(preg_replace('/\s\s+/', ' ', strip_tags($row['name'])));
                        } else {
                            $all_topics[$count]['signing_sheet_id'] = trim(preg_replace('/\s\s+/', ' ', strip_tags($row['shining_sheet_id'])));
                            $all_topics[$count]['topic_name'] = trim(preg_replace('/\s\s+/', ' ', strip_tags($row['name'])));
                        }
                        $count++;
                    }
                }

                $elem = array(
                'course_id'=>$courses_id[$i], 
                'course_name'=>$all_courses_name['course_name'][$i], 
                'course_status'=>$courses_status[$i],
                'topics'=>$all_topics
            );

                array_push($courses, $elem);
            }
            header('content-type: application/json');
            print_r(json_encode(array('status'=>$foo, 'msg'=>'success', 'data'=>$courses)));
    }
    else{
        header('content-type: application/json');
        print_r(json_encode(array('status'=>$faa, 'msg'=>'Admission ID not found', 'data'=>'')));
    }
}
else{
    header('content-type: application/json');
    print_r(json_encode(array('status'=>$faa, 'msg'=>'Enter admission_id as body parameter first.', 'data'=>'')));
}
