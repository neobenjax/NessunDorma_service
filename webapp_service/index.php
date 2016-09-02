<?php
# Cross Domain
header('Access-Control-Allow-Origin: *'); 

$act = (isset($_GET['act']))?htmlspecialchars($_GET['act'], ENT_QUOTES, 'UTF-8'):'default';
$respuesta = array();
$version = 0;

$directorio = dirname($_SERVER["PHP_SELF"]);
$directorio =($directorio!='')?$directorio:'/';
$path = "http://$_SERVER[HTTP_HOST]";
$fullPath = $path.$directorio;
$fullPath = ($fullPath[strlen($fullPath)-1]=='/')?$fullPath:$fullPath.'/';

switch ($act) {
	case 'getVersion':
		$respuesta['codigo'] = 1;
		$respuesta['mensaje'] = "acceso a versión";
		//$respuesta['version'] = 0;
		$respuesta['version'] = $version;
		break;
	case 'getChanges':
		$css = trim(preg_replace('/\s+/', ' ', file_get_contents('css.css')));
		$js = trim(preg_replace('/\s+/', ' ', file_get_contents('js.js')));
		$mensaje = file_get_contents($fullPath.'mejoras.php?v='.$version);

		$respuesta['codigo'] = 1;
		$respuesta['mensaje'] = $mensaje;
		$respuesta['css'] = (strlen($css)>0) ? $css:' ';
		$respuesta['js'] = (strlen($js)>0) ? $js:'//';
		$respuesta['version'] = $version;
		break;
	default:
		$respuesta['codigo'] = 0;
		$respuesta['mensaje'] = "Acceso Restringido";
		break;
}

print json_encode($respuesta);
?>