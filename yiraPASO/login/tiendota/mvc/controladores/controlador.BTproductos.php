<?php

class BTProductos{


    static public function BTProductosLimitados(){
        $response = BigShopProductos::BTMostrarProductosLimit();
        return $response;
    }

    static public function BTgetProductosCategoria($id_categoria){
        $response = BigShopProductos::BTgetProductoCategoria();
        return $response;
    }

    static public function BTgetEmpresaProductos($idEmpresa){
        $response = BigShopProductos::BTgetEmpresaProductos($idEmpresa);
        return $response;
    }

    static public function BTgetProductoPrecio($codigo){
        $response = BigShopProductos::BTgetProductoPrecio($codigo);
        return $response;
    }

    static public function BTgetProductoDescripcion($idProducto){
        $response = BigShopProductos::BTgetProductoDescripcion($idProducto);
        return $response;
    }

    static public function BTMostrarComentariosProducto($id_producto){
        $response = BigShopProductos::BTMostrarComentariosProducto($id_producto);
        return $response;
    }

    static public function BTProductosBuscados($dato, $empresa){
        $response = BigShopProductos::BTProductosBuscados($dato, $empresa);
        return $response;
    }

    static public function BTSaveComentario(){
        if(isset($_POST["ComentarioProducto"])){

            $tabla = "tv_productos_comentarios";

            $datos = array("id_producto" => $_POST["IdProductoComentario"], "id_cliente" => $_SESSION["id"], "comentario" =>["ComentarioProducto"], "puntos" => $_POST["ValoraProducto"]);

            $response = BigShopProductos::BTSaveComentario($tabla, $datos);

            if($respuesta == 'ok'){
                
            }
        }
        
        
    }

}