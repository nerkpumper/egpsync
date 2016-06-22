<script>

function isNumeric(input) {
    var number = /^\-{0,1}(?:[0-9]+){0,1}(?:\.[0-9]+){0,1}$/i;
    var regex = RegExp(number);
    return regex.test(input) && input.length>0;
}

function isValidDate(dateString)
{
    // First check for the pattern
    //var regex_date = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
    var regex_date = /^(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/;

    if(!regex_date.test(dateString))
    {
        return false;
    }

    // Parse the date parts to integers
    var parts   = dateString.split("/");
    var day     = parseInt(parts[0], 10);
    var month   = parseInt(parts[1], 10);
    var year    = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
    {
        return false;
    }

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
    {
        monthLength[1] = 29;
    }

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
}

var guardarPromocion = function()
{
	var fi = $('#dtInicio').val();
	var ff = $('#dtFin').val();
	var precio = $('#txtPrecio').val();
	var isValid = true;
	

	if (!isValidDate(fi))
	{
		Materialize.toast('La Fecha Inicio ' + fi + ' no es v&aacute;lida', 4000) // 4000 is the duration of the toast
		isValid = false;
	}

	if (!isValidDate(ff))
	{
		Materialize.toast('La Fecha Fin ' + ff + ' no es v&aacute;lida', 4000) // 4000 is the duration of the toast
		isValid = false;
	}

	if (ff<fi)
	{
		Materialize.toast('La Fecha Fin NO debe ser menor a la Fecha Inicio', 5000) // 4000 is the duration of the toast
		isValid = false;
	}

	if (!isNumeric(precio))
	{
		Materialize.toast('Es necesario agregar un Precio de Promoci&oacute;n', 5000) // 4000 is the duration of the toast
		isValid = false;
	}

	if (isValid)
	{
		$('#frmPromo').submit();
		return true;
	}
		
	return false;	
};

$(document).ready(function(){
	$('#btnGuardar').click(guardarPromocion);
	
});

</script>


<form id="frmPromo"  method="post"
	action="<?php echo URL.'perfumes/setdatepromocion/'. $idperfume; ?>">

		<div class="row">
			<div class="col s6 offset-s3 ">
				<div class="card-panel ">
					<div class="row">
						<div class="col s10">
							<h5>
								<strong><?php echo $perfume->getNombre ();?></strong>
							</h5>
						</div>
					</div>
					<div class="divider" style="margin-top: -20px; margin-bottom: 5px"></div>
					<div class="row">
						<div class="col s10">
							<h6>
								<strong><?php echo $perfume->getDescripcion ();?></strong>
							</h6>
						</div>
					</div>
					<div>&nbsp;</div>
					<div class="row">
						<div class="col s6">
							<input id="dtInicio" name="dtInicio" type="date" class="datepicker" value="<?php echo (isset($fechainicio) ? $fechainicio : "");?>"
								placeholder="Fecha Inicial">
						</div>
						<div class="col s6">
							<input id="dtFin" name="dtFin" type="date" class="datepicker" value="<?php echo (isset($fechafin) ? $fechafin : "");?>"
								placeholder="Fecha Final">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="txtPrecio" name="txtPrecio" type="text" class="validate" value="<?php echo (isset($precio) ? $precio : "");?>"> <label
								for="txtPrecio">Precio Promoci&oacute;n</label>
						</div>
					</div>
										

					<div class="row">
						<div class="input-field col s9">
							<input id="txtCodigo" value="<?php echo $perfume->getCodigo(); ?>" name="txtCodigo" type="hidden" class="validate"> <label
									for="txtCodigo"></label>
						</div>
						<div class="input-fiels col s3 ">
							<button id="btnGuardar" name="btnGuardar" class="btn btn-primary blue darker-3">Guardar</button>
						</div>

						
					</div>

					<script>
				$('.datepicker').pickadate({
				    selectMonths: true, // Creates a dropdown to control month
				    selectYears: 15, // Creates a dropdown of 15 years to control year
				    format: 'dd/mm/yyyy'  
				  });
			</script>

				</div>
			</div>
		</div>

	
</form>