<?php

class ModeloCompraVentaProductos {

    /*===================================================================
	=            ------------ MOSTRAR PRODUCTOS ------------            =
	===================================================================*/
	
	static public function mdlMostrarProductosCV($tabla, $item, $valor, $empresa){

		if ($item != NULL) {
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();

		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_empresa = :id_empresa");
			$stmt -> bindParam(":id_empresa", $empresa, PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();
		$stmt = NULL;
	}
	
	/*=====  End of ------------ MOSTRAR PRODUCTOS ------------  ======*/
}

?> 