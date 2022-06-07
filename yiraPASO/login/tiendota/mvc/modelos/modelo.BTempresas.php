<?php

class BTEmpresas
{

    static public function getEmpresas()
    {
        $conex = Conexion::conectar()->prepare("SELECT empresas.*,imagen FROM empresas INNER JOIN tv_configuracion_logo ON tv_configuracion_logo.id_empresa = empresas.id_empresa");
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }

    static public function BTCategoriasPre(){
        $conex = Conexion::conectar()->prepare("SELECT * FROM bazar_categorias");
        $conex-> execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = NULL;
    }

    static public function get1Empresa($idEmpresa)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM empresas WHERE id_empresas = :id_empresa");
        $conex-> execute();
        return $conex->fetch();
        $conex->close();
        $conex = NULL;
    }

    static public function get1categoria($idEmpresa)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM bazar_categorias WHERE id_categoria = :id_categoria");
        $conex-> execute();
        return $conex->fetch();
        $conex->close();
        $conex = NULL;
    }

    static public function EmpresasLimit()
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM empresas LIMIT 5");
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }

    static public function getCategoriaEmpresa($idEmpresa)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_categoria WHERE id_empresa = :id_empresa");
        $conex->bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }

    static public function getProduCategoEmp($idEmpresa, $idCategoria)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_producto.id_producto WHERE tv_producto.id_empresa = :id_empresa AND id_categoria = :id_categoria");
        $conex->bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex->bindParam(":id_categoria:", $idCategoria, PDO::PARAM_STR);
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }

    static public function BTMostrarClientes($tabla, $item, $valor, $empresa){
        
        if ($item != NULL) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND id_empresa = :id_empresa");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> bindParam(":id_empresa", $empresa, PDO::PARAM_STR);
            $stmt -> execute();

            return $stmt -> fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_empresa = :id_empresa");
            $stmt -> bindParam(":id_empresa", $empresa, PDO::PARAM_STR);
            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = NULL;
    }
}
?>
