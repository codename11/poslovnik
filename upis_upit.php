<?php
include 'funkcije.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poslovnik";


if(!empty($_GET["str"]) && isset($_GET["str"])){
$str=$_GET["str"];
$arr=explode(',', $str);

$ime=test_input($arr[0]);//Ime pr. Zika
$prezime=test_input($arr[1]);//Prezime pr. Zikic
$broj=test_input($arr[2]);//Telefonski broj pr. 345678
$kategorija=test_input($arr[3]);// ID od kategorije


$sql = "INSERT INTO osoba (ime, prezime)
VALUES ('$ime', '$prezime');

INSERT INTO tel_broj (broj,kategorija_FK,osoba_FK)
VALUES ('$broj', '$kategorija',(SELECT id FROM osoba WHERE id=(SELECT MAX(id) FROM osoba)));
";

multi_pristup($servername, $username, $password, $dbname, $sql);
}
?>