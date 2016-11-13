<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");  
	
	$servername = "localhost";
        $username = "root";
        $password = "ninja";

        $connection = mysql_connect($servername, $username, $password);  

        if ($connection) {
                mysql_select_db("pair_db", $connection);

                $sql = "SELECT img,description,person_id FROM events;";
                $retval = mysql_query( $sql, $connection);
		$rows = array();
                
                while ($row = mysql_fetch_assoc($retval)) {
			$rows[] = $row;
		}
		
                echo json_encode($rows, JSON_PRETTY_PRINT);
	}


?>
