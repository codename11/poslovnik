<?php
if(!defined('MyConst1')) {
   die('Direct access not permitted');
}
include 'funkcije.php';

session_start();

$_SESSION["ime"] = "";
$_SESSION["prezime"] = "";
$_SESSION["broj"] = "";


//$_SESSION["kategorijax"] = "";
?>

<html lang="en">
<head>
	<title>Poslovnik</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<meta name="author" content="Veljko Stefanović">
	<meta name="email" content="veljkos82@gmail.com">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="altstyles.css">
	<link rel="stylesheet" type="text/css" href="indicatorsofcarousel.css">
	<script src="skripta.js"></script>
	<script src="indicatorsofcarousel.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	</head>
<body>
<?php
include 'head.php';
?>
