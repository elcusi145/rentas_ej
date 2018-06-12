<?php
	include_once '../controllers/conexion.php';

	class Sucursal_model{
		function getall($user){
			$conexion = new CONEXION();
			$resultado = $conexion->select("SELECT * FROM sucursal WHERE id_persona='$user'");
			return $resultado;
		}
		function delete($id){
			$conexion = new CONEXION();
			$resultado = $conexion->query("DELETE FROM sucursal WHERE id_sucursal='$id'");
		}

		function add($id_persona, $dir, $fecha, $tipo){
			$conexion = new CONEXION();
			$resultado = $conexion->query("INSERT INTO sucursal (id_persona, domicilio, alta, tipo) VALUES ('$id_persona','$dir','$fecha','$tipo')");
		}

		function central($id_persona){
			$conexion = new CONEXION();
			$resultado = $conexion->select("SELECT * FROM sucursal WHERE id_persona='$id_persona' AND tipo=1");
			return $resultado;
		}

		function buscar_usuario($usuario,$pass){
			$conexion = new CONEXION();
			$resultado = $conexion->select("
			SELECT * FROM usuario WHERE usuario = '$usuario' AND pass = '$pass' LIMIT 1");
			return $resultado;
		}

		function datos($id){
			$conexion = new CONEXION();
			$resultado = $conexion->select("
			SELECT * FROM sucursal WHERE id_sucursal = $id LIMIT 1");
			return $resultado;
		}

		function is_central($id){
			$conexion = new CONEXION();
			$resultado = $conexion->select("
			SELECT * FROM sucursal WHERE id_sucursal = $id AND tipo=1 LIMIT 1");
			return $resultado;
		}

		function persona($id){
			$conexion = new CONEXION();
			$resultado = $conexion->select("
			SELECT * FROM personas, usuario WHERE usuario.id_persona = personas.id_persona AND usuario.usuario = '$id' LIMIT 1");
			return $resultado;
		}
		function mod($id,$dir,$tipo){
			$conexion = new CONEXION();
			$resultado = $conexion->query("
				UPDATE sucursal SET domicilio = '$dir', tipo = '$tipo' WHERE id_sucursal = '$id'");
		}
	}

?>