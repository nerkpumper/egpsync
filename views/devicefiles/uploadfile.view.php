<script type="text/javascript">

$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        console.log(numFiles);
        console.log(label);
        $('#filename').val (label);
    });
});	
</script>

<h2><?= $nombre ?> <small>Subir Archivos</small></h2>
<a href="<?php echo URL ?>device/"> Regresar al listado </a> 
<hr>
<?php if(isset($msgSuccess)): ?>
	<?php echo $msgSuccess; ?>
<?php endif;?>

<?php if(isset($msgError)): ?>
	<?php echo $msgError; ?>
<?php endif;?>

<form class="form-horizontal" method="post" enctype="multipart/form-data"  action="<?php echo URL.'devicefiles/uploadfile/'.$iddevice; ?>">
	<div>
		<div class="row">
			<div class="col-md-10">
				<div class="input-group">      
					<span class="input-group-btn">
				    	<span class="btn btn-primary btn-file">
							Buscar Archivo <input type="file" id="archivo" name="archivo">
						</span>
				      </span>
				      <input id="filename" name="filename" type="text" class="form-control" placeholder="Archivo ..." disabled>
				</div>
			</div>

			<div class="col-md-2">			
					<button id="btnUpload" name="btnUpload" class="btn btn-primary">Subir Archivo</button>			
			</div>
		</div>
	</div>
</form>

<!-- <?php 
// $directorio = opendir("assets/devices/$iddevice"); //ruta actual
// echo "<br/><br/><br/><br/>";
// while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente{
// {	
// 	if (!is_dir($archivo))//verificamos si es o no un directorio
// 	{
// 		//echo $archivo . " / "; //de ser un directorio lo envolvemos entre corchetes
// 		echo "<a class='btn btn-primary' href='assets/devices/$iddevice/$archivo' download='$archivo'>$archivo</a><br/>";
// 	}	
// }
 ?>-->

<!-- <hr> 
<a href="<?php echo URL ?>devicefiles/uploadfile/<?php echo $iddevice; ?>" class="btn btn-primary btn-sm" >-->
<!-- 	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;Lee Archivo					      -->
<!-- </a> -->
<br>
<br>



<?php if(isset($msgContentFile)): ?>

	<div class='well'>
		<h4>Resultados 
			<small>
				<?php if(isset($archivoProcesado) && isset($archivoProcesadoCorto)):?>
					<a class='btn btn-primary btn-sm' href='<?= $archivoProcesado; ?>' download='<?= $archivoProcesadoCorto; ?>'>Descargar</a><br/>
				<?php endif;?>
			</small>
		</h4>	
	
		<?php echo $msgContentFile; ?>
	</div>
<?php endif;?>

<hr>






