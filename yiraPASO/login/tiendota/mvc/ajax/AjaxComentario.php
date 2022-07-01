<?php

class BSAjaxComentarios{

    public $ratingProducto;
    public $comentarioProducto;
    public $empresaProducto;
    public $idProducto;
    public $idUsuarioProducto;

    public function BSajaxCrearComentario(){

        $tabla = "tv_productos_comentarios";

        $datos = array(
            "id_producto"=>$this->idProducto,
            "id_cliente"=>$this->idUsuarioProducto,
            "comentario"=>$this->comentarioProducto,
            "puntos"=>$this->ratingProducto
        );

        $verificarComentario = BigShopProductos::BSVerficarComentario($this->idProducto, $this->idUsuarioProducto);

        $datosConsulta = array(
            "id_empresa"=>$this->empresaProducto,
            "id_producto"=>$this->idProducto
        );

        $puntuacionInfo = BigShopProductos::BSObtenerPuntuacionProducto($datosConsulta);

        if($verificarComentario == "false"){
            if($puntuacionInfo["comentarios"]==0){
             $datosUpdate = array(
                "id_empresa"=>$this->empresaProducto,
                "id_producto"=>$this->idProducto,
                "puntos"=>$this->ratingProducto,
                "comentarios"=>1
             );
             
             $actualizarPuntaje = BigShopProductos::BSModificarPuntuacionProducto($datosUpdate);
            }else{
                $comentariosAux = $puntuacionInfo["comentarios"];
                $puntuacionAux = ($puntuacionInfo["puntos"] * $comentariosAux) + $this->ratingProducto;
                $comentariosCalc = $comentariosAux + 1;
                $puntuacionEdit = round($puntuacionAux / $comentariosCalc);

                $datosUpdate = array(
                    "id_empresa" =>$this->empresaProducto,
                    "id_producto"=>$this->idProducto,
                    "puntos"=>$puntuacionEdit,
                    "comentarios"=>$comentariosCalc
                );

                $actualizarPuntaje = BigShopProductos::BSModificarPuntuacionProducto($datosUpdate);
            }

            $comentar = BigShopProductos::BSGuardarComentarioProducto($tabla, $datos);
        }else{

            $comentariosAux = $puntuacionInfo["comentarios"];
            $puntuacionAux = ($puntuacionInfo["puntos"] *  $comentariosAux) - $puntuacionInfo["puntos"] + $this-> ratingProducto;
            $comentariosCalc = $comentariosAux;
            $puntuacionEdit = round($puntuacionAux / $comentariosCalc);

            $datosUpdate = array(
                "id_empresa" => $this->empresaProducto,
                "id_producto" => $this->idProducto,
                "puntos" => $puntuacionEdit,
                "comentario"=>$comentariosCalc
            );

            $actualizarPuntaje = BigShopProductos::BSModificarPuntuacionProducto($datosUpdate);

            $comentar = BigShopProductos::BSUpdateComentarioProducto($datos);
        }

        if($comentar == "ok"){
            echo json_encode($comentar);
        }
    }
}

if (isset($_POST["rating"])) {
	$comentario = new BSAjaxComentarios();
	$comentario -> ratingProducto = $_POST["rating"];
	$comentario -> comentarioProducto = $_POST["comentario"];
    $comentario -> empresaProducto = $_POST["empresa"];
    $comentario -> idProducto = $_POST["producto"];
    $comentario -> idUsuarioProducto = $_POST["usuario"];
	$comentario -> BSajaxCrearComentario();
}

?>