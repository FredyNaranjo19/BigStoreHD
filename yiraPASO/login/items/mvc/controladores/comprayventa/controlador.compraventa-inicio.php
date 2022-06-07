<?php

    class ControladorCompraVentaInicio{

    /*=========================================
	=            MOSTRAR PRODUCTOS            =
	=========================================*/
	
	static public function ctrMostrarProductosCV($item, $valor, $empresa){

		$tabla = "tv_productos";

		$respuesta = ModeloCompraVentaProductos::mdlMostrarProductosCV($tabla, $item, $valor, $empresa);

		return $respuesta; 

	}

	
	/*=====  End of MOSTRAR PRODUCTOS  ======*/
    }

?>