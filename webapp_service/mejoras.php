<?php 
$v = (isset($_GET['v']))?htmlspecialchars($_GET['v'], ENT_QUOTES, 'UTF-8'):'0';
?>
<div class="textoMensaje">Cambios de la versión <?php echo $v;?>

	<?php 
	switch ($v) {
		case '1':
			?>
			<ul>
				<li>Cambios en la interfaz</li>
				<li>Cambios en la funcionalidad</li>
			</ul>
			<p class="aviso">Favor de reiniciar la aplicación</p>
			<?php
			break;
		case '2':
			?>
			<ul>
				<li>Nuevas ligas de productos</li>
				<li>Funcionalidades agregadas</li>
			</ul>
			<p class="aviso">Favor de reiniciar la aplicación</p>
			<?php
			break;
		
		default:
			# code...
			break;
	};

	?>
</div>