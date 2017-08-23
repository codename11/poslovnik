<script>
function MySerialize(phpdoc,input_id){
	//function MySerialize(input_id){
	
	var cnt=0;
	var ajdi = document.getElementById(input_id);
	var ajdiKid= ajdi.children;
	var arr=[];

	var i=0;
	var j=1;
	var str="";
	for (i = 0, j=0; i < ajdiKid.length && j< ajdiKid.length; i++,j++) {
		str += ajdiKid[j].innerHTML;
	
		if(j != ajdiKid.length-1){
			str +=","
		}
	
	}
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			ajdi.classList.toggle("klasica");
			//alert(this.responseText);
			console.log(this.responseText)
			alert(str);
		}
	};
	
	xhttp.open("GET", phpdoc+"?str="+str, true);
	//xhttp.open("GET", "brisanje_upit.php?str="+str, true);
	xhttp.send()
	/*ajdi.classList.toggle("klasica");
	alert(str);*/
	
	/*kada se umesto phpdoc-a stavi brisanje_upit.php, 
	onda radi, pod uslovom da se gore iz definicije funkcije 
	i iz $rejl3 varijable(koja se nalazi u citanje_upit.php) 
	izbrise kao parametar*/
	//xhttp.send();
}

</script>


<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}

.klasica{
	border: 4px solid red;
}
</style>
</head>
<body>

<h2>Cell that spans two columns:</h2>
<table style='width:100%'>
  <tr>
    <th>Name</th>
    <th colspan='2'>Telephone</th>
  </tr>
  <tr id="br1" onclick="MySerialize('proba.php',this.id)">
   <!-- <tr id='br1' onclick='alert("fff")'>-->
  
    <td>Bill Gates</td>
    <td>55577854</td>
  </tr>
</table>

</body>
</html>



