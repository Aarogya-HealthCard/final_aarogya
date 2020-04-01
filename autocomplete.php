<?php
	require 'db.php';
	$data = array();
$str = $_GET['str'];
	$result = $mysqli->query("SELECT * from disease WHERE name LIKE '%".$str."%'");
	while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
		array_push($data,$row['name']);
	}
	echo json_encode($data);
?>