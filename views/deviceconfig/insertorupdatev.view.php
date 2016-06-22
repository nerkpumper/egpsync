<h2><?= $nombreDispositivo ?> <small>Configuraci&oacute;n</small></h2> <a href="<?php echo URL ?>device/"> Regresar al listado </a>
<hr>

<?php 
   $listaFunciones = "sin-Seno/".
     				 "cos-Coseno/".
     				 "tan-Tangente/".
     				 "sinh-Seno hiperb&oacute;lico/".
     				 "cosh-Coseno hiperb&oacute;lico/".
     				 "tanh-Tangente hiperb&oacute;lico/".
   					 "ln-Logaritmo natural/".
                     "log-Logaritmo/".
                     "abs-Valor absoluto/".
   					 "sec-Secante/".
   					 "csc-Cosecante/".
   					 "cot-Cotangente/".
   					 "sec-Secante hiperb&oacute;lico/".
   					 "csc-Cosecante hiperb&oacute;lico/".
   					 "cot-Cotangente hiperb&oacute;lico";
   
   
   $funciones = explode('/', $listaFunciones);
?>

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
	<?php $definicion=''; ?>
<?php endif;?>

<style>
	.mytokenfunc {
        margin-top: 10px;
    }
    
</style>

<?php if($id>0): ?>
<form class="form-horizontal" method="post" action="<?php echo URL.'deviceconfig/insertorupdatev/'.$iddevice.'/'.$id; ?>">
<?php else : ?>
<form class="form-horizontal" method="post" action="<?php echo URL.'deviceconfig/insertorupdatev/'.$iddevice; ?>">
<?php endif;?>
	<fieldset>

		<div class="row">			
			<div class="col-md-6" style="vertical-align: middle;">
				<h4>&nbsp;</h4>
				<hr>
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
						<label class="col-md-2 control-label" for="txtDefinicion">Definici&oacute;n</label>
						<div class="col-md-10">
							<input value="<?php echo $definicion; ?>" id="txtDefinicion" name="txtDefinicion" type="text" placeholder="Definici&oacute;n de la columna" class="form-control input-md" required>	
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
					<h4>Constantes Disponibles</h4>
						<a id="tokene" href="#" class="mytokenfunc btn btn-info btn-xs" 
							   onclick="addToken('e');">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;e
						</a>
						<a id="tokenpi" href="#" class="mytokenfunc btn btn-info btn-xs" 
							   onclick="addToken('PI');">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;PI
						</a>
					<hr>
					<h4>Funciones Disponibles</h4>			
					
						<?php foreach ($funciones as $funcion):?>					
						<?php 
							$funcdupla = explode('-', $funcion);
							$func = $funcdupla[0];
							$funcname = $funcdupla[1];
						?>
							<a id="token<?php echo $func;?>" href="#" class="mytokenfunc btn btn-success btn-xs" 
							   onclick="addToken('<?php echo $func;?>( )');">
								<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;<?php echo $funcname;?>
							</a>
						<?php endforeach;?>
						
					<hr>
					<h4>Columnas Disponibles</h4>
					
					<table  class="table table-striped table-bordered">
						<thead>
							<tr>				
								<th></th>
								<th>Shortcut</th>	
								<th>Nombre</th>
								<th>Definici&oacute;n</th>													
							</tr>
						</thead>
						<?php foreach($lst as $row): ?>
					
						<tr>
							<td>
								<a id="token<?php echo 'C'.$row['orden'];?>" href="#" class="mytoken btn btn-primary btn-xs" onclick="addToken('<?php echo 'C'.$row['orden'];?>');">
								    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;Agregar
								</a>
							</td>
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

<script type="text/javascript">
   function addToken(token)
   {
	   var def = document.getElementById("txtDefinicion");   // Get the element with id="demo"
	   def.value = def.value + token;	   
   }   
</script>