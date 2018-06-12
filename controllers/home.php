<?php
	class Home {
		
		function mostrar(){
			require_once '../vendor/autoload.php';
			$loader = new Twig_Loader_Filesystem('../views');
			$twig = new Twig_Environment($loader);

			$nombre = $_SESSION['nombre'];
			$cuil = $_SESSION['cuil'];

			echo $twig->render('home.html',compact('nombre','cuil'));
		}
	}

?>