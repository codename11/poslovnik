<?php
define('MyConst1', TRUE);
include 'header.php';
include 'navbar.php';
?>
  
<div class="container-fluid text-center">
<form method="POST" id="F1" class="vcenter" autocomplete="on">

	<div class="row" id="aps">

	<div class="form-group col-xs-3">
		
			<label for="usr1">Ime<span class="text-danger">*</span>:</label>
			<input type="text" id="ime" class="form-control text-center" maxlength="30" name="ime" placeholder="Ime" required>
			
	</div>
	
	<div class="form-group col-xs-3">
	
			<label for="usr2">Prezime<span class="text-danger">*</span>:</label>
			<input type="text" id="prezime" class="form-control text-center" maxlength="30" name="prezime" placeholder="Prezime" required>
		
	</div>
	<div class="form-group col-xs-3">
		
			<label for="usr3">Broj telefona<span class="text-danger">*</span>:</label>
			<input type="number" id="tel" class="form-control text-center" name="tel" min="0" oninput="javascript: if (this.value.length > this.maxLength) {alert('Ne može više od 10 cifara ...'); this.value = this.value.slice(0, this.maxLength);"
			maxlength = "10" placeholder="Unesite broj telefona ..." required>
			
    </div>

	
		<?php 
			include "kategorije_options.php";
		?>
	
	
	</div>
	<button type="submit" id="sub" style="margin-top: 10px" name="submit" class="btn btn-default" onclick="uzim_vred('upis_upit.php')">Pošalji</button>
	</form>
</div>
<div id="dix"></div>

</body>
</html>
