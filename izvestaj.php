<?php
define('MyConst1', TRUE);
include 'header.php';
include 'navbar.php';
?>

<div class="container-fluid text-center" style="font-family:Palatino Linotype;">
	<form method="POST" id="F1" class="vcenter" autocomplete="on">

		<div class="row" id="aps">

			<div class="form-group col-sm-3">
		
				<label for="usr1">Ime<span class="text-danger">*</span>:</label>
				<input type="text" id="ime" class="form-control text-center" maxlength="30" name="ime" placeholder="Ime" value="<?php echo $_SESSION['ime']; ?>">
			
			</div>
	
			<div class="form-group col-sm-3">
	
				<label for="usr2">Prezime<span class="text-danger">*</span>:</label>
				<input type="text" id="prezime" class="form-control text-center" maxlength="30" name="prezime" placeholder="Prezime" value="<?php echo $_SESSION['prezime']; ?>">
		
			</div>
			<div class="form-group col-sm-2">
		
				<label for="usr3">Broj telefona<span class="text-danger">*</span>:</label>
				<input type="number" id="tel" class="form-control text-center" name="tel" min="0" oninput="javascript: if (this.value.length > this.maxLength) {alert('Ne može više od 10 cifara ...'); this.value = this.value.slice(0, this.maxLength);}"
				maxlength = "10" name="tel" placeholder="Unesite broj telefona ..."  value="<?php echo $_SESSION['broj']; ?>">
			
			</div>
	
			<?php 
				include "kategorije_options.php";
			?>
			
			<div class="form-group col-sm-2">
				<label>Sortiraj po:</label>
				<select class="form-control" id="sort" name='sort'>
					<option value=""></option>
					<option value="1">ime rastuće</option>
					<option value="2">ime opadajuće</option>
					<option value="3">prezime rastuće</option>
					<option value="4">prezime opadajuće</option>
					<option value="5">broj rastuće</option>
					<option value="6">broj opadajuće</option>
				</select>
			</div>
			
		</div>
		<button type="button" id="submit" style="margin-top: 10px" name="submit" class="btn btn-default" onclick="uzim_vred('citanje_upit.php')">Pošalji</button>
		<div id="raport" style="margin-top: 1%;"></div>
		
	</form>
		
</div>



</body>
</html>