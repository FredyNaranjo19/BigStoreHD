<?php

class ctrBTEmpresas{

    static public function ctrgetEmpresas(){
        $response = BTEmpresas::getEmpresas();
        return $response;
    }

    static public function ctrBTCategoriasPre(){
        $response = BTEmpresas::BTCategoriasPre();
        return $response;
    }

    static public function ctrget1Empresa(){
        $response = BTEmpresas::get1Empresa();
        return $response;
    }

    static public function ctrget1categoria(){
        $response = BTEmpresas::get1categoria();
        return $response;
    }

    static public function ctrEmpresasLimit(){
        $tabla = "empresas";
        $response = BTEmpresas::EmpresasLimit($tabla);
        return $response;
    }

    static public function ctrgetCategoriaEmpresa(){
        $response = BTEmpresas::getCategoriaEmpresa();
        return $response;
    }
    
    static public function ctrgetProduCategoEmp($idEmpresa, $idCategoria){
        $response = BTEmpresas::getProduCategoEmp($idEmpresa, $idCategoria);
        return $response;
    }

    static public function ctrMostrarClientes($item, $valor, $empresa){

        $tabla = "clientes_empresa";

        $response = BTEmpresas::BTMostrarClientes($tabla, $item, $valor, $empresa);

        return $response;
    
    }
}
?>