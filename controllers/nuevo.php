<?php
	include_once '../models/sucursal.php';

	class Nuevo {
		
		function mostrar(){

			require_once '../vendor/autoload.php';
			$loader = new Twig_Loader_Filesystem('../views');
			$twig = new Twig_Environment($loader);

			$titulo = "Agregar sucursal";
			$nombre = $_SESSION['nombre'];
			$cuil = $_SESSION['cuil'];

			$sucu = new Sucursal_model();
			$activar = "";
			if($sucu->central($_SESSION['id_persona']) != false){
				$activar = "disabled";
			}
			$select0 = "selected";
			
			date_default_timezone_set('America/Argentina/Catamarca');
        	$fecha['year']=date("Y");
        	$fecha['mon']=date("m");
        	$fecha['mday']=date("d");


			echo $twig->render('nuevo.html', compact('fecha','activar','select0','titulo','nombre','cuil'));
		}
	}

?>