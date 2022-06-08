<?php

class ctrBTEmpresas{

    static public function ctrgetEmpresas(){
        $response = BTEmpresas::BTgetEmpresas();
        return $response;
    }

    static public function ctrBTCategorias(){
        $response = BTEmpresas::BTCategorias();
        return $response;
    }

    static public function ctrBTCategoriaslimit(){
        $response = BTEmpresas::BTCategoriaslimit();
        return $response;
    }


    static public function ctrBTSubcategorias(){
        $response = BTEmpresas::BTSubcategorias();
        return $response;
    }

    static public function ctrget1Empresa(){
        $response = BTEmpresas::BTget1Empresa();
        return $response;
    }

    static public function ctrget1categoria(){
        $response = BTEmpresas::BTget1categoria();
        return $response;
    }

    static public function ctrgetCategoriaEmpresa(){
        $response = BTEmpresas::BTgetCategoriaEmpresa();
        return $response;
    }
    
    static public function ctrgetProduCategoEmp($idEmpresa, $idCategoria){
        $response = BTEmpresas::BTgetProduCategoEmp($idEmpresa, $idCategoria);
        return $response;
    }

}
?>