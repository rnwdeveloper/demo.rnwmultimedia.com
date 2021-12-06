<?php


$servername = "68.183.81.191";
$username = "mzfrxmujjb";
$password = "Q23bQYkskc";
$db = "mzfrxmujjb"; 

$con = mysqli_connect($servername, $username, $password,$db) or die(mysqli_error($con));

 date_default_timezone_set('Asia/Kolkata');
  $date = date( 'd-m-Y', time () );
echo  $time=date('H:i');

  

$sql=mysqli_query($con,"select * from bulk_lead where schedule_date = '$date'") or die(mysqli_error($con));
if(mysqli_num_rows($sql) > 0)
{
    while($res=mysqli_fetch_array($sql))
    {
        $bulk_id=$res['id'];
        $schedule_time=$res['schedule_time'];
       echo $less_time=date('H:i', strtotime('-2 minute', strtotime($schedule_time)));

            if($less_time ==  $time)
            {


                $message="Take followup of ".$res['name']." at ".$res['schedule_time'];
                    $schedule_type=$res['schedule_type'];

           

                        $qu=mysqli_query($con,"select * from bulk_lead b,faculty f where f.name=b.assign_to and b.id='$bulk_id'") or die(mysqli_error($con));
 
                         
                         if(mysqli_num_rows($qu) > 0 )
                         {
                            while($r=mysqli_fetch_array($qu))
                            {
                                // echo $r['bulk_id']."  ".$r['name'];
                                 $token=$r['lead_followup_android_devicetoken'];
                                 $tt=explode(',', $token);
                                 foreach ($tt as $users_token) {

                                    echo "haaa   ";
                                     define('API_ACCESS_KEY','AAAAuDmOQkI:APA91bEYpI7t6UZm-VH2EirE4WBXYxEALxB2WhzrQjcUPFPchkfxMeWMH5VVSPHHkCgRtEh9tRj1A9O9aoePaXd-jHAg9p82KGBXZKzOLqEUXuZEgaEPenViIZCn5he4SHbDggtT4Yw1');

                                     $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
                                     // $token='c51nlZGWQGyTemWjiE99Bm:APA91bEqmM9p8T51eIRW8P4l07wJIzmIPoF5kpN23IncKZlhGr_WtWEMFtTzbF6BanVJoh4XnpLsHvHhKuZBWe_6A00Lsk7-eKdMYAiP2GFu2YHDoOztF_1ItDk6-syy6cpnDckPy1CX';

                                        $notification = [
                                                // 'title' =>'title',
                                                // 'body' => $message,
                                                // 'icon' =>'img11.png', 
                                                // 'sound' => 'mySound'
                                                 'title' =>$schedule_type,
                                                'body' => $message,
                                                
                                            ];
                                            $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

                                            $fcmNotification = [
                                                //'registration_ids' => $tokenList, //multple token array
                                                'to'        => $users_token, //single token
                                                'notification' => $notification,
                                                'data' => $extraNotificationData
                                            ];

                                            $headers = [
                                                'Authorization: key=' . API_ACCESS_KEY,
                                                'Content-Type: application/json'
                                            ];


                                            $ch = curl_init();
                                            curl_setopt($ch, CURLOPT_URL,$fcmUrl);
                                            curl_setopt($ch, CURLOPT_POST, true);
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
                                            $result = curl_exec($ch);
                                            curl_close($ch);


                                            echo $result;
                                 }


                            }
                         }
                         else
                         {
                            echo "na koi record nthi";
                         }
                        

             }
            else if($schedule_time == $time)
            {
                $message="Take followup of ".$res['name']." at ".$res['schedule_time'];
                    $schedule_type=$res['schedule_type'];

           

                        $qu=mysqli_query($con,"select * from bulk_lead b,faculty f where f.name=b.assign_to and b.id='$bulk_id'") or die(mysqli_error($con));
 
                         
                         if(mysqli_num_rows($qu) > 0 )
                         {
                            while($r=mysqli_fetch_array($qu))
                            {
                                // echo $r['bulk_id']."  ".$r['name'];
                                 $token=$r['lead_followup_android_devicetoken'];
                                 $tt=explode(',', $token);
                                 foreach ($tt as $users_token) {

                                    echo "haaa   ";
                                     define('API_ACCESS_KEY','AAAAuDmOQkI:APA91bEYpI7t6UZm-VH2EirE4WBXYxEALxB2WhzrQjcUPFPchkfxMeWMH5VVSPHHkCgRtEh9tRj1A9O9aoePaXd-jHAg9p82KGBXZKzOLqEUXuZEgaEPenViIZCn5he4SHbDggtT4Yw1');

                                     $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
                                     // $token='c51nlZGWQGyTemWjiE99Bm:APA91bEqmM9p8T51eIRW8P4l07wJIzmIPoF5kpN23IncKZlhGr_WtWEMFtTzbF6BanVJoh4XnpLsHvHhKuZBWe_6A00Lsk7-eKdMYAiP2GFu2YHDoOztF_1ItDk6-syy6cpnDckPy1CX';

                                        $notification = [
                                                // 'title' =>'title',
                                                // 'body' => $message,
                                                // 'icon' =>'img11.png', 
                                                // 'sound' => 'mySound'
                                                 'title' =>$schedule_type,
                                                'body' => $message,
                                                
                                            ];
                                            $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

                                            $fcmNotification = [
                                                //'registration_ids' => $tokenList, //multple token array
                                                'to'        => $users_token, //single token
                                                'notification' => $notification,
                                                'data' => $extraNotificationData
                                            ];

                                            $headers = [
                                                'Authorization: key=' . API_ACCESS_KEY,
                                                'Content-Type: application/json'
                                            ];


                                            $ch = curl_init();
                                            curl_setopt($ch, CURLOPT_URL,$fcmUrl);
                                            curl_setopt($ch, CURLOPT_POST, true);
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
                                            $result = curl_exec($ch);
                                            curl_close($ch);


                                            echo $result;
                                 }


                            }
                         }
                         else
                         {
                            echo "na koi record nthi";
                         }
            }


           
}
}


?>