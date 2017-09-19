<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
<script src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
	
    $('#example').DataTable();	
	
});
</script>
</head>

<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poslovnik";


if(isset($_GET["str"])){
	
	$str=$_GET["str"];
	$arr=explode(',', $str);

	$ime=test_input($arr[0]);//Ime pr. Zika
	$prezime=test_input($arr[1]);//Prezime pr. Zikic
	$broj=test_input($arr[2]);//Telefonski broj pr. 345678
	$kategorija=test_input($arr[3]);// ID od kategorije
	$sort=test_input($arr[4]);// ID od kategorije
	
}
else{
	$ime="";
	$prezime="";
	$broj="";
	$kategorija="";
	$sort="";
}

if(isset($ime) && isset($prezime) && isset($broj)){
	
	$_SESSION["ime"] = $ime;
	$_SESSION["prezime"] = $prezime;
	$_SESSION["broj"] = $broj;
	
}

//OR
//AND

$sql1="SELECT osoba.id,ime, prezime, tel_broj.broj, tel_kategorija.kategorija
FROM osoba,tel_broj,tel_kategorija 
WHERE osoba.ime LIKE '%$ime%' 
AND osoba.prezime LIKE '%$prezime%' 
AND tel_broj.broj LIKE '%$broj%' 
AND osoba.id=tel_broj.osoba_FK
AND tel_kategorija.id=tel_broj.kategorija_FK
";

$sql2="AND tel_kategorija.id='$kategorija' 
AND tel_broj.kategorija_FK='$kategorija'
";

$sql3="GROUP BY ime,tel_broj.broj 
";

$sql4=" ORDER BY ime ASC";
$sql5=" ORDER BY ime DESC";
$sql6=" ORDER BY prezime ASC";
$sql7=" ORDER BY prezime DESC";
$sql8=" ORDER BY broj ASC";
$sql9=" ORDER BY broj DESC";

if($kategorija==0){
	$sql1.=$sql3;
}
else if($kategorija>0){
	$sql1.=$sql2.$sql3;
}

switch ($sort) {
	
    case '1':
        $sql1.=$sql4;
        break;
    case '2':
        $sql1.=$sql5;
        break;
    case '3':
        $sql1.=$sql6;
        break;
	case '4':
        $sql1.=$sql7;
        break;
    case '5':
        $sql1.=$sql8;
        break;
    case '6':
        $sql1.=$sql9;
        break;
    default:
        $sql1.=$sql4;
}
$result = pristup($servername, $username, $password, $dbname, $sql1);
$br1=0;

echo "<table id='example' class='display' width='100%' cellspacing='0'>
        <thead>
            <tr>
                <th>Redni broj</th>
                <th>Ime</th>
                <th>Telefonski broj	</th>
                <th>Kategorija</th>
            </tr>
        </thead>
        <tbody>";
            while($row = $result->fetch_assoc()) {
				$br=$row["id"];
				$br1++;
            echo "<tr>
                <td>".$br1."</td>"."<td>".$row['ime']."</td>"."<td>".$row['prezime']."</td>"."<td>".$row['kategorija']."</td></tr>";
    
			}
			echo "</tbody></table>";
			
?>

</html>