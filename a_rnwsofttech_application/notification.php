<?php

// $con=mysqli_connect('68.183.81.191','mzfrxmujjb','Q23bQYkskc','mzfrxmujjb');
// $select=mysqli_query($con,"select * from user where logtype='Access Property'") or die(mysqli_error($con));
// if($select)
// {
//     while($res=mysqli_fetch_array($select))
//     {
//         $usertoken[]=$res['token'];
       
//     }
// }
// else
// {
//     echo "na";
// }

// $usertoken="fLCUiLa_QzqmDxaNsXjuAb:APA91bFOgSxk8S2K0ESeztNijG5PCNHQ_dJA0rIb84ROhdZ4QCyzhWVA9tjs_wzj_V_csBveJygUyi539WSd3-QJy4fNfkSRXG6t4ma0NaSmQqqueyOdxM3jwe198UzoRBB7ftx72vNu";

// define('API_ACCESS_KEY','AAAAuDmOQkI:APA91bEYpI7t6UZm-VH2EirE4WBXYxEALxB2WhzrQjcUPFPchkfxMeWMH5VVSPHHkCgRtEh9tRj1A9O9aoePaXd-jHAg9p82KGBXZKzOLqEUXuZEgaEPenViIZCn5he4SHbDggtT4Yw1');


//  $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
//  $token=$usertoken;

//     $notification = [
//             'title' =>'title',
//             'body' => 'body of message.',
//             'icon' =>'myIcon', 
            
//         ];
//         $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

//         $fcmNotification = [
//             // 'registration_ids' =>array($usertoken), //multple token array
//             'to'        => $usertoken, //single token
//             'notification' => $notification,
//             'data' => $extraNotificationData
//         ];

//         $headers = [
//             'Authorization: key=' . API_ACCESS_KEY,
//             'Content-Type: application/json'
//         ];


//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL,$fcmUrl);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
//         $result = curl_exec($ch);
//         curl_close($ch);


//         echo $result;


//perfect work kare che 

define('API_ACCESS_KEY','AAAAuDmOQkI:APA91bEYpI7t6UZm-VH2EirE4WBXYxEALxB2WhzrQjcUPFPchkfxMeWMH5VVSPHHkCgRtEh9tRj1A9O9aoePaXd-jHAg9p82KGBXZKzOLqEUXuZEgaEPenViIZCn5he4SHbDggtT4Yw1');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token='c51nlZGWQGyTemWjiE99Bm:APA91bEqmM9p8T51eIRW8P4l07wJIzmIPoF5kpN23IncKZlhGr_WtWEMFtTzbF6BanVJoh4XnpLsHvHhKuZBWe_6A00Lsk7-eKdMYAiP2GFu2YHDoOztF_1ItDk6-syy6cpnDckPy1CX';

    $notification = [
            'title' =>'title',
            'body' => 'body of message.',
            // 'icon' =>'myIcon', 
            // 'sound' => 'mySound'
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
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


        ?>