<?php

        $servername = "localhost";
        $username = "root";
        $password = "ninja_droid123";

        $connection = mysql_connect($servername, $username, $password);

	$type = $_POST['type'];
	$location = $_POST['location']; 
	$description = $_POST['description'];
	$start_time= $_POST['start_time'];
	$end_time = $_POST['end_time']; 
	$person_id = $_POST['person_id'];

        if ($connection) {
                mysql_select_db("pair_db", $connection);

		$img = getImageFromInput($type, $connection);

		$query_string = "insert into events (img, type, location, description, start_time, end_time, person_id) ".
				"values ('$img', '$type', '$location', '$description', '$start_time', '$end_time', '$person_id');";
		mysql_query($query_string, $connection);

        }
	
	function getImageFromInput($type_of_activity, $connection_object) {
		$id = 0;

		if ($type_of_activity == "Jogging") {
			$id = 1;
		} else if ($type_of_activity == "WorkOut") {
			$id  = 2;
		} else if ($type_of_activity == "Ping Pong") {
			$id = 3;
		} else if ($type_of_activity == "Football") {
			$id = 4;
		} else if ($type_of_activity == "Baseball") {
			$id = 5;
		}

		$sql = "select img_url from images where id='$id';";
		$img_url = mysql_query($sql, $connection_object);
		$row = mysql_fetch_assoc($img_url);
		return $row['img_url'];
	}

?>
