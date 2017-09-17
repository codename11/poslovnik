
<?php
include 'funkcije.php';
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


	$br1=0;
	$result = pristup($servername, $username, $password, $dbname, $sql1);
	$len = 0;
	$row_cnt="SELECT COUNT(id) FROM osoba GROUP BY id";
	$row_count = pristup($servername, $username, $password, $dbname, $row_cnt)->num_rows;
	
	$page_count=ceil($row_count/2);
	
	$rejl1 = "<div class='podaci'>
	<table id='tabela' class='table table-hover table-bordered'>
		<thead>
			<tr>
				<th class='text-center'>Redni broj</th>
				<th class='text-center'>Ime</th>
				<th class='text-center'>Prezime</th>
				<th class='text-center'>Telefonski broj</th>
				<th class='text-center'>Kategorija</th>
			</tr>
		</thead>
		";
		
	$rejl2 = "<tbody>";

	echo $rejl1;
	if ($result->num_rows > 0) {
    echo $rejl2;
	
	while($row = $result->fetch_assoc()) {
		$br=$row["id"];
		$br1++;
		
		$arr1=str_split($row["broj"]);
		$len=strlen($row["broj"]);
		$str1="";
		
		for($i=0;$i<$len;$i++){
			
			if($i==3){
				$str1.="/";
			}
			
			if($i==6){
				$str1.="-";
			}
			
			$str1.=$arr1[$i];
		}
		$row["broj"]=$str1;
		
		if($br1<=2){
			$pag_display="";
		}
		else{
			$pag_display="display: none";
		}
		
	?>

	<tr id="arthas<?php echo $br1;?>" class="brew" style="<?php echo $pag_display;?>" onclick='MySerialize("citanje_upit.php",this.id);'>
		<td id="<?php echo $br;?>">
			<label><?php echo $br1.". ";?><input type='checkbox' class='bx'  id="<?php echo $br;?>">
				<span id="spen" style="display:none"><?php echo $br;?></span>
			</label>
		</td>
		<td id='ime'><?php echo $row["ime"]?></td>
		<td id='prezime'><?php echo $row["prezime"]?></td>
		<td id='broj'><?php echo $row["broj"]?></td>
		<td id='kategorija'><?php echo $row["kategorija"];?>
	<button style='float:right' id='<?php echo $br;?>' type='button' data-toggle="modal" data-target="#myModal" class='btn btn-info btn-xs' onclick='uzim_vredx("citanje_upit.php",<?php echo $br;?>,<?php echo $br1;?>)'>Update</button>
	</td>
	</tr>
	
	
	
	<?php	
			
		}
		echo "</tbody>";
	}
	else {
     echo "0 results";
}
	echo "</table></div>";
	
	$br_str=0;
	$marg_left="";
	$klasicax="";
	echo "</br>";
		if(!empty($br1)){
				echo "<a id='levo' class='btn btn-info btn-md' style='margin-right: 3px;' onclick='pag_arrow(this.id)'>
          <span class='glyphicon glyphicon-arrow-left' style='height: 16px'></span>
        </a>";
			for($i=0;$i<$br1;$i++){
				if(is_int($i/2)){
					$br_str++;
					
					if($br_str>=2){
						$marg_left="margin-left: 3px;";
					}
					
					if($br_str==1){
						$klasicax=" klasicax";
					}
					else{
						$klasicax="";
					}
					
					?>
					
					<button style="<?php echo $marg_left?>" type="button" id="trash<?php echo $br_str?>" name='but' class="btn btn-info btn-sm podaci<?php echo $klasicax ?>" onclick="pagination(<?php echo $br_str?>,this.id)"><?php echo $br_str?></button>
			<?php
				}
			}
	
		}echo "<a id='desno' class='btn btn-info btn-md' style='margin-left: 3px;' onclick='pag_arrow(this.id)'>
          <span class='glyphicon glyphicon-arrow-right' style='height: 16px'></span>
        </a>";
	echo "</br>";	
	echo "</br>";
?>

<button type="button" style="color: black;" class='btn btn-default podaci' onclick="MySerializeV2('citanje_upit.php',this.e)">Potvrdi brisanje</button>

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
		<button type="button" id="submit" style="margin-top: 10px" name="submit" class="btn btn-default" data-dismiss="modal" onclick='uzim_vredy("update_upit.php")'>Izmeni</button>	
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


