var points=0;
var w = window.outerWidth;
var h = window.outerHeight;
	
$(document).ready(function(){
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$('#example').DataTable( {
        "pagingType": "full_numbers",
		"language": {
            "lengthMenu": "Prikaži _MENU_ unosa po strani",
            "zeroRecords": "Nula unosa je prikazano ...",
            "info": "Prikazana je _PAGE_ od _PAGES_ strane",
            "infoEmpty": "Ne postoje unosi ...",
            "infoFiltered": "(filterovano je od ukupnih _MAX_ unosa)",
			"emptyTable":     "Prazna tabela",
			"loadingRecords": "Učitavam unose ...",
			"processing":     "Procesiram ...",
			"search":         "Pretraži:",
			"paginate": {
				"first":      "Prva",
				"last":       "Poslednja",
				"next":       "Sledeća",
				"previous":   "Prethodna"
			}
        }
		
    } );
	
	if ($(window).width() < 768 && $(window).load()) {
			$("#up").hide();
			$("#nav").addClass("navbar-static-top");
			$("#myNavbar").addClass("collapse navbar-collapse");
		}
		
		if($(window).load()){
			if ($(window).width() < 768) {
			$("#up").hide();
			$("#nav").addClass("navbar-static-top");
			$("#myNavbar").addClass("collapse navbar-collapse");
			}
		}
	
	$(window).resize(function() {
		if ($(window).width() < 768 && $(window).load()) {
			$("#up").hide();
			$("#nav").addClass("navbar-static-top");
			$("#myNavbar").addClass("collapse navbar-collapse");
		}
		else{
			$("#up").show();
			$("#nav").removeClass("navbar-static-top");
		}
		
		if($(window).load()){
			if ($(window).width() < 768) {
			$("#up").hide();
			$("#nav").addClass("navbar-static-top");
			$("#myNavbar").addClass("collapse navbar-collapse");
			}
		}
		else{
			$("#up").show();
			$("#nav").removeClass("navbar-static-top");
		}
		
	});

	if(w>500){
		$( "span" ).remove( ".glyphicon.glyphicon-chevron-up" );
	}

	$(window).resize(function(){
		
		if(w>500){
		$( "span" ).remove( ".glyphicon.glyphicon-chevron-up" );
		}
		
    });
	
   
	
	 $(function(){ //Odavde
  var current_page_URL = location.href;
  $( "a" ).each(function() {
     if ($(this).attr("href") !== "#") {
       var target_URL = $(this).prop("href");
       if (target_URL == current_page_URL) {
          $('nav a').parents('li, ul').removeClass('active');
          $(this).parent('li').addClass('active');
          return false;
       }
     }
  });
}); //dovde je kod za setovanje 'active' klase navbar-a kada se promeni stranica.

//<smoothscroll

// Add smooth scrolling to all links in navbar + footer link
  $("#arrow").on('click', function(event) {

  // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if 
  });

//smoothscroll>

// bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    
    
   
		
	
		
	$('#sort').find('option').css("border-bottom", "1px solid #f2f2f2");
	$('#sel').find('option').css("border-bottom", "1px solid #f2f2f2");

});

var bx1=1;
var bx2=2;
function uzim_vred(phpdoc){
	
	if(bx1>1 && bx2>2){
		bx1=1;
		bx2=2;
	}
	
	var ime = document.getElementById("ime").value;
	var prezime = document.getElementById("prezime").value;
	var broj = document.getElementById("tel").value;
	var kategorija =  document.getElementById("sel").value;
	
	var srt=document.getElementById("sort");

	if(srt===undefined || srt===null){
		
		var str=ime+","+prezime+","+broj+","+kategorija;
		console.log('ne postoji!');
	}
	else if(srt!=undefined || srt!=null){
		var sort =  srt.value;
		var str=ime+","+prezime+","+broj+","+kategorija+","+sort;
		console.log('postoji!');
		
	}

	if (str.length == 0 &&(document.getElementById("raport")!=undefined || document.getElementById("raport")!=null)) { 
		document.getElementById("raport").innerHTML = "";
		return;
	}
	//alert(str.length);
	
	if(str.length!=0 && str!=",,,"){
		
		var xhttp = new XMLHttpRequest();
	
		xhttp.onreadystatechange = function() {
    
			if(document.getElementById("raport")!=undefined || document.getElementById("raport")!=null){
				document.getElementById("raport").innerHTML = this.responseText;
			}
	 
		};
 
		xhttp.open("GET", phpdoc+"?str="+str, true);
		xhttp.send();
		
	}
	

	
}

/*
$("#F1").submit(function(e) {

    var url = "citanje_upit.php"; // the script where you handle the form input.

    $.ajax({
           type: "GET",
           url: url,
           data: $("#F1").serialize(), // serializes the form's elements.
           success: function(data)
           {
				document.getElementById("raport").innerHTML=data;
               
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
JQUERY verzija gornje funkcije za sabmitovvanje forme(AJAX isto).
*/

/*$("#submit").submit(function(e) {

    var url = "citanje_upit.php"; // the script where you handle the form input.

    $.ajax({
           type: "GET",
           url: url,
           data: $("#submit").serialize(), // serializes the form's elements.
           success: function(data)
           {
				document.getElementById("raport").innerHTML=data;
              
           }
         });

    //e.preventDefault(); // avoid to execute the actual submit of the form.
});*/

function MySerialize(phpdoc,input_id){
	
	var ajdi = document.getElementById(input_id);
	//ajdi.classList.toggle("klasica");
	var ajdiKid= ajdi.children;
	var arr=[];

	var i=0;
	var j=1;
	var str="";

	for (i = 0, j=1; i < ajdiKid.length-1 && j< ajdiKid.length; i++,j++) {
		str += ajdiKid[j].innerHTML;
		
		if(j != ajdiKid.length-1){
			str +=","
		}

	}
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			xhttp.open("GET", phpdoc+"?str="+str, true);
			xhttp.send()
			
		}
	};
	
	

}


function MySerializeV2(phpdoc,e){
	
	var selected = [];
	var i=0;
	var query="DELETE FROM osoba WHERE id IN(";
	var check_box=$(".bx:checked");
	var len=check_box.length;
	var last_elm=len-1;
	var lenx=0;
		var uniqueNames = [];
	$(".bx:checked").each(function(){
			
		selected.push($(this).attr("id"));
		
		
		
		$.each(selected, function(i, el){
			
		if($.inArray(el, uniqueNames) === -1){ 
			uniqueNames.push(el)
			};
		lenx=uniqueNames.length;
		});
		
		
		
		i++;	
			
	});
	
	for(var j=0;j<lenx;j++){
		if(j<lenx-1){
			
			query += uniqueNames[j]+",";
		}
			
		if(j==lenx-1){
				query += uniqueNames[j]+")";
		}
	}
	
		
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			$(".brew").hide(500, function(){
				$("#raport").load(phpdoc);
			});
			
			location.reload();
			
		}
	};
	
	xhttp.open("GET", "del_rec.php?query=" + query, true);
	xhttp.send()

}

var ajdi=0;
function uzim_vredx(phpdoc,person_id,row_id){
	//alert("person_id: "+person_id+", row_id: "+row_id);
	var x=document.getElementById(person_id).parentElement.nodeName;
	var y=x.id;
	ajdi=person_id;
	var xt=document.getElementById("tabela").rows[row_id];
	var ime = xt.cells[1].innerHTML;
	var prezime = xt.cells[2].innerHTML;
	var broj= xt.cells[3].innerHTML;
	var br=broj.match(/\d/g);
	var broj_clean="";
	
	for(var i=0;i<br.length;i++){
		
		if(br[i]!=","){
			broj_clean +=br[i];
		}
		
	}
	
	var strx= xt.cells[4].innerHTML;
	
	var kategorija= strx.substring(0, strx.indexOf( "<" ));
	
	var trt="";

	for(var i=0;i<kategorija.length-1;i++){
		
			trt+=kategorija[i];
	
	}
	kategorija=trt;
	
	var strx=ajdi+","+ime+","+prezime+","+broj_clean+","+kategorija;
	
	if (strx.length == 0) { 
		alert("Niste popunili sva polja...");
	}
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		
		if (this.readyState == 4 && this.status == 200) {
			
				 
			document.getElementById("imex").value = ime;
			document.getElementById("prezimex").value = prezime;
			document.getElementById("telx").value = broj_clean;
			
			if(kategorija=="fiksni"){
				
				document.getElementById("telx1").value = 2;
				document.getElementById("telx2").value = 1;
				document.getElementById("telx1").innerHTML = "fiksni";
				document.getElementById("telx2").innerHTML = "mobilni";
				
			}
			else if(kategorija=="mobilni"){
				
				document.getElementById("telx1").value = 1;
				document.getElementById("telx2").value = 2;
				document.getElementById("telx1").innerHTML = "mobilni";
				document.getElementById("telx2").innerHTML = "fiksni";
				
			}
			
		}
		
	};
	
	xhttp.open("GET", phpdoc+"?strx="+strx, true);
	xhttp.send();
		
}

function uzim_vredy(phpdoc){
	var ime = document.getElementById("imex").value;
	var prezime = document.getElementById("prezimex").value;
	var broj = document.getElementById("telx").value;
	var kategorija =  document.getElementById("selx").value;

	var stry=ajdi+","+ime+","+prezime+","+broj+","+kategorija;
	
	if (stry.length == 0) { 
		
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    
		if (this.readyState == 4 && this.status == 200) {
			uzim_vred("citanje_upit.php");
		}
    
	};

	xhttp.open("GET", phpdoc+"?stry="+stry, true);
	xhttp.send();
	
}


function pagination(page,btn_id){
	
	var xt=document.getElementById("tabela").rows.length;
	var elems = document.querySelectorAll(".klasicax");
	var btn_subStr=btn_id.substring(5);
	
	if(((xt-1)%2)==0){// Checking for even number of records displayed in table excluding first <tr>(row) that containes <th>'s. By default, it shows odd number of rows because also counts row with <th>'s. 
	//alert("even");
	bx1=(btn_subStr*2)-1;
	bx2=btn_subStr*2;
	b1="arthas"+bx1;
	b2="arthas"+bx2;
	
	document.getElementById(b1).style.display="table-row";
	document.getElementById(b2).style.display="table-row";
	
	for(var i=1;i<xt;i++){
		
		if(document.getElementById("arthas"+i).rowIndex!=document.getElementById(b1).rowIndex && document.getElementById("arthas"+i).rowIndex!=document.getElementById(b2).rowIndex){
			document.getElementById("arthas"+i).style.display="none";
		}
		
	}
	
	
	
[].forEach.call(elems, function(el) {
    el.classList.add("klasicay");
	el.classList.add("btn");
	el.classList.add("btn-info");
	el.classList.add("btn-sm");
	el.classList.add("podaci");
});
	
	document.getElementById(btn_id).className = "klasicax btn btn-info btn-sm podaci";
	
}

if((xt%2)==0){ // Checking for odd number of records displayed in table excluding first <tr>(row) that containes <th>'s. By default, it shows odd number of rows because also counts row with <th>'s.
	//alert("odd");
		bx1=(btn_subStr*2)-1;
		bx2=btn_subStr*2;
		b1="arthas"+bx1;
		b2="arthas"+bx2;
	
	if((bx1%2)!=0){
		bx1=(btn_subStr*2)-1;
		document.getElementById(b1).style.display="table-row";
		
		for(var i=1;i<xt;i++){
		
			if(document.getElementById("arthas"+i).rowIndex!=document.getElementById(b1).rowIndex){
				document.getElementById("arthas"+i).style.display="none";
			}
		
		}
		
	}
	
	if(document.getElementById(b1)!=null && document.getElementById(b2)!=null){
		document.getElementById(b1).style.display="table-row";
		document.getElementById(b2).style.display="table-row";
	}
	
	if((bx1%2)==0){
		
		for(var i=1;i<xt;i++){
		
		if(document.getElementById("arthas"+i).rowIndex!=document.getElementById(b1).rowIndex && document.getElementById("arthas"+i).rowIndex!=document.getElementById(b2).rowIndex){
			document.getElementById("arthas"+i).style.display="none";
		}
		
	}
		
	}

[].forEach.call(elems, function(el) {
    el.classList.add("klasicay");
	el.classList.add("btn");
	el.classList.add("btn-info");
	el.classList.add("btn-sm");
	el.classList.add("podaci");
});
	
	document.getElementById(btn_id).className = "klasicax btn btn-info btn-sm podaci";
}

console.log(bx1+" , "+bx2);

}



function pag_arrow(input_id){
	var xt=document.getElementById("tabela").rows.length-1;

	var elems = document.querySelectorAll(".klasicax");
		[].forEach.call(elems, function(el) {
		el.classList.add("klasicay");
		el.classList.add("btn");
		el.classList.add("btn-info");
		el.classList.add("btn-sm");
		el.classList.add("podaci");
		});
	
	if((xt%2)==0){
	
	if(input_id=="levo"){
		
		if(bx1==1 && bx2==2){
				bx1=0;
				bx2=0;
		}
		
		if(bx1<(xt-1) && bx2<(xt) && bx1>0 && bx2>0){
			
			bx1=(bx1-2);
			bx2=(bx2-2);
			
			document.getElementById("arthas"+bx1).style.display="table-row";
			document.getElementById("arthas"+bx2).style.display="table-row";
			document.getElementById("arthas"+(bx1+2)).style.display="none";
			document.getElementById("arthas"+(bx2+2)).style.display="none";
			
		}
		
		if(bx1==(xt-1) && bx2==(xt)){
			
			bx1=(bx1-2);
			bx2=(bx2-2);
		
			document.getElementById("arthas"+bx1).style.display="table-row";
			document.getElementById("arthas"+bx2).style.display="table-row";
			document.getElementById("arthas"+(xt-1)).style.display="none";
			document.getElementById("arthas"+xt).style.display="none";
			
		}
		
		if(bx1==0 && bx2==0){
			
			bx1=xt-1;
			bx2=xt;
			
			document.getElementById("arthas"+bx1).style.display="table-row";
			document.getElementById("arthas"+bx2).style.display="table-row";
			document.getElementById("arthas"+(xt-(xt-2))).style.display="none";
			document.getElementById("arthas"+(xt-(xt-1))).style.display="none";
			
		}
		
		
		
		if((bx1>0 && bx2>0) && (bx1<(xt-1) && bx2<(xt)) && (bx1!=1 && bx2!=2)){
			
			bx1=(bx1);
			bx2=(bx2);
			
			document.getElementById("arthas"+bx1).style.display="table-row";
			document.getElementById("arthas"+bx2).style.display="table-row";
			
		}
		
		
			
		if(document.getElementById("trash"+(bx2/2))!=null){
			document.getElementById("trash"+(bx2/2)).className = "klasicax btn btn-info btn-sm podaci";
		}
	}
	
	
	if(input_id=="desno"){
		
		if(bx1>0 && bx2>0){
			
			if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
				
				document.getElementById("arthas"+bx1).style.display="none";
				document.getElementById("arthas"+bx2).style.display="none";
				
			}
			
			bx1+=2;
			bx2+=2;
			
			if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
				
				document.getElementById("arthas"+bx1).style.display="table-row";
				document.getElementById("arthas"+bx2).style.display="table-row";
				
			}
			
		}
		
		if(bx1>(xt-1) && bx2>xt){
			bx1=1;
			bx2=2;
			
			
			if(bx1==1 & bx2==2){
				
				if(document.getElementById("arthas"+bx1)!=null || document.getElementById("arthas"+bx2)!=null){
					document.getElementById("arthas"+bx1).style.display="table-row";
					document.getElementById("arthas"+bx2).style.display="table-row";
				}
				
			}
			
		}

			
		if(document.getElementById("trash"+(bx2/2))!=null){
			document.getElementById("trash"+(bx2/2)).className = "klasicax btn btn-info btn-sm podaci";
		}
		
		
	}

	
		
	
}

	if((xt%2)!=0){ // Regulise strelice za neparan broj unosa iz baze.
	
		if(input_id=="levo"){
			
			if(bx1==1 && bx2==2){
				bx1=0;
				bx2=0;
			}
			
			if(bx1==xt && bx2==(xt+1)){
				bx1=xt;
				bx2=0;
			}
	
			if(bx1<=(xt-2) && bx2<=(xt-1) && bx1>=3 && bx2>=4){
				
				bx1-=2;
				bx2-=2;
				
				if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
					document.getElementById("arthas"+bx1).style.display="table-row";
					document.getElementById("arthas"+bx2).style.display="table-row";
					document.getElementById("arthas"+(bx1+2)).style.display="none";
					document.getElementById("arthas"+(bx2+2)).style.display="none";
				}
				
			
			}
	
			if(bx1==xt && bx2==0){
				
				if(document.getElementById("arthas"+bx1)!=null){
					document.getElementById("arthas"+bx1).style.display="none";
				}
				
				bx1=(xt-2);
				bx2=(xt-1);
				
				if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
					document.getElementById("arthas"+bx1).style.display="table-row";
					document.getElementById("arthas"+bx2).style.display="table-row";
				}
				
				
			}
	
			if(bx1==0 && bx2==0){
				
					document.getElementById("arthas"+(xt-(xt-2))).style.display="none";
					document.getElementById("arthas"+(xt-(xt-1))).style.display="none";
				
				
				bx1=xt;
				if(document.getElementById("arthas"+bx1)!=null){
					document.getElementById("arthas"+bx1).style.display="table-row";
				}
				
			
			}
			
			if(document.getElementById("trash"+Math.ceil(bx1/2))!=null){
				document.getElementById("trash"+Math.ceil(bx1/2)).className = "klasicax btn btn-info btn-sm podaci";
			}
			
		}
		
		if(input_id=="desno"){
		
		if(bx1>0 && bx2>0){
			
			if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
				
				document.getElementById("arthas"+bx1).style.display="none";
				document.getElementById("arthas"+bx2).style.display="none";
				
			}
			
			bx1+=2;
			bx2+=2;
			
			if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
				
				document.getElementById("arthas"+bx1).style.display="table-row";
				document.getElementById("arthas"+bx2).style.display="table-row";
				
			}
			
		}
		
		if(bx1>(xt-1) && bx1!=xt){
		
			bx1=1;
			bx2=2;
			
			
			if(bx1==1 & bx2==2){
				
				document.getElementById("arthas"+xt).style.display="none";
				
				if(document.getElementById("arthas"+bx1)!=null || document.getElementById("arthas"+bx2)!=null){
					document.getElementById("arthas"+bx1).style.display="table-row";
					document.getElementById("arthas"+bx2).style.display="table-row";
				}
				
			}
			
		}
		
		if(bx1==xt){
			
				if(document.getElementById("arthas"+bx1)!=null && document.getElementById("arthas"+bx2)!=null){
				
					document.getElementById("arthas"+(xt-2)).style.display="none";
					document.getElementById("arthas"+(xt-1)).style.display="none";
				
				}
				
				if(document.getElementById("arthas"+bx1)!=null){
					
					document.getElementById("arthas"+bx1).style.display="table-row";
	
				}
				
		}

			
		if(document.getElementById("trash"+(bx2/2))!=null){
			document.getElementById("trash"+(bx2/2)).className = "klasicax btn btn-info btn-sm podaci";
		}
		
		
	}
		
	}

	console.log(bx1+" , "+bx2);
}

var pr_id=0;
function uzim_vredxV2(phpdoc,person_id,row_id, ime, prezime, broj, kategorija){
	
	var strx=person_id+","+ime+","+prezime+","+broj+","+kategorija;
	
	if (strx.length == 0) { 
		alert("Niste popunili sva polja...");
	}
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		
		if (this.readyState == 4 && this.status == 200) {
			
				 
			document.getElementById("imex").value = ime;
			document.getElementById("prezimex").value = prezime;
			document.getElementById("telx").value = broj;
			
			if(kategorija=="fiksni"){
				
				document.getElementById("telx1").value = 2;
				document.getElementById("telx2").value = 1;
				document.getElementById("telx1").innerHTML = "fiksni";
				document.getElementById("telx2").innerHTML = "mobilni";
				
			}
			else if(kategorija=="mobilni"){
				
				document.getElementById("telx1").value = 1;
				document.getElementById("telx2").value = 2;
				document.getElementById("telx1").innerHTML = "mobilni";
				document.getElementById("telx2").innerHTML = "fiksni";
				
			}
			
		}
		
	};
	
	xhttp.open("GET", phpdoc+"?strx="+strx, true);
	xhttp.send();
	pr_id=person_id;
}

function uzim_vredyV2(phpdoc){
	
	var ime = document.getElementById("imex").value;
	var prezime = document.getElementById("prezimex").value;
	var broj = document.getElementById("telx").value;
	var kategorija =  document.getElementById("selx").value;

	var stry=pr_id+","+ime+","+prezime+","+broj+","+kategorija;
	
	if (stry.length == 0) { 
		
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    
		if (this.readyState == 4 && this.status == 200) {
			location.reload();
			
			
		}
    
	};

	xhttp.open("GET", phpdoc+"?stry="+stry, true);
	xhttp.send();
	
}

var offset=0;
var klik=0;
function myfunk(phpdoc,btn_val,limit){
	
	offset=(limit*btn_val)-limit;
	klik=(btn_val-1);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    
		if (this.readyState == 4 && this.status == 200) {
			
			
			document.getElementById("demo").innerHTML =this.responseText;
			
			var elems = document.querySelectorAll(".klasicax");
			[].forEach.call(elems, function(el) {
				el.classList.add("klasicay");
				el.classList.add("btn");
				el.classList.add("btn-info");
				el.classList.add("btn-sm");
				el.classList.add("podaci");
			});
	
			document.getElementById("trash"+btn_val).className = "klasicax btn btn-info btn-sm podaci";
		}

	};
	xhttp.open("GET", phpdoc+"?strn1="+limit+"&strn="+offset, true);
	
	
	xhttp.send();
		
console.log(klik);
	
}


function pag_arrow_lim(phpdoc,input_id,limit){
	var x = document.getElementById("jork").childElementCount;

	if(input_id=="levo"){

		klik--;


		if(klik<0){
			klik=(x-1);
		}
		offset=limit*klik;

	}
	
	if(input_id=="desno"){
	
		klik++;

		if(klik>(x-1)){
			klik=0;
		}
		
		offset=limit*klik;
		
	}
	
	
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    
		if (this.readyState == 4 && this.status == 200) {
			
			
			document.getElementById("demo").innerHTML =this.responseText;
			
			/*var elems = document.querySelectorAll(".klasicax");
			[].forEach.call(elems, function(el) {
				el.classList.add("klasicay");
				el.classList.add("btn");
				el.classList.add("btn-info");
				el.classList.add("btn-sm");
				el.classList.add("podaci");
			});
	
			document.getElementById("trash"+klik).className = "klasicax btn btn-info btn-sm podaci";*/
      
		}

	};

	xhttp.open("GET", phpdoc+"?strn1="+limit+"&strn="+offset, true);

	xhttp.send();
	console.log(klik);
}
