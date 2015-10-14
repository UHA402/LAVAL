$(document).ready(function() {
	
	//Initialisation du JS Material Design
	$.material.init();
});

function AlertMSG(type, message) {
	$('.modal-title').append(type)
	$('.modal-body').append('<p>' +message+ '</p>');
	$('#myModal').modal('show');
}