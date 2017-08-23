<html>
<head>
<title>prc</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<script>
function inputadd() {
    var div = document.createElement("div");
	document.getElementById("aps").appendChild(div).setAttribute("class", "form-group" );
	var label = document.createElement("label");
	div.appendChild(label).innerHTML="Broj telefona";
	var span = document.createElement("span");
	label.appendChild(span).setAttribute("class", "text-danger" );
	label.appendChild(span).innerHTML="*";
	var input = document.createElement("input");
	div.appendChild(input).setAttribute("type", "text" );
	input.setAttribute("placeholder", "Unesite broj telefona ..." );
	input.setAttribute("class", "form-control text-center" );
	input.setAttribute("name", "broj" );
	input.setAttribute("required", "" );
}
</script>
<button onclick="inputadd()" class="btn btn-info">Try it</button>
<div class="container-fluid text-center">
	<form method="POST" class="vcenter" autocomplete="off" action="">

		<div class="row" id="aps">
			
		</div>
	
	</form>
</div>


</body>
</html>