<?php
        $servername = "localhost";
        $username = "root";
        $password = "ninja_droid123";

        $connection = mysql_connect($servername, $username, $password);  

        $mail = $_POST['mail'];
        $pass = $_POST['pword'];

	$success = array("response" => "success");
	$flop = array("response" => "flop");

	if(isset($mail) && isset($pass)) {

        if ($connection) {
		mysql_select_db("pair_db", $connection);

                $sql = "SELECT * FROM users where (email_id='$mail') && (password='$pass');";
                $retval = mysql_query( $sql, $connection);
		
		$rows = mysql_num_rows($retval);

		if ($rows == 1) {
			echo json_encode($success, JSON_PRETTY_PRINT);
		} else {
			echo json_encode($flop, JSON_PRETTY_PRINT);
		}
        }
}
?>
