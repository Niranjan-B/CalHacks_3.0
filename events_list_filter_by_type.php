<?php

        $servername = "localhost";
        $username = "root";
        $password = "ninja_droid123";

        $connection = mysql_connect($servername, $username, $password);
	$filter_param = $_GET['type'];

           if ($connection && isset($_GET['type'])) {

		$type = $_GET['type'];

                  mysql_select_db("pair_db");
                  $query_string = "select * from events where type='$type';";
                  $res = mysql_query($query_string, $connection);
		  
		  $json_data = array();

                  while ($row  = mysql_fetch_assoc($res)) {
			$json_data[] = $row;
		  }

		echo json_encode($json_data, JSON_PRETTY_PRINT);
           } 

?>
