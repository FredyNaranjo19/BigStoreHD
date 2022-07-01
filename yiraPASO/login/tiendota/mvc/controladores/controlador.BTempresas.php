<?php

class ctrBTEmpresas{

    static public function ctrgetEmpresas(){
        $response = BTEmpresas::BSgetEmpresas();
        return $response;
    }

    static public function ctrBSCategorias(){
        $response = BTEmpresas::BSCategorias();
        return $response;
    }

    static public function ctrBSCategoriaslimit(){
        $response = BTEmpresas::BSCategoriaslimit();
        return $response;
    }

    static public function ctrBSSubcategorias(){
        $response = BTEmpresas::BSSubcategorias();
        return $response;
    }

    static public function ctrBSget1Empresa(){
        $response = BTEmpresas::BSget1Empresa();
        return $response;
    }

    static public function ctrBSget1categoria(){
        $response = BTEmpresas::BSget1categoria();
        return $response;
    }

    static public function ctrBSgetCategoriaEmpresa(){
        $response = BTEmpresas::BSgetCategoriaEmpresa();
        return $response;
    }
    
    static public function ctrBSgetProduCategoEmp($idEmpresa, $idCategoria){
        $response = BTEmpresas::BSgetProduCategoEmp($idEmpresa, $idCategoria);
        return $response;
    }

}
?>