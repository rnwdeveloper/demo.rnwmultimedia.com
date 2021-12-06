<?php
// function getConnection() {
// 	$dbhost="127.0.0.1";
// 	$dbuser="root";
// 	$dbpass="12345";
// 	$dbname="tree";
// 	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
// 	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	return $dbh;
// }
	//$sql = "select id as memberId, parent as parentId  ,user as otherInfo from users";

	try {
		//$db = getConnection();
		//$stmt = $db->query($sql);  
		//$wines = $stmt->fetchAll(PDO::FETCH_OBJ);
		// $dd[] =array('memberId'=>'HiteshDesai','parentId'=>'','otherInfo'=>'CEO');
		// $dd[] =array('memberId'=>'Demo','parentId'=>'HiteshDesai','otherInfo'=>'tt');
		//$db = null;
		echo json_encode($nn);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
?>
