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
	case 'loginAuth':
		$usuario = (isset($_GET['usuario']))?htmlspecialchars($_GET['usuario'], ENT_QUOTES, 'UTF-8'):'default';
		$password = (isset($_GET['password']))?htmlspecialchars($_GET['password'], ENT_QUOTES, 'UTF-8'):'default';
		$idtelefono = (isset($_GET['idtelefono']))?htmlspecialchars($_GET['idtelefono'], ENT_QUOTES, 'UTF-8'):'default';
		$tokenapp = (isset($_GET['tokenapp']))?htmlspecialchars($_GET['tokenapp'], ENT_QUOTES, 'UTF-8'):'default';

		if($usuario == 'pollo' && $password == 'buuu'){
			$respuesta['codigo'] = 1;
			$respuesta['idtelefono'] = $idtelefono;
			$respuesta['tokenapp'] = $tokenapp;
			$respuesta['primertoken'] = "asdsgfd";

		} else {
			$respuesta['codigo'] = 0;
		}

		break;
	case 'getToken':
		$respuesta['codigo'] = 1;
		$respuesta['token'] = "123456";
		break;
	default:
		$respuesta['codigo'] = 0;
		$respuesta['mensaje'] = "Acceso Restringido";
		break;
}

print json_encode($respuesta);
?>