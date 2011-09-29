/**
 * 
 */

$(document).ready(function(){
	setHeight();
});

window.onresize = function(event) {
	setHeight();
    $('#calendar').fullCalendar('option', 'height', window.innerHeight - 20 ); 
}

window.onload = function(event) {
	setHeight();    
}

function setHeight() {
	var height = window.innerHeight;
	var width = window.innerWidth;

	$("#listDiv").height(height);
	$("#personal").height(height);
	
    $('#transparent').height(height);
	$("#List").height(height);	
	$("#info").height(height);
	$("#Form").height(height);
	
	$(".formData").height(height-$(".redTitle").height()-$(".button").height()-120);
	$(".tableDiv").height(height-$("#listTitle").height()-$("#new").height()-50);
	$("#personList").height(height-$("#newInfo").height()-$('#photoTitle').height()-50);	
	/*
	$('#listDiv').css("border-right", width*0.003+"px solid #999");
	$('#personal').css("border-right", width*0.003+"px solid #999");
	$('#List').css("border-right", width*0.003+"px solid #999");
	
	$('#calendar').css("width",width*0.687);
	$('#Form').css("width",width*0.687);
	$('#info').css("width",width*0.687);
	*/
}
