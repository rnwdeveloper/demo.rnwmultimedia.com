<?php




    $content = array(
        "en" => 'Testing Message'
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
?>