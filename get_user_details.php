
<?php

        $servername = "localhost";
        $username = "root";
        $password = "ninja";

        $connection = mysql_connect($servername, $username, $password);

	if (isset($_POST['foreign_key'])) {
		$id = $_POST['foreign_key'];

		if ($connection) {

			mysql_select_db("pair_db");
                	$query_string = "select * from users where id='$id';";
			$res = mysql_query($query_string, $connection);

			$row = mysql_fetch_array($res);
			echo $row['name'];
        	}
	} 

?>
