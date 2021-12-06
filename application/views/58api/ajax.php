<?php
header('Content-type: application/json');
include('google-calendar-api.php');


try {
	// Get event details
	$event = $event_details;
	$capi = new GoogleCalendarApi();
	// print_r($event['operation']);
	// die;
	switch($event['operation']) {

		// echo $event['operation'];
		// die;
		case 'create':
		// echo $_SESSION['access_token'];
		// echo "hii";
		// die;
			// Get user calendar timezone
			if(!isset($_SESSION['user_timezone']))
			// 	echo $_SESSION['access_token'];
			// die;
				$_SESSION['user_timezone'] = $capi->GetUserCalendarTimezone($_SESSION['access_token']);
			die;

			echo $_SESSION['user_timezone'];
			die;
			// Create event on primary calendar
			$event_id = $capi->CreateCalendarEvent('primary', $event['title'], $event['all_day'], $event['event_time'], $_SESSION['user_timezone'], $_SESSION['access_token']);

			echo json_encode([ 'event_id' => $event_id ]);
			// header("location:TaskController/working_all_task");
			break;

		case 'update':
			// Update event on primary calendar
			$capi->UpdateCalendarEvent($event['event_id'], 'primary', $event['title'], $event['all_day'], $event['event_time'], $_SESSION['user_timezone'], $_SESSION['access_token']);

			echo json_encode([ 'updated' => 1 ]);
			break;

		case 'delete':
			// Delete event on primary calendar
			$capi->DeleteCalendarEvent($event['event_id'], 'primary', $_SESSION['access_token']);

			echo json_encode([ 'deleted' => 1 ]);
			break;
	}
}
catch(Exception $e) {
	header('Bad Request', true, 400);
    echo json_encode(array( 'error' => 1, 'message' => $e->getMessage() ));
}

?>