<?php
// M O D E L O S
require_once 'mvc/modelos/conexion.php';
require_once 'mvc/modelos/modelo.BTempresas.php';
require_once 'mvc/modelos/modelo.BTproductos.php';

// C O N T R O L A D O R E S 

require_once 'mvc/controladores/controlador.tiendota.php';
require_once 'mvc/controladores/controlador.BTempresas.php';
require_once 'mvc/controladores/controlador.BTproductos.php';



//C O N T R O L A D O R E S

//- - - - - - I N I C I A R - - - - - - B I G  S H O P - - - - - -

$c2 = new ControladorPrincipal();
$c2->ctrPrincipal();
