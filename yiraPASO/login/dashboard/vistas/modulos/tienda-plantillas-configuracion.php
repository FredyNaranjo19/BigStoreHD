 <?php

  $item = "id_misPlantillas";
  $valor = $_GET["mi"];

  $plantilla = ControladorPlantillasTienda::ctrMostrarMisPlantillas($item, $valor);

  $configuracion = ControladorPlantillasTienda::ctrMostrarConfiguracion($item, $valor);

  if ($configuracion != false) {

    $desencode = json_decode($configuracion['configuracion'], true);
    $desencodeImagenes = json_decode($configuracion['imagenes'], true);
    $desencodeColores = json_decode($configuracion['colores'], true);

  } else {

    $desencode = "";
    $desencodeImagenes = "";

  }

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <div class="container-fluid"> 
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $_SESSION["nombreEmpresa_dashboard"] ?> (Configuración Plantilla).</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <input type="hidden" id="idPlantillaConfig" value="<?php echo $configuracion[0] ?>">
              <?php
                include 'demos/persuit.php';
              ?>

            </div>
          </div>

        </div>
    
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
