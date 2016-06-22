<a href="<?php echo URL ?>device/insertorupdate/">
     <button type="button" class="btn btn-primary" >Nuevo Dispositivo</button>
</a>

<div class="row">	
	<div class="col-md-12">
		<table  class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Acciones</th>						
				</tr>
			</thead>
			<?php foreach($lst as $row): ?>
			
			<tr>
				<td><?php echo $row['id']; ?></td>			
				<td><?php echo $row['nombre']; ?></td>
				<td>
					<a href="<?php echo URL ?>device/insertorupdate/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" >
					     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar
					</a>			
					<a href="<?php echo URL ?>device/details/<?php echo $row['id']; ?>" class="btn btn-info btn-sm" >
					     <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;Ver
					</a>
					<a href="<?php echo URL ?>device/confirmdestroy/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" >
					     <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Borrar
					</a>
					<a href="<?php echo URL ?>deviceconfig/config/<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" >
					     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;Configurar
					</a>
					<a href="<?php echo URL ?>devicefiles/uploadfile/<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" >
					     <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp;Archivos
					</a>
					
				</td>
			</tr>
			
			<?php endforeach;?>
		</table>
	</div>
</div>