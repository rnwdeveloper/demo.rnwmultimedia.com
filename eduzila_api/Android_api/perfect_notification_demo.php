<?php

//mail : harshrnw152@gmail.com  pwd:harshche1   



// demo 1:

     $content = array(
                                "en" => $message
                                );

                            $fields = array(
                                'app_id' => "60ab8a7e-5486-47c8-a028-df9c37e7e7cb",
                                'included_segments' => array('All'),
                                'data' => array("foo" => "bar"),
                                'large_icon' =>"ic_launcher_round.png",
                                'contents' => $content
                            );

                            $fields = json_encode($fields);
                        print("\nJSON sent:\n");
                        print($fields);

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                                       'Authorization: Basic ODQyMzE3MTEtZDJmYi00MmZjLTk5NmYtZjQxMzI2N2E3NmM0'));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            curl_setopt($ch, CURLOPT_HEADER, FALSE);
                            curl_setopt($ch, CURLOPT_POST, TRUE);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

                            $response = curl_exec($ch);
                            curl_close($ch);

                            return $response;


                        $response = sendMessage();
                        $return["allresponses"] = $response;
                        $return = json_encode( $return);
                        print("\n\nJSON received:\n");
                        print($return);
                        print("\n");







//demo 2:token valo



                        define('API_ACCESS_KEY','AAAAuDmOQkI:APA91bEYpI7t6UZm-VH2EirE4WBXYxEALxB2WhzrQjcUPFPchkfxMeWMH5VVSPHHkCgRtEh9tRj1A9O9aoePaXd-jHAg9p82KGBXZKzOLqEUXuZEgaEPenViIZCn5he4SHbDggtT4Yw1');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token='c51nlZGWQGyTemWjiE99Bm:APA91bEqmM9p8T51eIRW8P4l07wJIzmIPoF5kpN23IncKZlhGr_WtWEMFtTzbF6BanVJoh4XnpLsHvHhKuZBWe_6A00Lsk7-eKdMYAiP2GFu2YHDoOztF_1ItDk6-syy6cpnDckPy1CX';

    $notification = [
            'title' =>'title',
            'body' => 'body of message.',
            'icon' =>'myIcon', 
            'sound' => 'mySound'
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