<?php if(isset($msgSuccess)): ?>
	<?php echo $msgSuccess; ?>
<?php endif;?>

<?php if(isset($msgError)): ?>
	<?php echo $msgError; ?>
<?php endif;?>

<?php if(!isset($id)): ?>
	<?php $id=0 ?>
<?php endif;?>

<?php if(!isset($nombre)): ?>
	<?php $nombre=''; ?>
<?php endif;?>


<?php if($id>0): ?>
<form class="form-horizontal" method="post" action="<?php echo URL.'device/insertorupdate/'.$id; ?>">
<?php else : ?>
<form class="form-horizontal" method="post" action="<?php echo URL.'device/insertorupdate/'; ?>">
<?php endif;?>
	<fieldset>

	<div class="row">
		<div class="col-md-8">
			<div class="form-group">		
				<label class="col-md-2 control-label" for="txtNombre">Nombre</label>
				<div class="col-md-10">
					<input value="<?php echo $nombre; ?>" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Dispositivo" class="form-control input-md" required="">	
				</div>
			</div>
		</div>
		<div class="col-md-8 ">
			<div class="form-group">
				<label class="col-md-2 control-label" for="btnGuardar"></label>
				<div class="col-md-10">
					<button id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar</button>
					| <a href="<?php echo URL ?>device/"> Regresar al listado </a>
				</div>
			</div>
		</div>
	</div>	
		
	</fieldset>
</form>
