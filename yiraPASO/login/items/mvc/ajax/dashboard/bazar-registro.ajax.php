<?php
session_start();
require_once '../../modelos/conexion.php';
require_once '../../modelos/dashboard/modelo.bazar-registro.php';

class AjaxBazar{

	/*==========================================================
	=            MOSTRAR SUBCATEGORIAS DE CATEGORIA            =
	==========================================================*/
	
	public $idBazarCategoria;
	
	public function ajaxCambioCategoriaBazar(){

		$item = "id_categoria";
		$valor = $this -> idBazarCategoria;
		$tabla = "bazar_subcategorias";

		$respuesta = ModeloBazar::mdlMostrarBazarSubCategorias($tabla, $item, $valor);

		echo json_encode($respuesta);
	}
	
	/*=====  End of MOSTRAR SUBCATEGORIAS DE CATEGORIA  ======*/

	/*==========================================================
	=            MOSTRAR MUNICIPIOS DE LOS ESTADOS            =
	==========================================================*/
	
	public $idMunicipio;
	
	public function ajaxMunicipio(){

		$item = "estado_id";
		$valor = $this -> idMunicipio;
		$tabla = "municipios";

		$respuesta = ModeloBazar::mdlMostrarMunicipios($tabla, $item, $valor);

		echo json_encode($respuesta);
	}
	
	/*=====  End of MOSTRAR MUNICIPIOS DE LOS ESTADOS  ======*/
	
	/*==================================================
	=            AGREGAR EMPRESA A BAZAR             =
	==================================================*/
	
	public $idRegistroCrearEmpresaBazar;
	public $categoriaCrearEmpresaBazar;
	public $estadoCrearEmpresaBazar;
	public $fechaCrearEmpresaBazar;
	

	public function ajaxAgregarEmpresaBazar(){

		$tabla = "bazar_registro"; 
		$datos = array("id_empresa" => $_SESSION["idEmpresa_dashboard"],
						"estado" => $this -> estadoCrearEmpresaBazar,
						"id_registro" => $this -> idRegistroCrearEmpresaBazar,
						"fecha_registro" => $this -> fechaCrearEmpresaBazar,
						"id_categoria" => $this -> categoriaCrearEmpresaBazar);

		$respuesta = ModeloBazar::modeloCrearEmpresaBazar($tabla, $datos);

		// $respuestaIngresar = ModeloBazar::modeloCrearEmpresaBazar($tabla, $datos);

		// if ($respuestaIngresar == "ok") {

		// 	/* 	CONSULTA DE LISTADO Y CREACION DE LISTADO DE PRECIOS DEL PRODUCTO */

		// 	$tabla = "tv_productos_listado";
		// 	$datos = array("id_empresa" => $_SESSION["idEmpresa_dashboard"],
		// 					"codigo" => $this -> codigoCrearProductoTV);

		// 	$listado = ModeloProductosTienda::mdlMostrarListadoPrecioProductoTienda($tabla, $datos);

		// 	if ($listado == false) {
				
		// 		$tabla = "tv_productos_listado";
		// 		$promo = $this -> promoCrearProductoTV;
		// 		$activado = "no";

		// 		//if (floatval($this -> promoCrearProductoTV) < floatval($this -> precioCrearProductoTV)) {

		// 			//$promo = $this -> promoCrearProductoTV;
		// 			//$activado = "si";

		// 		//}

		// 		$datos = array("id_empresa" => $_SESSION["idEmpresa_dashboard"],
		// 						"codigo" => $this -> codigoCrearProductoTV,
		// 						"cantidad" => 1,
		// 						"precio" => $this -> precioCrearProductoTV,
		// 						"promo" => $promo,
		// 						"activadoPromo" => $activado);

		// 		$respuestaListado = ModeloProductosTienda::mdlCrearListadoProductoTienda($tabla, $datos);

		// 	}

		// 	/* MOSTRAR INFORMACION DE PRODUCTOS EN TIENDA */

		// 	$tabla = "tv_productos";
		// 	$item = NULL;
		// 	$valor = NULL;
		// 	$empresa = $_SESSION["idEmpresa_dashboard"];
		// 	$mostrar = ModeloProductosTienda::mdlMostrarProductosTienda($tabla, $item, $valor, $empresa);

		// 	$respuesta = array();
			
		// 	foreach ($mostrar as $key => $value) {

		// 		$tablaProducto = "productos";
		// 		$itemProducto = "id_producto";
		// 		$valorProducto = $value["id_producto"];

		// 		$producto = ModeloProductos::mdlMostrarProductos($tablaProducto, $itemProducto, $valorProducto, $empresa);
				
		// 		array_push($respuesta, array("id_tv_productos" => $value["id_tv_productos"],
		// 									"id_producto" => $producto["id_producto"],
		// 									"codigo" => $producto["codigo"],
		// 									"nombre" => $producto["nombre"],
		// 									"descripcion" => $producto["descripcion"]));
		// 	}
		// }

		echo json_encode($respuesta);

	}
	
	/*=====  End of AGREGAR EMPRESA A BAZAR   ======*/
		 
}

/*==========================================================
=            MOSTRAR SUBCATEGORIAS DE CATEGORIA            =
==========================================================*/

if (isset($_POST['idBazarCategoria'])) {
	$cambioSubcategoriaB = new AjaxBazar();
	$cambioSubcategoriaB -> idBazarCategoria = $_POST['idBazarCategoria'];
	$cambioSubcategoriaB -> ajaxCambioCategoriaBazar();
}

/*=====  End of MOSTRAR SUBCATEGORIAS DE CATEGORIA  ======*/
/*==========================================================
=            MOSTRAR MUNICIPIOS DE LOS ESTADOS            =
==========================================================*/

if (isset($_POST['idMunicipio'])) {
	$cambioMunicipio = new AjaxBazar();
	$cambioMunicipio -> idMunicipio = $_POST['idMunicipio'];
	$cambioMunicipio -> ajaxMunicipio();
}

/*=====  End of MOSTRAR MUNICIPIOS DE LOS ESTADOS  ======*/
/*=================================================
=            AGREGAR EMPRESA A BAZAR            =
=================================================*/

if (isset($_POST["idRegistroCrearEmpresaBazar"])) {
	$registrarEmpresa = new AjaxBazar();
	$registrarEmpresa -> idRegistroCrearEmpresaBazar = $_POST["idRegistroCrearEmpresaBazar"];
	$registrarEmpresa -> fechaCrearEmpresaBazar = $_POST["fechaCrearEmpresaBazar"];
	$registrarEmpresa -> estadoCrearEmpresaBazar = $_POST["estadoCrearEmpresaBazar"];
	$registrarEmpresa -> categoriaCrearEmpresaBazar = $_POST["categoriaCrearEmpresaBazar"];
	$registrarEmpresa -> ajaxAgregarEmpresaBazar();
}

/*=====  End of AGREGAR EMPRESA A BAZAR  ======*/


?>