<?php

class ModeloBazar{

	/*========================================================
	=            MOSTRAR CATEGORIAS DEL BAZAR            =
	========================================================*/
	
	static public function mdlMostrarBazarCategorias($tabla, $item, $valor){

		if ($item != NULL) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = NULL;

		}
	}
	
	/*=====  End of MOSTRAR CATEGORIAS DEL BAZAR   ======*/

	/*===============================================================
	=            MOSTRAR SUBCATEGORIAS DE LAS CATEGORIAS            =
	===============================================================*/
	
	static public function mdlMostrarBazarSubCategorias($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	
	/*=====  End of MOSTRAR SUBCATEGORIAS DE LAS CATEGORIAS  ======*/

	/*===================================================
	=     CREAR REGISTRO  DE EMPRESA PARA BAZAR        =
	===================================================*/
	static public function modeloCrearEmpresaBazar($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_registro, id_empresa, estado, fecha_registro, id_categoria) VALUES (:id_resgistro, :id_empresa, :estado, :fecha_registro, :id_categoria)");
		$stmt -> bindParam(":id_resgistro", $datos["id_resgistro"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		

		if ($stmt -> execute()) {
			return 'ok';
		}

		$stmt -> close();
		$stmt = NULL;
	}
	
	
	/*============  End of CREAR EMPRESA  =============*/


	/*========================================================
	=            MOSTRAR ESTADOS            =
	========================================================*/
	
	static public function mdlMostrarEstados($tabla, $item, $valor){

		if ($item != NULL) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = NULL;

		}
	}
	
	/*=====  End of MOSTRAR ESTADOS   ======*/

	/*===============================================================
	=            MOSTRAR MUNICIPIOS DE LOS ESTADOS            =
	===============================================================*/
	
	static public function mdlMostrarMunicipios($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt->fetchAll();

		$stmt -> close();
		$stmt = null;

	}
	
	/*=====  End of MOSTRAR MUNICIPIOS DE LOS ESTADOS  ======*/


}
 
?>