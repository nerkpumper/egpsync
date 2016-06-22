<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<title>Egp Sync</title>
	
	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
	<link rel="stylesheet" href="<?php echo URL; ?>assets/plugins/materialize/css/materialize.css">
	
	
	<script src="<?php echo URL; ?>assets/plugins/jquery/jquery-2.2.3.min.js"></script> 	
	<script src="<?php echo URL; ?>assets/plugins/materialize/js/materialize.js"></script>
	<script> var URL = "http://localhost:8080/egpsync/"; </script>
	
	
	
	<?php if (isset($__JAVASCRIPT)):?>
		<?= $__JAVASCRIPT; ?>
	<?php endif?>		
	
</head>
<body >

	
	<?php require 'partials/masterpage.nav.partials.php';?>
	
	 
	<div style="margin-left: 50px; margin-right: 50px">
		
		<div class="section">
			<h4><?= (isset($view_accion) ? $view_accion : 'Action' ) ?></h4>			
		</div>
		<div class="divider" style="margin-bottom: 10px"></div>	
		
		<?= $view_content ?>		
			
	</div>		

</body>
</html>