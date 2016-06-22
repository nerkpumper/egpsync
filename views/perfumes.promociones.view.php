
<div class="row">
	<div class="col s12 m12">
		<div class="card-panel ">
			<div class="row">
				<div class="col s10">
					<h5>
						<strong>Productos en Promoci&oacute;n</strong>
					</h5>
				</div>
				<div class="co s2">
					<a href="<?php echo URL;?>Perfumes/addpromocion"
						class="modal-trigger btn-floating right btn-medium waves-effect waves-light pink accent-1"><i
						class="material-icons">playlist_add</i></a>
				</div>
			</div>
			<div class="divider" style="margin-top: -20px; margin-bottom: 5px"></div>
			<table id="tblSeachPerfumes">
				<thead>
					<tr>
						<th data-field="codigo">C&oacute;digo</th>
						<th data-field="nombre">Marca</th>
						<th data-field="nombre">Nombre</th>
						<th data-field="descripcion">Descripci&oacute;n</th>
						<th data-field="fechainicio">Inicio</th>
						<th data-field="fechafin">Fin</th>
						<th data-field="precio">Precio</th>
						<th data-field="estatus">Estatus</th>
						<th data-field="accion">Acciones</th>
					</tr>
				</thead>
				<tbody>
		<?php foreach ($lst as $row):?>
			<tr>
						<td><?php echo $row["codigo"]?></td>
						<td><?php echo $row["marca"]?></td>
						<td><?php echo $row["nombre"]?></td>
						<td><?php echo $row["descripcion"]?></td>
						<td><?php echo $row["fechainicio"]?></td>
						<td><?php echo $row["fechafin"]?></td>
						<td>
							
							$<?php echo $row["precio"]?>
							
						</td>
						<td>
							<div  class=" <?php echo ($row["estatus"] == 'ACTIVA' ? "green" : "red");?> white-text">
								<?php echo $row["estatus"]?>
							</div>
						</td>
						<td>
						<a href="<?php echo URL;?>Perfumes/setdatepromocion/<?php echo $row["idproducto"];?>"
							class="btn-floating btn waves-effect waves-light blue darken-3"><i
								class="material-icons">mode_edit</i></a>
								
						<a href="<?php echo URL;?>Perfumes/setdatepromocion/<?php echo $row["id"];?>"
							class="btn-floating btn waves-effect waves-light blue darken-3"><i
								class="material-icons">delete</i></a></td>
								
						</td>
								
						
					</tr>			
		
		<?php endforeach;?>
				
		
		
		</div>
	</div>
</div>


</fieldset>
</form>