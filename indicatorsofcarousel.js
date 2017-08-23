		
		var clicksRight=0;
		var clicksLeft=0;
		var trini=0;
		var gog=0;
		var pret=0;
		var x=0;
		var y=0;
		var br=0;
		var index=0;
		var currentIndex=0;
		var clicks=0;
		var num=0;
		var mr=0;
		var tmp=0;
		var OldValue = 0;
		var prev_ind=0;
function resizer() {
    
	var prTop=$(".con1").offset().top+$(".con1").outerHeight()-$(".pr").outerHeight();
	var prLeft=$(".con1").offset().left;
	$(".pr").offset({top: prTop, left: prLeft});
	var prWidth=$(".con1").width();
	var prHeight=$(".con1").outerHeight(true)
	$(".pr").width(prWidth);
	
}
$( document ).ready(function() {

  $( ".sl" ).click(function() { 
	gog=0;
	var width=$( ".sl" ).outerWidth();
	var corr=(width/100)*4.4;
	width+=corr;
	index = $( ".sl" ).index( this ); 
	var count = $('.item').length; 
	var cnt = $('.sl').length;

	if(index!=0){
		currentIndex=index;
		clicksLeft=count-(count-currentIndex);
	}
	
	if(index>pret){
		
		if(index==3){
			gog=40;
		}
		
		if(index>3){
			gog=(width*(index-3))+40;
		}
		
		$(".con1").animate({scrollLeft: gog});
		pret=index;
	}
	
	if(index<pret){
		
		if(index==3){
			gog=40;
		}
		
		if(index>3){
			gog=(width*(index-3))+40;
		}
		
		$(".con1").animate({scrollLeft: gog});
		pret=index;
	}
	
	
	x=$(".sl").eq(index).offset().top; 
	y=$(".sl").eq(index).offset().left;
	
	br=$(".con1").scrollLeft();
	clicksLeft=count-index;
	
});



});



function right(){
	gog=0;
	br=$(".con1").scrollLeft();
	var width=$( ".sl" ).outerWidth();
	currentIndex = $('div.active').index() + 1;
	var count = $('.item').length;
	var cnt = $('.sl').length;
	var corr=(width/100)*4.4;
	width+=corr;
	var p1=document.getElementById("lista").scrollWidth;
	var p2=$("#lista").outerWidth();
	var p3=p1-p2;
	clicksRight+=1;
	
	if(br==0 && currentIndex>2){
		gog=br+((width-15)/2);
		$(".con1").scrollLeft(gog); 
	}
	
	if(br>0){
		gog=br+width;
		$(".con1").scrollLeft(gog);
	}
	
	if(br==p3 && currentIndex==count){
		gog=0;
		$(".con1").scrollLeft(gog);
		clicksRight=0;
	}

	clicksLeft=count-currentIndex;
	
}


function left(){
	gog==0;
	br=$(".con1").scrollLeft();
	var width=$( ".sl" ).outerWidth();
	var count = $('.item').length;
	var cnt = $('.sl').length;
	var corr=(width/100)*4;
	width+=corr;
	var p1=document.getElementById("lista").scrollWidth;
	var p2=$("#lista").outerWidth();
	var p3=p1-p2;
	clicksLeft+=1;

	if(br==0 && clicksLeft==1){
		gog=p3;
		$(".con1").scrollLeft(gog);
		currentIndex=count;
	}
	
	if(clicksLeft>4 && br==p3){
		gog=br-width;
		$(".con1").scrollLeft(gog);
	}
	
	if(clicksLeft>4){
		gog=br-width;
		$(".con1").scrollLeft(gog);
	}

	if(currentIndex==0 && clicksRight>0){ 
		gog=p3;
		$(".con1").scrollLeft(gog);
	}
	
	if(clicksLeft>4 && clicksRight>0){
		gog=br-width;
		$(".con1").scrollLeft(gog);
	}

	
	if(clicksRight>0){
		currentIndex-=1;	
	}
	
	if(clicksRight==0 && currentIndex>=0){
		currentIndex=count-clicksLeft;	
	}
	
	if(currentIndex==count && clicksLeft){
		gog=p3;
		$(".con1").scrollLeft(gog);
			
	}
	
	if(currentIndex==0){
		clicksLeft=0;	
	}
	
}




