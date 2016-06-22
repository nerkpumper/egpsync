
var loadSeachPerfumes = function()
{
	var url = URL + "Perfumes/searchperfumes";
    $.get(url, null, function (data) {
    	$('#tblSeachPerfumes tbody').html(data);
    	//$('#btnBotonPrueba').click(saludar2);
    });
};

var inicializaControles = function ()
{
	$(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal-trigger').leanModal();

	    $('.datepicker').pickadate({
	        selectMonths: true, // Creates a dropdown to control month
	        selectYears: 15 // Creates a dropdown of 15 years to control year
	      });
	  });
	
	
    loadSeachPerfumes();
};

$(document).ready(function(){
	inicializaControles();
	
});/**
 * 
 */