<?php
include 'funkcije.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poslovnik";

$str=$_GET["str"]; print_r($str);
$arr=explode(',', $str);

$ime=test_input($arr[0]);//Ime pr. Zika
$prezime=test_input($arr[1]);//Prezime pr. Zikic
$broj=test_input($arr[2]);//Telefonski broj pr. 345678
$kategorija=test_input($arr[3]);// ID od kategorije


$sql = "INSERT INTO osoba (ime, prezime)
VALUES ('$ime', '$prezime');
SET @count = 0; UPDATE `osoba` SET `osoba`.`id` = @count:= @count + 1;
INSERT INTO tel_broj (broj,kategorija_FK,osoba_FK)
VALUES ('$broj', '$kategorija',(SELECT id FROM osoba WHERE id=(SELECT MAX(id) FROM osoba)));
";

multi_pristup($servername, $username, $password, $dbname, $sql);

?>