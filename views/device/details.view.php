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
			<p class="form-control-static"><?= $nombre ?></p>
		</div>	
	</div>
</div>
<div class="col-md-8">
	<div class="form-group">	
		<div class="col-md-12 col-md-offset-2">
			<a href="<?php echo URL ?>device/insertorupdate/<?php echo $id; ?>" class="btn btn-warning btn-sm" >
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar
			</a>			
			| <a href="<?php echo URL ?>device/"> Regresar al listado </a>
		</div>	
	</div>
</div>

