<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "todo_list";
    
    $conn = mysqli_connect($host,$user,$pass,$db) or die ("Connection Error");;
	date_default_timezone_set('Asia/Jakarta');
?>