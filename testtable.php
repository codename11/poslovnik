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
	
	
}
else{
	$ime="";
	$prezime="";
	$broj="";
	$kategorija="";
	
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



if($kategorija==0){
	$sql1.=$sql3;
}
else if($kategorija>0){
	$sql1.=$sql2.$sql3;
}


$result = pristup($servername, $username, $password, $dbname, $sql1);
$br1=0;

echo "<table id='example' class='display responsive' width='100%' cellspacing='0'>
        <thead>
            <tr>
                <th>Redni broj</th>
                <th>Ime</th>
				<th>Prezime</th>
                <th>Telefonski broj</th>
                <th>Kategorija</th>
            </tr>
        </thead>
        <tbody>";
            while($row = $result->fetch_assoc()) {
				$br=$row["id"];
				$br1++;

?>

				
            <tr><td><?php echo $br1?>.<input type='checkbox' class='bx'  id="<?php echo $br?>"></td><td><?php echo $row['ime']; ?></td><td><?php echo $row['prezime']; ?></td><td><?php echo $row['broj']; ?></td><td><?php echo $row['kategorija']; ?><button style='float:right; margin-left: 3px;' type='button' data-toggle='modal' data-target='#myModal' class='btn btn-info btn-xs' onclick="uzim_vredxV2('izvestaj1.php',<?php echo $br?>,<?php echo $br1?>,'<?php echo $row['ime']; ?>','<?php echo $row['prezime']; ?>','<?php echo $row['broj']; ?>','<?php echo $row['kategorija']; ?>')">Update</button></td></tr>

<?php   
			}
			echo "</tbody></table>";
			
?>
<button type="button" style="color: black; margin-top: 1%;" class='btn btn-default podaci' onclick="MySerializeV2('citanje_upit.php',this.e)">Potvrdi brisanje</button>

<div class="container">
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update/Izmena</h4>
        </div>
        <div class="modal-body">

          <div class="container-fluid text-center" style="font-family:Palatino Linotype;">
	<form method="POST" id="F1" class="vcenter" autocomplete="on">

		<div class="row">

			<div class="form-group col-sm-3">
		
				<label>Ime<span class="text-danger">*</span>:</label>
				<input type="text" id="imex" class="form-control text-center" maxlength="30" name="imex" placeholder="Ime" value=''>
			
			</div>
	
			<div class="form-group col-sm-3">
	
				<label>Prezime<span class="text-danger">*</span>:</label>
				<input type="text" id="prezimex" class="form-control text-center" maxlength="30" name="prezimex" placeholder="Prezime" value=''>
		
			</div>
			<div class="form-group col-sm-3">
		
				<label>Broj telefona<span class="text-danger">*</span>:</label>
				<input type="number" id="telx" class="form-control text-center" name="tel" min="0" oninput="javascript: if (this.value.length > this.maxLength) {alert('Ne može više od 10 cifara ...'); this.value = this.value.slice(0, this.maxLength);}"
				maxlength = "10" name="telx" placeholder="Unesite broj telefona ..."  value=''>
			
			</div>

		<div class="form-group col-sm-3">
		<label for="sel1">Kategorija:</label>
			<select class="form-control" id="selx">
				<option id="telx1" value="1">mobilni</option>
				<option id="telx2" value="2">fiksni</option>
			</select>
		</div>	
		</div>
		<button type="button" id="submit" style="margin-top: 10px" name="submit" class="btn btn-default" data-dismiss="modal" onclick='uzim_vredyV2("update_upit.php")'>Izmeni</button>	
	</form>
		
</div>
		  
        </div>
        <div class="modal-footer">  
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
    </div>
  </div>
  