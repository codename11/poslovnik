<?php
define('MyConst1', TRUE);
include 'header.php';
include 'navbar.php';
?>

<div class="container-fluid text-center" style="font-family:Palatino Linotype;">
	<form id="F1" class="vcenter" autocomplete="on">

		<div id="raport" style="margin-top: 1%;">
		<?php include 'testtable.php';?>
		</div>
		
	</form>

</div>
<div id="drm"></div>
<div id="footer" style="min-height:100%;position:relative;"><?php include 'footer.php';?></div>
</body>
</html>