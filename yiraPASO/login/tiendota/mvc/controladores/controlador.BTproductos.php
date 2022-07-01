<?php

class BTProductos{


    static public function BSProductosLimitados(){
        $response = BigShopProductos::BSMostrarProductosLimit();
        return $response;
    }

    static public function BSgetEmpresaProductos($idEmpresa){
        $response = BigShopProductos::BSgetEmpresaProductos($idEmpresa);
        return $response;
    }

    static public function BSgetProductoPrecio($codigo){
        $response = BigShopProductos::BSgetProductoPrecio($codigo);
        return $response;
    }

    static public function BSgetProductoDescripcion($idProducto){
        $response = BigShopProductos::BSgetProductoDescripcion($idProducto);
        return $response;
    }

    static public function BSMostrarComentariosProducto($id_producto){
        $response = BigShopProductos::BSMostrarComentariosProducto($id_producto);
        return $response;
    }

    static public function BSProductosBuscados($dato, $empresa){
        $response = BigShopProductos::BSProductosBuscados($dato, $empresa);
        return $response;
    }

    static public function BSMostrarFavoritos($datos){

        $tabla ="tv_productos_favoritos";

        $response = BigShopProductos::BSProductoFavorito($tabla, $datos);
        return $response;
    }

    static public function BSSaveComentario(){
        if(isset($_POST["ComentarioProducto"])){

            $tabla = "tv_productos_comentarios";

            $datos = array("id_producto" => $_POST["IdProductoComentario"], "id_cliente" => $_SESSION["id"], "comentario" =>["ComentarioProducto"], "puntos" => $_POST["ValoraProducto"]);

            $response = BigShopProductos::BSSaveComentario($tabla, $datos);

            if($respuesta == 'ok'){
                
            }
        }
    }

    static public function BSComentariosPaginados($producto, $inferior){
        $response = BigShopProductos::BSComentariosPaginados($producto, $inferior);
        return $response;
    }

}