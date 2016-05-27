
/*
$('.publicar').on('click', function (){
	if($("#publicar").is(':checked')) {  
            dato=1;
        } else {  
            dato=0; 
        }

	var $this = $(this);

    var cabId = $this.attr('data-cabId');
    alert(dato + '     id: ' + cabId);


    $.ajax({
        data: {
            cabId: cabId,
            checkboxStatus: dato,
            headers: {'X-CSRF-TOKEN': $('#token').val()}
        },
        url: 'publicar',
        type: 'POST',
        dataType: 'json'
    });
});
*/
/*
var dato=0;
$(function() {
	$('body').on('click', '#table input[type=checkbox]', function(event){
		var cabId = $(this).attr('data-cabId');
		if($("#publicar").is(':checked')) {  
            dato=1;
        } else {  
            dato=0; 
        } 
        var route = "publicar";
		var token = $("#token").val();
		alert(cabId + dato);
		
		$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{publicar: dato, cabId: cabId},
		
		success:function(){
			$("#msj-success").fadeIn();
		}
		
		
	});
});
*/

/*
var dato=0;
$("#publicar").click(function(){
	if($("#publicar").is(':checked')) {  
            dato=1;
        } else {  
            dato=0; 
        } 

	var cabId = $("#cabId").val();
	var route = "publicar";
	var token = $("#token").val();
	console.log($("#publicar").is(':checked'));
	console.log($("#cabId").val());

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{publicar: dato, cabId: cabId},
		
		success:function(){
			$("#msj-success").fadeIn();
		}
		
	});

});
*/
