<?php
	include 'login.php';
	include 'home.php';
	include 'sucursal.php';
	include 'nuevo.php';
	include 'modificar.php';


	if(isset($_GET['login']) ){
		$login = new Login();
		$login->sesion();
		return;
	}
	if(isset($_GET['home']) && isset($_SESSION['id_persona'])){
		$home = new Home();
		$home->mostrar();
		return;
		
	}

	if(isset($_GET['ingresar']) && !empty($_POST['usuario']) && !empty($_POST['pass'])){
		$login = new Login();
		$login->iniciar($_POST['usuario'], $_POST['pass']);
		return;
	}

	if(isset($_GET['sucursales']) && isset($_SESSION['id_persona'])){
		$sucu = new Sucursal();
		$sucu->mostrar();
		return;
	}

	if(isset($_GET['nuevo']) && isset($_SESSION['id_persona'])){
		$nuevo = new Nuevo();
		$nuevo->mostrar();
		return;
	}

	if(isset($_GET['eliminar']) && isset($_POST['sucursal']) && isset($_SESSION['id_persona'])){
		$sucu = new Sucursal();
		$sucu->eliminar($_POST['sucursal']);
		$sucu->mostrar();
		return;
	}

	if(isset($_GET['agregar']) && isset($_POST['direccion']) && isset($_POST['fecha']) && isset($_POST['tipo']) && isset($_SESSION['id_persona'])){
		$sucu = new Sucursal();
		$sucu->agregar($_SESSION['id_persona'],$_POST['direccion'],$_POST['fecha'],$_POST['tipo']); 
		$sucu->mostrar();
		return;
	}

	if(isset($_GET['modificar']) && isset($_POST['sucursal']) && isset($_SESSION['id_persona'])){
		$mod = new Modificar();
		$mod->mostrar($_POST['sucursal']);
		return;
	}

	if(isset($_GET['guardar']) && isset($_POST['sucursal']) && isset($_POST['direccion']) && isset($_POST['tipo']) && isset($_SESSION['id_persona'])){
		$mod = new Modificar();
		$mod->modificar_($_POST['sucursal'],$_POST['direccion'],$_POST['tipo']);
		return;
	}

	if(isset($_GET['salir']) && isset($_SESSION['id_persona'])){
		$login = new Login();
		$login->logout();
		return;
	}


	if(isset($_GET) ){
		$login = new Login();
		$login->sesion();
		return;
	}else{
		$login = new Login();
		$login->sesion();
		return;
	}
?>