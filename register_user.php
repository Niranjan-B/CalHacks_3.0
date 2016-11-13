<?php
        $servername = "localhost";
        $username = "root";
        $password = "ninja";

        $connection = mysql_connect($servername, $username, $password);

        if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['pword'])) {  

	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$pass = $_POST['pword'];

	$success = array("result" => "success");
	$failure = array("result" => "flop");

        if ($connection) {
                $sql = "INSERT INTO users ".
                         "(name, email_id, password)".
                         "VALUES ( '$name', '$mail', '$pass' )";
                mysql_select_db('pair_db');
                $retval = mysql_query( $sql, $connection);
                
                if(! $retval ) {
                         echo json_encode($failure, JSON_PRETTY_PRINT);
                 } else {
			echo json_encode($success, JSON_PRETTY_PRINT);
		 }
	}
} 
?>
