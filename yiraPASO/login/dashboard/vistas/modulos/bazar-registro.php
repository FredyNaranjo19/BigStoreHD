<?php
  $elementos = ControladorCompras::ctrMostrarElementosEmpresa();

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h2> <?php echo $_SESSION["nombreEmpresa_dashboard"] ?></h2>
        </div>
        <div class="col-sm-3 offset-md-1">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Bazar</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <h3>Compra y vende: Registro</h3><br>

      <div>
        <h4>¿Quieres agregar tu negocio a Compra y Vende?</h4>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Sí
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            No
          </label>
        </div>
           
        <form id="formCrearProductoTienda" accept-charset="utf-8" enctype="multipart/form-data">

          <input type="hidden" id="inputIdProductoPV" sku="" codigo="">

          <div class="row">
            <div class="col-md-6 mb-3">
              <h5> Categoría de tu negocio:</h5>
              <div class="input-group">
                <select class="form-control input-lg" id="ProductonCategoriaBazar" required>
                  <option value="">Selecciona una categoría</option>
                  <?php
                    $item = NULL;
                    $valor = NULL;

                    $respuesta = ControladorBazar::ctrMostrarBazarCategorias($item, $valor);

                    foreach ($respuesta as $key => $value) {
                      echo '<option value="'.$value["id_categoria"].'">'.$value["nombre_categoria_bazar"].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <!-- <div class="col-md-6 mb-3">
              <h5 class="titprod"> Subcategoría:</h5>
              <div class="input-group">
                <select class="form-control input-lg" id="ProductonSubcategoriaBazar" required>
                  <option value="">Selecciona la subcategoría</option>
                </select>
              </div>
            </div> -->
          </div>
            
          <button type="submit" class="btn btn-primary" id="registrarEmpresaCV">Guardar</button>

        </form>
        
      </div>
      <br>
      <div>
        <h2>Por favor, termina de llenar los datos de tu empresa.</h2>
        <form>
          <div class="row">
              <div class="col">
                <h5 class="titprod"> Estado:</h5>
                <div class="input-group">
                  <select class="form-control" style="width: 40px;" id="selectEstado" required>
                    <option value="">Selecciona un el estado donde esta ubicada la empresa</option>
                    <?php
                      $item = NULL;
                      $valor = NULL;

                      $respuesta = ControladorBazar::ctrMostrarEstados($item, $valor);

                      foreach ($respuesta as $key => $value) {
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="col-md-6 mb-3">
                  <h5 class="titprod"> Municipio:</h5>
                  <div class="input-group">
                    <select class="form-control input-lg" id="selectMunicipio" required>
                      <option value="">Selecciona el municipio</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col">
                <h5 style="color:whitesmoke" class="titprod">Código Postal</h5>
                <input id="cpEmpresa">
              </div>
            </div>
          
            <button class="btn btn-success" type="submit" id="guardarEstadoEmpresa">Guardar datos</button>
          
        </form>
      </div>
     

  </section>

</div>
