/**
 * 
 */

$(document).ready(function(){
	//setHeight();
});

window.onresize = function(event) {
	//setHeight();
}

function setHeight() {
	var height = window.innerHeight;
	var width = window.innerWidth*0.01;
	var titleHeight = $("#listTitle").height();
	var buttonHeight = $("#new").height();
	var listHeight = height-titleHeight-buttonHeight-70;
	$("#listDiv").height(height).css({
		'border-left-width': width
	});
	$(".tableDiv").height(listHeight);
	
	$("#List").height(height);
	$("#personList").height(height-$("#newInfo").height()-$('#photoTitle').height()-35);
	$(".formData").height(height-$(".redTitle").height()-$(".button").height()-35);
}
