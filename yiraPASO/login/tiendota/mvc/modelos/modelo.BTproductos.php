<?php 

class BigShopProductos{
    static public function BTMostrarProductosLimit(){

        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_productos.id_producto LIMIT 16");
        $conex -> execute();
        return $conex -> fetchAll();
        $conex ->close();
        $conex = NULL;
    }

    static public function BTMostrarProducto(){

        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_productos.id_producto WHERE tv_productos.id_producto = :id_producto");
        $conex -> execute();
        return $conex -> fetchAll();
        $conex ->close();
        $conex = NULL;
    }

    static public function BTgetEmpresaProductos($idEmpresa){
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_productos.id_producto WHERE tv_productos.id_empresa = :id_empresa");
        $conex -> bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex ->close();
        $conex = null;
    }

    static public function BTgetProductoPrecio($codigo){
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos_listado WHERE codigo = :codigo");
        $conex -> bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetch();
        $conex -> close();
        $conex = null;
    }

    static public function BTgetProductoDescripcion($idProducto){
        $conex = Conexion::conectar()->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
        $conex -> bindParam(":id_producto", $idProducto, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetch();
        $conex-> close();
        $conex = null;
    }

    static public function BTMostrarComentariosProducto($dato){
        $conex = Conexion::conectar()->prepare("SELECT nombre, comentario, puntos FROM tv_productos_comentarios AS c INNER JOIN clientes_empresa AS e ON c.id_cliente = e_cliente WHERE id_producto = :id_producto");
        $conex -> bindParam(":id_producto", $dato, PDO::PARAM_STR);
        $conex -> execute();
        return $conex -> fetchAll();
        $conex -> close();
        $conex = null;
    }

    static public function BTProductosBuscados($dato, $empresa){

        $aKeyword = explode(" ", $dato);

        $sql = "SELECT t.* FROM tv_productos as t INNER JOIN productos as p ON t.id_producto = p.id_producto WHERE p.nombre like '%$aKeyword[0]%' OR p.descripcion like '%$aKeyword[0]%'";


        for ($i= 1; $i < count($aKeyword); $i++) { 
            if (!empty($aKeyword[$i])) {
                $sql .= " OR p.nombre like '%$aKeyword[$i]%' OR p.descripcion like '%$aKeyword[$i]%'";
            }
        }

        $sql .= "AND (p.id_empresa = '$empresa')";

        $conex = Conexion::conectar()->prepare($sql);
        $conex -> execute();

        return $conex -> fetchAll();

        $conex -> close();
        $conex = NULL;
    }

    static public function BTSaveComentario($tabla, $datos){

		$conex = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, id_cliente, comentario, puntos) VALUES(:id_producto, :id_cliente, :comentario, :puntos)");
		$conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
		$conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
		$conex -> bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
		$conex -> bindParam(":puntos", $datos["puntos"], PDO::PARAM_STR);

		if ($conex -> execute()) {
			return 'ok';
		}

		$conex -> close();
		$conex = NULL;
	}

    static public function BTUpdateComentario($datos){
        $conex = Conexion::conectar()->prepare("UPDATE tv_productos_comentarios SET puntos = :puntos, comentario = :comentario WHERE id_producto = :id_producto AND id_cliente = :id_cliente");

        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        $conex -> bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $conex -> bindParam(":puntos", $datos["puntos"], PDO::PARAM_STR);

        if($conex -> execute()){
            return 'ok';
        }

        $conex -> close();
        $conex = null;
    }

    static public function BTcalifProducto($datos){
        $conex = Conexion::conectar()->prepare("SELECT puntos, comentario FROM productos WHERE id_producto = :id_producto AND id_empresa = :id_empresa");
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);

        $conex -> execute();
        return $conex -> fetch();
        $conex -> close();
        $conex = null;
    }

    static public function BTUpdatecalifProdu($datos){
        $conex = Conexion::conectar()->prepare("UPDATE productos SET puntos = :puntos, comentarios = :comentarios WHERE id_producto = :id_producto AND id_empresa =:id_empresa");

        $conex -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $conex -> bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $conex -> bindParam(":comentarios",$datos["comentarios"],PDO::PARAM_STR);
        $conex -> bindParam(":puntos",$datos["puntos"], PDO::PARAM_STR);

        if($conex -> execute()){ 
            return 'ok';    
        }    -

        $conex -> close();
        $conex = null;
    }
}

?>