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
	

	$("#listDiv").height(height);
	$("#personal").height(height);
	
    $('#transparent').height(height);
	$("#List").height(height);	
	$("#info").height(height);
	$("#Form").height(height);
	
	$(".formData").height(height-$(".redTitle").height()-$(".button").height()-120);
	$(".tableDiv").height(height-$("#listTitle").height()-$("#new").height()-50);
	$("#personList").height(height-$("#newInfo").height()-$('#photoTitle').height()-50);	
}
