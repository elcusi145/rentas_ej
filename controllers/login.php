<?php
	include_once '../models/sucursal.php';
	require_once '../vendor/autoload.php';
	session_start();

	
	class Login {
		
		function mostrar(){
			$loader = new Twig_Loader_Filesystem('../views');
			$twig = new Twig_Environment($loader);

			$display = "display:none";
			echo $twig->render('login.html', compact('display'));
		}

		function home(){
			$loader = new Twig_Loader_Filesystem('../views');
			$twig = new Twig_Environment($loader);

			$nombre = $_SESSION['nombre'];
			$cuil = $_SESSION['cuil'];

			echo $twig->render('home.html',compact('nombre','cuil'));
		}

		function sesion(){
			if(isset($_SESSION['id_persona'])){
				$this->home();
				
			}else{
				$this->mostrar();
			}
		
		}

		function iniciar($usuario, $pass){
			require_once '../vendor/autoload.php';
			$loader = new Twig_Loader_Filesystem('../views');
			$twig = new Twig_Environment($loader);


			$sucu = new Sucursal_model();
			$resultado = $sucu->buscar_usuario($usuario,$pass);
			$persona = $sucu->persona($usuario);

			if ( $resultado != false) {

				$_SESSION['id_persona'] = $resultado[0]['id_persona'];
				$_SESSION['nombre'] = $persona[0]['apellido']." ".$persona[0]['nombre'];
				$_SESSION['cuil'] = $persona[0]['cuil']; 

				$nombre = $persona[0]['apellido']." ".$persona[0]['nombre'];
				$cuil = $persona[0]['cuil'];

				echo $twig->render('home.html',compact('nombre','cuil'));
			
			}else{
				$error = "Usuario o contraseña incorrecto";

				echo $twig->render('login.html',compact('error'));
			}			
		}
		function logout(){
			session_destroy();
			$this->mostrar();
		} 
	}


?>