<?php

class ProductosAjaxBS{

    public $FavoritoIdProducto;
    public $FavoritoIdCliente;

    public function ajaxProductoFavoritoBS(){

        $tabla = "tv_productos_favoritos";

        $datos = array("id_producto" => $this -> FavoritoIdProducto, "id_cliente" => $this -> FavoritoIdCliente);

    $consulta = BigShopProductos::BTProductoFavorito($tabla, $datos);
    
    if($consulta == false){

        $response = BigShopProductos::BTProductoFavorito($tabla, $datos);
    }else{
        $response = BigShopProductos::BTEliminarProductoFavorito($tabla, $datos);
    }

    echo json_encode($response);
    }
}

if(isset($_POST["FavoritoIdProducto"])){

    $favoritos = new ProductosAjaxBS();
    $favoritos -> FavoritosIdProducto = $_POST["FavoritoIdProducto"];
    $favoritos -> FavoritoIdCliente = $_POST["FavoritoIdCliente"];
    $favoritos -> ajaxProductoFavoritoBS();
}

?>