<?php
if(!defined('MyConst1')) {
   die('Direct access not permitted');
}
?>
<nav class="navbar navbar-default navos" id="nav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Upis.php">Upis</a></li>
        <li><a href="izvestaj.php">Izveštaj/Brisanje</a></li>
        <li><a href="izmena.php" onclick="opkat('izmena.php')">Izmena</a></li>
		<!--<li><a href="vozni_park.php" onclick="opkat('vozni_park.php')">Vozni park</a></li>
		<li><a href="online_upis.php" onclick="opkat('online_upis.php')">Online upis</a></li>
		<li><a href="novosti.php" onclick="opkat('novosti.php')">Novosti</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="testovi.php" target="_blank" onclick="opkat('testovi.php')">Testovi<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="testx1.php" data-toggle="tooltip" data-placement="right" title="Test 1" onclick="opkat('testx1.php')">Test 1</a></li>
			<li><a href="testx2.php" data-toggle="tooltip" data-placement="right" title="Test 2" onclick="opkat('testx2.php')">Test 2</a></li>
			<li><a href="testx3.php" data-toggle="tooltip" data-placement="right" title="Test 3" onclick="opkat('testx3.php')">Test 3</a></li>
			<li><a href="testx4.php" data-toggle="tooltip" data-placement="right" title="Test 4" onclick="opkat('testx4.php')">Test 4</a></li>
			<li><a href="testx5.php" data-toggle="tooltip" data-placement="right" title="Test 5" onclick="opkat('testx5.php')">Test 5</a></li>
			<li><a href="testx6.php" data-toggle="tooltip" data-placement="right" title="Test 6" onclick="opkat('testx6.php')">Test 6</a></li>
			<li><a href="saobracajni-znaci.php" data-toggle="tooltip" data-placement="right" title="Saobraćajni znaci" onclick="opkat('saobracajni-znaci.php')">Saobraćajni znaci</a></li>
          </ul>
        </li>
		<li><a href="kontakt.php">Kontakt</a></li>-->
        
      </ul>
    </div>
  </div>
</nav>