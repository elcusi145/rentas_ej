<?php
	include_once '../models/sucursal.php';
	include_once 'sucursal.php';

	class Modificar {
		
		function mostrar($id){

			require_once '../vendor/autoload.php';
			$loader = new Twig_Loader_Filesystem('../views');
			$twig = new Twig_Environment($loader);
			$titulo = "Modificar sucursal";

			$nombre = $_SESSION['nombre'];
			$cuil = $_SESSION['cuil'];

			$sucursal = $id;

			$sucu = new Sucursal_model();
			
			$data = $sucu->datos($id);

			$activar = "";
			if($sucu->central($_SESSION['id_persona']) != false){
				if($sucu->is_central($id) != false){
					$select1 = "selected";
					echo $twig->render('modificar.html', compact('data','activar','select1','titulo','nombre','cuil','sucursal'));
				}else{
					$activar = "disabled";
					$select0 = "selected";
					echo $twig->render('modificar.html', compact('data','activar','select0','titulo','nombre','cuil','sucursal'));
				}
				
			}else{
				$select1 = "selected";
				echo $twig->render('modificar.html', compact('data','activar','select1','titulo','nombre','cuil','sucursal'));
			}
		}
		function modificar_ ($id,$dir,$tipo) {
			$sucu = new Sucursal_model();
			$sucu->mod($id,$dir,$tipo);
			$vent = new Sucursal();
			$vent->mostrar();

		}
	}

?>