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

<?php if(isset($msgError)): ?>
	<?php echo $msgError; ?>
<?php endif;?>

<?php if ($editColumns):?>
	<h2><?= $nombre ?> <small>Establecer nombres de las columnas del Dispositivo</small></h2> 
	<hr>
	
	<?php if(isset($confirmNewColumns)): ?>
		<?php echo $msgColumns; ?>
		
		<form class="form-horizontal" method="post" action="<?php echo URL.'deviceconfig/setcolumns/'.$iddevice ; ?>">
			<fieldset>
				<div class="col-md-12">								
					<input value="<?php echo $strColumns; ?>" id="txtColumns" name="txtColumns" type="text" placeholder="Nombre del Dispositivo" class="form-control input-md" required="">
				</div>
				<div class="col-md-3">			
					<button id="btnGuardar" name="btnGuardar" class="btn btn-primary">Guardar</button> 			
				</div>
			</fieldset>			
		</form>
		<div style="margin-top: 50px;"></div>
		<a href="<?php echo URL . 'deviceconfig/config/' . $iddevice; ?>"> Regresar a la configuraci&oacute;n</a>
	<?php else:?>
	
		<?php echo $msgColumns;?>
	
		<p>Ingrese un Archivo del Dispositivo para obtener y establecer las columnas</p>
		<form class="form-horizontal" method="post" enctype="multipart/form-data"  action="<?php echo URL.'deviceconfig/getcolumns/'.$iddevice; ?>">
			<div>
				<div class="row">
					<div class="col-md-9">
						<div class="input-group">      
							<span class="input-group-btn">
						    	<span class="btn btn-primary btn-file">
									Buscar Archivo <input type="file" id="archivo" name="archivo">		
								</span>
						      </span>
						      <input id="filename" name="filename" type="text" class="form-control" placeholder="Archivo ..." disabled>
						</div>
					</div>
		
					<div class="col-md-3">			
							<button id="btnUpload" name="btnUpload" class="btn btn-primary">Obtener Nombres de Columna</button>			
					</div>
				</div>
			</div>
		</form>		
	<?php endif;?>	
<?php else:?>
	<h2><?= $nombre ?> <small>Configuraci&oacute;n</small></h2> <a href="<?php echo URL ?>device/"> Regresar al listado </a>
	<hr>

	<div class='well'>
		<h4>Columnas del Dispositivo</h4>
		<?php 
			if(isset($msgColumns))
			
			$columnas = explode(',', $msgColumns);
					
			foreach ($columnas as $column)
			{			
				echo "<span class='btn btn-primary btn-xs' style='margin-top: 5px; margin-right: 5px;'>";
				echo $column;
				echo "</span>";
			}			
		?>
	</div>
		
	

	<div class="row">
		<div class="col-md-12 col-md-offset-10">
			<a href="<?php echo URL . 'deviceconfig/insertorupdater/' . $iddevice; ?>">
			     <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Fija</button>
			</a>
			
			<a href="<?php echo URL . 'deviceconfig/insertorupdatev/' . $iddevice; ?>">
			     <button type="button" class="btn btn-info" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Virtual</button>
			</a>
		</div>
		
	</div>
	<div class="row">	
		<div class="col-md-12">
			<div class="col-md-12">
				<table  class="table table-striped">
					<thead>
						<tr>					
							<th>Shortcut</th>
							<th>Nombre</th>
							<th>Definici&oacute;n</th>
							<th>Orden</th>
							<th>Acciones</th>						
						</tr>
					</thead>
					<?php foreach($lst as $row): ?>
					
					<tr>
						<td>C<?php echo $row['orden'];?></td>
						<td><?php echo $row['nombre'];?></td>			
						<td><?php echo $row['definicion'];?></td>
						<td>
							<a href="" class="btn btn-<?php echo ($row['virtual'] == '1' ? 'info' : 'primary');?> btn-xs" >
		 					      	<?php echo ($row['virtual'] == '1' ? 'Virtual' : 'Fija'); ?>
		 					</a>						 
		 				</td>
		 				<td>
		  					<a href="<?php echo URL . 'deviceconfig/insertorupdate' . ($row['virtual'] == '1' ? 'v' : 'r') . '/' . $iddevice . '/' . $row['id']; ?>" class="btn btn-warning btn-sm" >
		 					     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar 
		 					</a>						
		 					<a href="<?php echo URL . 'deviceconfig/confirmdestroy/'. $iddevice. "/" . $row['id']; ?>" class="btn btn-danger btn-sm" >
		 					     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Borrar 
		 					</a>
						</td>
					</tr>
					
					<?php endforeach;?>
				</table>
			</div>		
		</div>
	</div>
	
		
<?php endif;?>



