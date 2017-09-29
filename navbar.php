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
		 <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="izvestaj.php" target="_blank" onclick="opkat('izvestaj.php')">Izveštaj<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="izvestaj.php" data-toggle="tooltip" data-placement="right" title="Izveštaj 1" onclick="opkat('izvestaj.php')">Izveštaj 1</a></li>
			<li><a href="izvestaj1.php"  data-toggle="tooltip" data-placement="right" title="Izveštaj 2" onclick="opkat('izvestaj1.php')">Izveštaj 2</a></li>
			<li><a href="izvestaj2.php"  data-toggle="tooltip" data-placement="right" title="Izveštaj 3" onclick="opkat('izvestaj2.php')">Izveštaj 3</a></li>
          </ul>
        </li>
		
      </ul>
    </div>
  </div>
</nav>