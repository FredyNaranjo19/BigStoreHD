<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $_SESSION["nombreEmpresa_dashboard"] ?> ( Plantillas ).</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Plantillas</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-title">
                Mis Plantillas
              </div>
            </div>
            <div class="card-body">

              <div class="row">
              <?php
                $item = NULL;
                $valor = NULL;
                $registro = 0;

                $respuestas = ControladorPlantillasTienda::ctrMostrarMisPlantillas($item, $valor);

                foreach ($respuestas as $key => $value) {

                  $itemP = "id_plantilla";
                  $valorP = $value["id_plantilla"];
                  $respuestaP = ControladorPlantillasTienda::ctrMostrarPlantillas($itemP, $valorP);

                  if ($registro > 3) {
                    
                    echo '</div>
                          <div class="row">';
                  }

              ?>
                <div class="col-md-3">
                  <div class="planImagen">
                    <img src="<?php echo $respuestaP['imagen'] ?>">
                  </div>
                  <div class="planTitulo">
                    <h4><?php echo $respuestaP['nombre'] ?></h4>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <?php
                      if ($value["estado"] == "activado") {
                            
                        echo '<button type="button" class="btn btn-block btn-success btnConfigurarPlantilla" idMiPlantilla="'.$value["id_misPlantillas"].'">Configurar</button>';

                      } else {

                        echo '<button type="button" class="btn btn-block btn-default btnSeleccionarPlantilla" idPlantilla="'.$value["id_plantilla"].'" idEmpresa="'.$value["id_empresa"].'">Seleccionar</button>';

                      }
                      ?>
                    </div>
                    <div class="col-md-4">
                      <button type="button" class="btn btn-info btn-block btnPlantillaView" Plantilla="<?php echo $respuestaP['nombre'] ?>">
                        <i class="fa fa-eye"></i>
                      </button>
                    </div>
                  </div>

                </div>

              <?php

                $registro ++;

                if ($registro > 3) {

                  $registro = 0;

                }
              }
              ?>
              </div>

            </div>
          </div>
        </div>



        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-title">
                Plantillas
              </div>
            </div>
            <div class="card-body">
              <div>
                <div class="btn-group w-100 mb-2">
                  <a class="btn btn-info active btnPlantilla" href="javascript:void(0)" data-filter="all"> Todas </a>
                  <?php

                    $plantillas = ModeloPlantillasTienda::mdlMostrarCategoriasPlantillas();

                    foreach ($plantillas as $key => $value) {

                      echo '<a class="btn btn-info btnPlantilla" href="javascript:void(0)" data-filter="'.$value[0].'"> '.$value[0].' </a>';

                    }

                  ?>  
                </div>
              </div>
              <div>
                <div class="filter-container p-0 row">
                <?php
                  $item = NULL;
                  $valor = NULL;

                  $respuestas = ControladorPlantillasTienda::ctrMostrarPlantillas($item, $valor);

                  foreach ($respuestas as $key => $value) {

                ?>

                  <div class="filtr-item col-sm-3" data-category="<?php echo $value['categoria'] ?>">
                    <div class="planImagen">
                      <img src="<?php echo $value["imagen"] ?>">
                    </div>
                    <div class="planTitulo">
                      <h4><?php echo $value["nombre"] ?></h4>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <?php
                          $item = "id_plantilla";
                          $valor = $value["id_plantilla"];

                          $respuestaA = ControladorPlantillasTienda::ctrMostrarMisPlantillas($item, $valor);

                          if(sizeof($respuestaA) > 0){

                            echo '<h4>Plantilla adquirida</h4>';

                          } else {

                            echo '<button type="button" class="btn btn-block btn-primary btnObtenerPlantilla" idPlantilla="'.$value["id_plantilla"].'"> Obtener </button>';

                          }

                        ?>
                      </div>
                      <div class="col-4">
                        <button type="button" class="btn btn-block btn-info btnPlantillaView" Plantilla="<?php echo $value['nombre'] ?>">
                          <i class="fa fa-eye"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                <?php  

                  }

                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>