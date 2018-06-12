<?php
	include_once '../models/sucursal.php';

	class Sucursal{
		
		function mostrar(){
			require_once '../vendor/autoload.php';

			$loader = new Twig_Loader_Filesystem('../views');

			$twig = new Twig_Environment($loader);

			$nombre = $_SESSION['nombre'];
			$cuil = $_SESSION['cuil'];

			$sucursal = new Sucursal_model();
			$sucursales = $sucursal->getall($_SESSION['id_persona']); 			

			echo $twig->render('sucursal.html', compact('sucursales','nombre','cuil'));
		}
		function eliminar($id){
			$sucu = new Sucursal_model();
			$sucu->delete($id);
		}
		function agregar($id_persona, $dir, $fecha, $tipo){
			$sucu = new Sucursal_model();
			$sucu->add($id_persona, $dir, $fecha, $tipo);
		}
		function modificar($id_persona, $dir, $tipo){
			$sucu = new Sucursal_model();
			$sucu->mod($id_persona, $dir, $tipo);
		}

	}

?>