
<?php
include 'funkcije.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poslovnik";

	$row_cnt="SELECT COUNT(id) FROM osoba GROUP BY id";
	$row_count = pristup($servername, $username, $password, $dbname, $row_cnt)->num_rows;

	
	
	if(isset($_GET["strn"])){
		$offset=$_GET["strn"];
		$br1=$_GET["strn"];
	}
	else{
		$offset=0;
		$br1=0;
	}
	
	if(isset($_GET["strn1"])){
		$limit=$_GET["strn1"];
		$page_count=ceil($row_count/$limit);
	}
	else{
		$limit=5;//Default limit
		$page_count=ceil($row_count/$limit);
	}

$sql="SELECT osoba.id,ime, prezime, tel_broj.broj, tel_kategorija.kategorija
FROM osoba,tel_broj,tel_kategorija 
WHERE osoba.id = tel_broj.osoba_FK
AND tel_broj.kategorija_FK=tel_kategorija.id LIMIT $limit OFFSET $offset";
	
	$result = pristup($servername, $username, $password, $dbname, $sql);
	
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
	echo "</table></div>";
	
	$br_str=0;
	$marg_left="";
	$klasicax="";
	echo "</br>";
		if(!empty($br1)){
				echo "<a id='levo' class='btn btn-info btn-md' style='margin-right: 3px;' onclick='pag_arrow_lim(this.id)'>
          <span class='glyphicon glyphicon-arrow-left' style='height: 16px'></span>
        </a>";
		
		$br_str=0;
			for($i=0;$i<$page_count;$i++){
					$br_str++;
					?>
					
					<button style="<?php echo $marg_left?>" type="button" id="trash<?php echo $br_str?>" name='but' class="btn btn-info btn-sm podaci<?php echo $klasicax ?>" onclick="myfunk('izvestaj3.php',<?php echo $br_str?>, 5)"><?php echo $br_str?></button>
			<?php
			}
	
		}echo "<a id='desno' class='btn btn-info btn-md' style='margin-left: 3px;' onclick='pag_arrow_lim(this.id)'>
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