<?php

class ControladorFacturacion{

	/*====================================================================
	=            MOSTRAR INFORMACION DE TIMBRES DE LA EMPRESA            =
	====================================================================*/
	
	static public function ctrMostrarTimbresEmpresa($item, $valor){

		$tabla = "modulo_facturas_compras";
		$empresa = $_SESSION["idEmpresa_dashboard"];

		$respuesta = ModeloFacturacion::mdlMostrarTimbresEmpresa($tabla, $item, $valor, $empresa);

		return $respuesta;
	}
	 
	/*=====  End of MOSTRAR INFORMACION DE TIMBRES DE LA EMPRESA  ======*/

	/*===========================================================
	=            CREAR REGISTRO DE COMPRA DE TIMBRES            =
	===========================================================*/
	
	static public function ctrCrearRegistroCompraTimbres($datos){

		$tabla = "modulo_facturas_compras";

		$respuesta = ModeloFacturacion::mdlCrearRegistroCompraTimbres($tabla,$datos);

		return $respuesta;
	}
	
	/*=====  End of CREAR REGISTRO DE COMPRA DE TIMBRES  ======*/
	
	/*============================================================
	=            EDITAR REGISTRO DE COMPRA DE TIMBRES            =
	============================================================*/
	
	static public function ctrEditarRegistroCompraTimbres($datos){

		$tabla = "modulo_facturas_compras";

		$respuesta = ModeloFacturacion::mdlEditarRegistroCompraTimbres($tabla, $datos);

		return $respuesta;
	}
	
	/*=====  End of EDITAR REGISTRO DE COMPRA DE TIMBRES  ======*/
	

	/*============================================================
	=            MOSTRAR CONFIGURACION DE FACTURACION            =
	============================================================*/
	
	static public function ctrMostrarConfiguracionFacturacion($item, $valor){

		$tabla = "modulo_facturas_configuracion";
		$empresa = $_SESSION["idEmpresa_dashboard"];

		$respuesta = ModeloFacturacion::mdlMostrarConfiguracion($tabla, $item, $valor, $empresa);

		return $respuesta;
	}
	
	/*=====  End of MOSTRAR CONFIGURACION DE FACTURACION  ======*/
	
	/*===================================================================
	=            MOSTRAR SERIES DE CONFIGURACION DE FACTURAS            =
	===================================================================*/
	
	static public function ctrMostrarConfSeriesFacturacion($item, $valor){

		$tabla = "modulo_facturas_series";
		$empresa = $_SESSION["idEmpresa_dashboard"];

		$respuesta = ModeloFacturacion::mdlMostrarConfSeriesFacturacion($tabla, $item, $valor, $empresa);

		return $respuesta;
	}
	
	/*=====  End of MOSTRAR SERIES DE CONFIGURACION DE FACTURAS  ======*/

	/*===============================================================
	=            MOSTRAR LISTADO DE PRECIOS DE TIMBRADOS            =
	===============================================================*/
	
	static public function ctrMostrarListadoPreciosTimbrados($item, $valor){

		$tabla = "modulo_facturas_precios_timbres";

		$respuesta = ModeloFacturacion::mdlMostrarListadoPreciosTimbrados($tabla, $item, $valor);

		return $respuesta;
	}
	
	/*=====  End of MOSTRAR LISTADO DE PRECIOS DE TIMBRADOS  ======*/
	
	
	/*=================================================================
	=            MOSTRAR FACTURAS REALIZADAS DE LA EMPRESA            =
	=================================================================*/
	
	static public function ctrMostrarFacturasRealizadas($item, $valor){

		$tabla = "modulo_facturas";
		$empresa = $_SESSION["idEmpresa_dashboard"];

		$respuesta = ModeloFacturacion::mdlMostrarFacturasRealizadas($tabla, $item, $valor, $empresa);

		return $respuesta;
		
	}
	
	/*=====  End of MOSTRAR FACTURAS REALIZADAS DE LA EMPRESA  ======*/
	

	/*===========================================================
	=                   MOSTRAR RFC GUARDADOS                   =
	===========================================================*/
	static public function ctrMostrarFacturasDatos ($item, $valor){

		$tabla = "modulo_facturas_datos";
		$empresa = $_SESSION["idEmpresa_dashboard"];

		$respuesta = ModeloFacturacion::mdlMostrarInfoFacturacionCliente($tabla, $item, $valor, $empresa);

		return $respuesta;
	}

	
	
	/*============  End of MOSTRAR RFC GUARDADOS  =============*/
}

?>