<?php
include 'funkcije.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poslovnik";
$sql= "SET @count = 0; UPDATE `osoba` SET `osoba`.`id` = @count:= @count + 1";
$conn=new mysqli($servername, $username, $password, $dbname);
	
	if($conn->connect_error){
	
		die("Neuspela konekcija: ".$conn->connect_error);
	
	}
	
	mysqli_multi_query($conn,$sql);
	
	$conn->close();	
	
?>