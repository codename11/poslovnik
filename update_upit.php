<?php
include 'funkcije.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poslovnik";

if ($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET["stry"])){
	
		$stry=$_GET["stry"];
		$arry=explode(',', $stry);

		$ajdi=test_input($arry[0]);
		$imey=test_input($arry[1]);//Ime pr. Zika
		$prezimey=test_input($arry[2]);//Prezime pr. Zikic
		$brojy=test_input($arry[3]);//Telefonski broj pr. 345678
		$kategorijay=test_input($arry[4]);// ID od kategorije

	}

}
print_r($_GET["stry"]);
//print_r($imex);

/*if($ajdi!="" || ($imex=="" || $prezimex=="" || $brojx=="" || $kategorijax=="")){
	
	$sqlx="
	UPDATE osoba,tel_broj SET ime='$imex', prezime='$prezimex',broj='$brojx', 
	kategorija_FK='$kategorijax' WHERE osoba.id='$ajdi' AND osoba_FK=osoba.id;
	";
	
}
else{
	
	$sqlx="
	UPDATE osoba,tel_broj SET ime='$imex', prezime='$prezimex',broj='$brojx', 
	kategorija_FK='$kategorijax' WHERE osoba.id='$ajdi' AND osoba_FK=osoba.id;
	;";
	
}*/

$sqlx="UPDATE osoba SET ime='$imey' WHERE id='$ajdi'";

pristup($servername, $username, $password, $dbname, $sqlx);

?>


