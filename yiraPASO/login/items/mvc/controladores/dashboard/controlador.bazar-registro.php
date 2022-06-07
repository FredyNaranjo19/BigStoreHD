<?php

class ControladorBazar{

	/*========================================================
	=            MOSTRAR CATEGORIAS DEL BAZAR            =
	========================================================*/
	
	static public function ctrMostrarBazarCategorias($item, $valor){ 

		$tabla = "bazar_categorias";
		$empresa = $_SESSION["idEmpresa_dashboard"];

		$respuesta = ModeloBazar::mdlMostrarBazarCategorias($tabla, $item, $valor);

		return $respuesta;

	}
	
	/*=====  End of MOSTRAR CATEGORIAS DEL BAZAR   ======*/
	
	/*=============================================================
	=            MOSTRAR SUBCATEGORIAS DE LA CATEGORIA            =
	=============================================================*/
	
	static public function ctrMostrarBazarSubCategorias($item, $valor){

		$tabla = "bazar_subcategorias"; 

		$respuesta = ModeloBazar::mdlMostrarBazarSubCategorias($tabla, $item, $valor);

		return $respuesta;

	}
	
	/*=====  End of MOSTRAR SUBCATEGORIAS DE LA CATEGORIA  ======*/

	/*========================================================
	=                 MOSTRAR ESTADDOS                     =
	========================================================*/
	
	static public function ctrMostrarEstados($item, $valor){ 

		$tabla = "estados";

		$respuesta = ModeloBazar::mdlMostrarEstados($tabla, $item, $valor);

		return $respuesta;

	}
	
	/*=====            End of MOSTRAR ESTADDOS        ======*/
	
	/*=============================================================
	=            MOSTRAR MUNICIPIOS DE LOS ESTADOS            =
	=============================================================*/
	
	static public function ctrMostrarMinicipios($item, $valor){

		$tabla = "municipios"; 

		$respuesta = ModeloBazar::mdlMostrarMunicipios($tabla, $item, $valor);

		return $respuesta;

	}
	
	/*=====  End of MOSTRAR MUNICIPIOS DE LOS ESTADOS  ======*/

	


}

?>