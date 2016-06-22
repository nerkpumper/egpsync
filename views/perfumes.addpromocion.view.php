<div class="row">
	<form class="col s12">
		<div class="row">
			<div class="input-field col s3 ">
				<input id="txtCodigo" type="text" class="validate "> <label
					for="txtCodigo">C&oacute;digo</label>
			</div>
			<div class="input-field col s8 ">
				<input id="txtNombre" type="text" class="validate "> <label
					for="txtNombre">Nombre</label>
			</div>
			<div class="input-field col s1 ">
				<a class="waves-effect waves-light btn blue darken-1"><i
					class="material-icons left">search</i></a>
			</div>
		</div>
	</form>
</div>

<div class="row">
	<div class="col s12">
		<table id="tblSeachPerfumes">
			<thead>
				<tr>
					<th data-field="codigo">C&oacute;digo</th>
					<th data-field="nombre">Nombre</th>
					<th data-field="descripcion">Descripci&oacute;n</th>
					<th data-field="accion">Agregar</th>
				</tr>
			</thead>
			<tbody>
		<?php foreach ($lst as $row):?>
			<tr>
					<td><?php echo $row["codigo"]?></td>
					<td><?php echo $row["nombre"]?></td>
					<td><?php echo $row["descripcion"]?></td>
					<td><a href="<?php echo URL;?>Perfumes/setdatepromocion/<?php echo $row["id"];?>" class="btn-floating btn waves-effect waves-light"><i class="material-icons">add</i></a></td>
				</tr>			
		
		<?php endforeach;?>

	</tbody>
		</table>

	</div>
</div>





