<?php

include("../admin/dbconfig.php");

if($_GET['type'] == 'studentname'){
	$result = $conn->query("SELECT name,phone FROM student where balance>0 and (name LIKE '%".$_GET['name_startsWith']."%' or phone LIKE '%".$_GET['name_startsWith']."%')   ");	
	$data = array();
	while ($row = $result->fetch_assoc()) {
		//array_push($data, $row['name'].'-'.$row['phone']);	
		array_push($data, $row['name']);	
	}	
	echo json_encode($data);
}


if($_GET['type'] == 'report'){
	$result = $conn->query("SELECT name,phone FROM student where (name LIKE '%".$_GET['name_startsWith']."%' or phone LIKE '%".$_GET['name_startsWith']."%')   ");	
	$data = array();
	while ($row = $result->fetch_assoc()) {
		//array_push($data, $row['name'].'-'.$row['phone']);	
		array_push($data, $row['name']);	
	}	
	echo json_encode($data);
}


?>