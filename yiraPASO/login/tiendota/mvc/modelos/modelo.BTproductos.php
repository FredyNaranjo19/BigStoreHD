<?php 

class BigShopProductos{
    static public function BSMostrarProductosLimit(){

        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_productos.id_producto LIMIT 16");
        $conex -> execute();
        return $conex -> fetchAll();
        $conex ->close();
        $conex = NULL;
    }

    static public function BSMostraProductosAzar($tabla, $empresa, $noProductos){
        $conex = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_empresa = :id_empresa ORDER BY id_producto DESC LIMIT $noProductos");
        $conex -> bindParam(":id_empresa", $empresa, PDO::PARAM_STR);
        $conex -> execute();

        return $conex -> fetchAll();

        $conex -> close();
        $conex = NULL;
    }

    static public function BSMostrarProducto(){

        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_productos.id_producto WHERE tv_productos.id_producto = :id_producto");
        $conex -> execute();
        return $conex -> fetchAll();
        $conex ->close();
        $conex = NULL;
    }

    static public function BSgetEmpresaProductos($idEmpresa){
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_productos.id_producto WHERE tv_productos.id_empresa = :id_empresa");
        $conex -> bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex ->close();
        $conex = null;
    }

    static public function BSgetProductoPrecio($codigo){
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos_listado WHERE codigo = :codigo");
        $conex -> bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetch();
        $conex -> close();
        $conex = null;
    }

    static public function BSgetProductoDescripcion($idProducto){
        $conex = Conexion::conectar()->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
        $conex -> bindParam(":id_producto", $idProducto, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetch();
        $conex-> close();
        $conex = null;
    }

    static public function BScalifProducto($datos){
        $conex = Conexion::conectar()->prepare("SELECT puntos, comentario FROM productos WHERE id_producto = :id_producto AND id_empresa = :id_empresa");
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetch();
        $conex -> close();
        $conex = null;
    }

    static public function BSUpdatecalifProdu($datos){
        $conex = Conexion::conectar()->prepare("UPDATE productos SET puntos = :puntos, comentarios = :comentarios WHERE id_producto = :id_producto AND id_empresa =:id_empresa");
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":comentarios",$datos["comentarios"],PDO::PARAM_STR);
        $conex -> bindParam(":puntos",$datos["puntos"], PDO::PARAM_STR);

        if($conex -> execute()){ 
            return 'ok';    
        }    
        $conex -> close();
        $conex = null;
    }

    static public function BSProductoFavorito($tabla, $datos){
        if($datos["id_producto"] != NULL){
            $conex = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id_producto AND id_cliente = :id_cliente");
            $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
            $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
            $conex -> execute();
            return $conex -> fetch();
        }else{
            $conex = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cliente = :id_cliente");
            $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
            $conex -> execute();
            return $conex -> fetchAll();
        }
        $conex -> close();
        $conex = NULL;
    }

    static public function BSCrearProductoFavorito($tabla, $datos){

        $conex = Conexion::conectar()->prepare("INSERT INTO $tabla (id_cliente, id_producto) VALUES(:id_cliente, :id_producto)");
        $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);

        if($conex -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $conex -> close();
        $conex = NULL;
    }

    static public function BSEliminarProductoFavorito($tabla, $datos){
        $conex = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente AND id_producto = :id_producto");
        $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        $conex -> bindParam("id_producto", $datos["id_producto"], PDO::PARAM_STR);

        if($conex -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $conex -> close();
        $conex = NULL;
    }
    
    static public function BSMostrarDerivado($tabla, $datos){

        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos as t, productos as p WHERE p.codigo = :codigo AND p.id_producto != :id_producto AND t.id_empresa = :id_empresa AND t.id_producto = p.id_producto");
        $conex -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam("id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex -> close();
        $conex = NULL;
    }

    static public function BSMostrarProductosBuscados($dato, $empresa){

        $aKeyword = explode(" ", $dato);

        $sql = "SELECT t.* FROM tv_productos as t INNER JOIN productos AS p ON t.id_producto = p.id_producto WHERE p.nombre LIKE '%$aKeyword[0]%' OR p.descripcion LIKE '%$aKeyword[0]%'";

        for($i = 1; $i < count($aKeyword); $i++){
            if(!empty($aKeyword[$i])){
                $sql .= "OR p.nombre like '%$aKeyword[$i]%' OR p.descripcion like '%$aKeyword[$i]%'";
            }
        }

        $sql .= "AND (p.id_empresa = '$empresa')";
        $conex = Conexion::conectar()->prepare($sql);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex -> close();
        $conex = NULL;
        
    }

    static public function BSComentariosPaginados($producto, $inferior){
        $conex = Conexion::conectar()->prepare("SELECT nombre, comentario, puntos FROM tv_productos_comentarios AS c INNER JOIN clientes_empresa AS e ON c.id_cliente = e.id_cliente WHERE id_producto = :id_producto ORDER BY id_comentario DESC LIMIT :inferior, 5;");
        $conex -> bindParam(":id_producto", $producto, PDO::PARAM_STR);
        $conex -> bindParam(":inferior", $inferior, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex -> close();
        $conex = NULL;
    }

    static public function BSGuardarComentarioProducto($tabla, $datos){
        $conex = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, id_cliente, comentario, puntos) VALUES (:id_producto, :id_cliente, :comentario, :puntos)");
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        $conex -> bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $conex ->bindParam(":puntos", $datos["puntos"], PDO::PARAM_STR);

        if ($conex -> execute()){
            return 'ok';
        }
        $conex -> close();
        $conex = NULL;
    }

    static public function BSUpdateComentarioProducto($datos){

        $conex = Conexion::conectar()->prepare("UPDATE tv_productos_comentarios SET puntos = :puntos, comentario = :comentario WHERE id_producto = :id_producto AND id_cliente =: id_cliente;");
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        $conex -> bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $conex -> bindParam(":puntos", $datos["puntos"], PDO::PARAM_STR);

        if($conex -> execute()){
            return 'ok';
        }
        $conex -> close();
        $conex = NULL;
    }

    static public function BSVerificarComentario($producto, $cliente){
        $conex = Conexion::conectar()->prepare("SELECT id_comentario FROM tv_productos_comentarios WHERE id_cliente = :id_cliente AND id_producto = :id_producto");
        $conex -> bindParam(":id_producto", $producto, PDO::PARAM_STR);
        $conex -> bindParam(":id_cliente", $cliente, PDO::PARAM_STR);
        $conex -> execute();
        if($conex -> fetch()==null || $conex->fetch() == ""){
            return "false";
        }else{
            $conex ->fetch();
        }
        $conex->close();
        $conex = NULL;
    }

    static public function BSObtenerPuntuacionProducto($datos){
        $conex = Conexion::conectar()->prepare("SELECT puntos, comentarios FROM productos WHERE id_producto = :id_producto AND id_empresa = :id_empresa");
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex ->execute();
        return $conex -> fetch();
        $conex -> close();
        $conex = NULL;
    }

    static public function BSModificarPuntuacionProducto($datos){
        $conex = Conexion::conectar()->prepare("UPDATE productos SET puntos = :puntos, comentarios = :comentarios WHERE id_producto = :id_producto AND id_empresa = :id_empresa");
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":comentarios", $datos["comentarios"], PDO::PARAM_STR);
        $conex -> bindParam(":puntos", $datos["puntos"], PDO::PARAM_STR);

        if($conex -> execute()){
            return 'ok';
        }
        $conex -> close();
        $conex = NULL;
    }

    static public function BSComentarioUsuarioProducto($producto, $cliente){
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos_comentarios WHERE id_cliente = :id_cliente AND id_producto = :id_producto");
        $conex ->bindParam(":id_producto", $producto, PDO::PARAM_STR);
        $conex ->bindParam(":id_cliente", $cliente, PDO::PARAM_STR);
        $conex ->execute();
        if($conex->fetch()==null||$conex->fetch()==""){
            return "false";
        }else{
            return $conex ->fetch();
        }
        $conex->close();
        $conex = NULL;
    }

    static public function BSMostrarProductosDerivados($tabla, $datos){

        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos as t, productos as p
        WHERE p.codigo = :codigo AND p.id_producto != :id_producto AND t.id_empresa = :id_empresa AND t.id_producto = p.id_producto AND stock > 0");
        $conex -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex -> close();
        $conex = NULL;
    }

    static public function BSMostrarInformacionGeneralProducto($tabla, $item, $valor){
        $conex = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $conex -> bindParam(":".$item, $valor, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetch();
        $conex -> close();
        $conex = NULL;
    }
}

?>