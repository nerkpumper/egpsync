<h2><?= $nombreDispositivo ?> <small>Configuraci&oacute;n</small></h2> <a href="<?php echo URL ?>device/"> Regresar al listado de configuraciones </a>
<hr>

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

<?php if(!isset($definicion)): ?>
	<?php $definicion='A'; ?>
<?php endif;?>

<?php if($id>0): ?>
<form class="form-horizontal" method="post" action="<?php echo URL.'deviceconfig/insertorupdater/'.$iddevice.'/'.$id; ?>">
<?php else : ?>
<form class="form-horizontal" method="post" action="<?php echo URL.'deviceconfig/insertorupdater/'.$iddevice; ?>">
<?php endif;?>
	<fieldset>

		<div class="row">			
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="form-group">		
						<label class="col-md-2 control-label" for="txtNombre">Nombre</label>
						<div class="col-md-10">
							<input value="<?php echo $nombre; ?>" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la columna" class="form-control input-md" required="">	
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">		
						<label class="col-md-2 control-label" for="txtNombre">Columna</label>
						<div class="col-md-10">
							<select id="selDefinicion" name="selDefinicion" class='form-control'>
							<?php
							 	$columns = explode(',', $columnsDevice);
								foreach ($columns as $column):?>
								<option value="<?= $column; ?>" <?php  if ($column == $definicion) echo 'selected';?>><?= $column; ?></option>
							<?php endforeach;?>
							</select>						
						</div>
					</div>
				</div>
				<div class="col-md-12 ">
					<div class="form-group">
						<label class="col-md-2 control-label" for="btnGuardar"></label>
						<div class="col-md-10">
							<button id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar</button>
							| <a href="<?php echo URL . 'deviceconfig/config/' . $iddevice; ?>"> Regresar </a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6" style="border-left: thin solid #ccc;">
				<div class='well'>				
					<h4>Columnas</h4>
					<hr>				
					<table  class="table table-striped table-bordered">
						<thead>
							<tr>											
								<th>Shortcut</th>	
								<th>Nombre</th>
								<th>Definici&oacute;n</th>													
							</tr>
						</thead>
						<?php foreach($lst as $row): ?>
					
						<tr>						
							<td>C<?php echo $row['orden'];?></td>
							<td><?php echo $row['nombre'];?></td>			
							<td><?php echo $row['definicion'];?></td>						
						</tr>
						
						<?php endforeach;?>					
					</table>
				</div>
			</div>
		</div>		
	</fieldset>
</form>

