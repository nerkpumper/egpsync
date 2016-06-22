<?php if(isset($msgSuccess)): ?>
	<?php echo $msgSuccess; ?>
	<a href="<?php echo URL ?>device/"> Regresar al listado </a>
<?php else : ?>

<div class='alert alert-danger' role='alert'>¿Esta seguro de querer eliminar el Dispositivo?</div>

<form class="form-horizontal" method="post" action="<?php echo URL.'device/destroy/'.$id; ?>">
	<fieldset>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label class="col-md-2 control-label">Id</label>
				<div class="col-md-10">
					<p class="form-control-static"><?= $id?></p>
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
		<div class="col-md-8 ">
			<div class="form-group">				
				<div class="col-md-10 col-md-offset-2">
					<button id="btnDelete" name="btnDelete" class="btn btn-danger">Borrar</button>
					| <a href="<?php echo URL ?>device/"> Regresar al listado </a>
				</div>
			</div>
		</div>
	</div>
	
		
		
	</fieldset>
</form>

<?php endif;?>

