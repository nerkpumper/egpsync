<h2><?= $nombre ?> <small>Borrar Configuraci&oacute;n</small></h2> <a href="<?php echo URL . 'deviceconfig/'. $iddevice; ?>"> Regresar al listado </a>
<hr>

<?php if(isset($msgSuccess)): ?>
	<?php echo $msgSuccess; ?>
	<a href="<?php echo URL . 'deviceconfig/' . $iddevice; ?>"> Regresar al listado </a>
<?php else : ?>

<div class='alert alert-danger' role='alert'>¿Esta seguro de querer eliminar la siguiente Configuración del Dispositivo?</div>

<form class="form-horizontal" method="post" action="<?php echo URL.'deviceconfig/destroy/'. $iddevice . '/' .$id; ?>">
	<fieldset>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-2 control-label">Shortname</label>
				<div class="col-md-10">
					<p class="form-control-static"><?= $shortname?></p>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-2 control-label">Nombre</label>
				<div class="col-md-10">
					<p class="form-control-static"><?= $nombre?></p>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-2 control-label">Configuraci&oacute;n</label>
				<div class="col-md-10">
					<p class="form-control-static"><?= $configuracion?></p>
				</div>
			</div>
		</div>
		<div class="col-md-8 ">
			<div class="form-group">				
				<div class="col-md-10 col-md-offset-2">
					<button id="btnDelete" name="btnDelete" class="btn btn-danger">Borrar</button>
					| <a href="<?php echo URL . 'device/' . $iddevice; ?>"> Regresar al listado </a>
				</div>
			</div>
		</div>
	</div>
	
		
		
	</fieldset>
</form>

<?php endif;?>

