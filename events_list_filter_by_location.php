<?php

        $servername = "localhost";
        $username = "root";
        $password = "ninja";

        $connection = mysql_connect($servername, $username, $password);

           if ($connection && isset($_GET['location'])) {

                $location = $_GET['location'];

                  mysql_select_db("pair_db");
                  $query_string = "select * from events where location='$location';";
                  $res = mysql_query($query_string, $connection);
                  
                  $json_data = array();

                  while ($row  = mysql_fetch_assoc($res)) {
                        $json_data[] = $row;
                  }

                echo json_encode($json_data, JSON_PRETTY_PRINT);
           } 
?>
