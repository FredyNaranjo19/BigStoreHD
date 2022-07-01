<?php

class BTEmpresas
{

    static public function BSgetEmpresas()
    {
        $conex = Conexion::conectar()->prepare("SELECT empresas.*,imagen FROM empresas INNER JOIN tv_configuracion_logo ON tv_configuracion_logo.id_empresa = empresas.id_empresa");
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }

    static public function BSCategorias(){
        $conex = Conexion::conectar()->prepare("SELECT * FROM bs_categorias");
        $conex-> execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = NULL;
    }
    
    static public function BSCategoriaslimit(){
        $conex = Conexion::conectar()->prepare("SELECT * FROM bs_categorias LIMIT 4");
        $conex-> execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = NULL;
    }

    static public function BSSubcategorias($idbscategoria){
        $conex = Conexion::conectar()->prepare("SELECT * FROM bs_subcategorias where id_bscategoria = :id_bscategoria");
        $conex->bindParam(":id_bscategoria", $idbscategoria, PDO::PARAM_STR);
        $conex-> execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = NULL;
    }

    static public function BSget1Empresa($idEmpresa)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM empresas WHERE id_empresas = :id_empresa");
        $conex->bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex-> execute();
        return $conex->fetch();
        $conex->close();
        $conex = NULL;
    }

    static public function BSget1categoria($idbscategoria)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM bs_categorias WHERE id_bscategoria = :id_bscategoria");
        $conex->bindParam(":id_bscategoria", $idbscategoria, PDO::PARAM_STR);
        $conex-> execute();
        return $conex->fetch();
        $conex->close();
        $conex = NULL;
    }

    static public function BSget1subcategoria($idsubcategoriabs)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM bs_subcategorias WHERE id_bscategoria = :id_bscategoria");
        $conex->bindParam(":id_subcategoriabs", $idsubcategoriabs, PDO::PARAM_STR);
        $conex-> execute();
        return $conex->fetch();
        $conex->close();
        $conex = NULL;
    }

    static public function BSgetCategoriaEmpresa($idEmpresa)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_categoria WHERE id_empresa = :id_empresa");
        $conex->bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }

    static public function BSgetProduCategoEmp($idEmpresa, $idCategoria)
    {
        $conex = Conexion::conectar()->prepare("SELECT * FROM tv_productos INNER JOIN productos ON productos.id_producto = tv_producto.id_producto WHERE tv_producto.id_empresa = :id_empresa AND id_categoria = :id_categoria");
        $conex->bindParam(":id_empresa", $idEmpresa, PDO::PARAM_STR);
        $conex->bindParam(":id_categoria:", $idCategoria, PDO::PARAM_STR);
        $conex->execute();
        return $conex->fetchAll();
        $conex->close();
        $conex = null;
    }
}
?>
