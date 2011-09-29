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

function setHeight() {
	var height = window.innerHeight;
	
	$(".tableDiv").height(height-$("#listTitle").height()-$("#new").height()-70);
	$("#listDiv").height(height);
	
	$("#personList").height(height-$("#newInfo").height()-$('#photoTitle').height()-70);	
	$("#personal").height(height);
	
	
	$("#List").height(height);
	
	
	$("#info").height(height);
	$(".formData").height(height-$(".redTitle").height()-$(".button").height()-120);
}
