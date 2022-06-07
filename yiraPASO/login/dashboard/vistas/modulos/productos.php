<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h2> <?php echo $_SESSION["nombreEmpresa_dashboard"] ?> <spam class="textbienvenida">Productos</spam></h2>
        </div>
        <div class="col-sm-3 offset-md-1">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  
 
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12"> 
          <div class="card">
            <div class="card-body">

              <nav class="w-100 col-lg-12 navcl">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link active" id="product-tab" data-toggle="tab" href="#tabs-products" role="tab" aria-controls="product-tabs" aria-selected="true">
                    Productos
                  </a>
                  <a class="nav-item nav-link" id="product-warehouse-tab" data-toggle="tab" href="#product-warehouse" role="tab" aria-controls="product-warehouse" aria-selected="true">
                    Productos en almacenes
                  </a>
                  <a class="nav-item nav-link" id="product-papelera-tab" data-toggle="tab" href="#product-papelera" role="tab" aria-controls="product-papelera" aria-selected="true">
                    Productos en Papelera
                  </a>
                </div>
              </nav>

              <div class="tab-content col-lg-12 navcl" id="nav-tabContent">

                <!-- ************************ SECCION DE INFORMACION GENERAL DEL PRODUCTO **************************** -->
                <div class="tab-pane fade show active" id="tabs-products" role="tabpanel" aria-labelledby="product-tab">
                  
                  <div class="card col-lg-12">
                    <!-- Default box -->
                    <div class="card-header">
                      <?php
                        $item = NULL;
                        $valor = NULL;
                        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

                        //if (sizeof($respuesta) < $contenidoServicio[0]["contenido_productos"]) {
                      ?>
                        <button type="button" class="btn btn-secondary btnColorCambio btnNewProducto" data-toggle="modal" data-target="#modalAgregarProducto">
                          Nuevo Producto
                        </button>

                        <button type="button" class="btn btn-secondary btnColorCambio btnNewMasiveProducts">
                          Productos Masivos
                        </button>
                      <?php
                        //}
                      ?>

                      

                      <div class="card-tools">
                        <input type="checkbox" id="btn-mendesp"   data-toggle="collapse" href="#collapseProd" role="button" aria-expanded="false" aria-controls="collapseProd">
                          <label for="btn-mendesp" class="lbl-menup">
                            <span id="sp1p"></span>
                            <span id="sp2p"></span>
                          </label>
                      </div>
                    </div> 
                    <div class="collapse show" id="collapseProd">
                      <!-- <div class="card-body"> -->
                        <table id="tablaProductos" class="table table-striped table-bordered  dt-responsive" style="width: 100%;">

                          <thead>
                            <tr>
                              <th data-priority="1">Modelo</th>
                              <th data-priority="2">Nombre</th>
                              <th>Descripcion</th>
                              <th>Stock </th>
                              <th> Acciones </th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <!-- ******************************* SECCION PRODUCTOS ALMACEN *************************************** -->
                <div class="tab-pane fade" id="product-warehouse" role="tabpanel" aria-labelledby="product-harehouse-tab">
                  <div class="card col-lg-12">
                    <div class="card-header">
                      <!-- <button type="button" class="btn btn-secondary btnNewProducto" data-toggle="modal" data-target="#modalAgregarProducto">Nuevo Producto</button> -->

                      <div class="card-tools">
                        <input type="checkbox" id="btn-mendesp"   data-toggle="collapse" href="#collapseProd" role="button" aria-expanded="false" aria-controls="collapseProd">
                          <label for="btn-mendesp" class="lbl-menup">
                            <span id="sp1p"></span>
                            <span id="sp2p"></span>
                          </label>
                      </div>
                    </div>

                    <div class="collapse show" id="collapseProd">
                      <div class="card-body">
                        <div class="row">
                          
                          <div class="col-md-4 mb-3">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-warehouse"></i>
                                </span>
                              </div>
                              <select class="form-control input-lg" id="almacenesProductosSelect">
                                <option value="">Selecciona el almacén</option>
                                <?php
                                  $item = NULL;
                                  $valor = NULL;
                                  $respuesta = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor);

                                  foreach ($respuesta as $key => $value) {
                                ?>

                                <option value="<?php echo $value['id_almacen'] ?>">
                                  <?php echo $value['nombre'] ?>
                                </option>

                                <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <button class="btn btn-secondary btnColorCambio btnMostrarProductosAlmacen btn-block">
                              Mostrar
                            </button>
                          </div>

                        </div>
                        <table id="tablaProductosAlmacen" class="table table-hover" style="width: 100%;">
                            <thead>
                              <tr>
                                <th data-priority="1">Modelo</th>
                                <th data-priority="2">Nombre</th>
                                <th>Descripcion</th>
                                <th>Stock</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- ************************ SECCION DE INFORMACION GENERAL DEL PRODUCTO **************************** -->
                <div class="tab-pane fade" id="product-papelera" role="tabpanel" aria-labelledby="product-papelera-tab">
                  
                  <div class="card col-lg-12">
                    <!-- Default box -->
                    <div class="card-header">
                      <?php
                        $item = NULL;
                        $valor = NULL;
                        $respuesta = ControladorProductos::ctrMostrarProductosPapelera($item, $valor);

                        //if (sizeof($respuesta) < $contenidoServicio[0]["contenido_productos"]) {
                      ?>

                      <?php
                        //}
                      ?>

                      

                      <div class="card-tools">
                        <input type="checkbox" id="btn-mendesp"   data-toggle="collapse" href="#collapseProd" role="button" aria-expanded="false" aria-controls="collapseProd">
                          <label for="btn-mendesp" class="lbl-menup">
                            <!-- <span id="sp1p"></span>
                            <span id="sp2p"></span> -->
                          </label>
                      </div>
                    </div> 
                    <div class="collapse show" id="collapseProd">
                      <!-- <div class="card-body"> -->
                        <table id="tablaProductospapelera" class="table table-striped table-bordered  dt-responsive" style="width: 100%;">

                          <thead>
                            <tr>
                              <th data-priority="1">Modelo</th>
                              <th data-priority="2">Nombre</th>
                              <th>Descripcion</th>
                              <th>Stock Disponible</th>
                              <th>Reciclar</th>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <!-- ********************************** SECCION DE EMBARCACION *************************************** -->
                <!-- <div class="tab-pane fade" id="product-embark" role="tabpanel" aria-labelledby="product-embark-tab">
                  <div class="col-md-12">
                    <br>
                    <div class="row">
                      <div class="col-md-5">
                        <h4>Embarcación</h4>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-warehouse"></i>
                            </span>
                          </div>
                          <div class="custom-file">
                            <select class="form-control input-lg" id="almacenesSelect">
                              <option value="">Selecciona el almacén</option>
                              <?php
                                $item = NULL;
                                $valor = NULL;
                                $respuesta = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor);

                                foreach ($respuesta as $key => $value) {
                              ?>

                              <option value="<?php echo $value['id_almacen'] ?>">
                                <?php echo $value['nombre'] ?>
                              </option>

                              <?php
                                }
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              Folio de embarcación: 
                            </span>
                          </div>
                          <?php
                            $item = NULL;
                            $valor = NULL;

                            $respuesta = ControladorEmbarcacion::ctrMostrarEmbarcaciones($item, $valor);

                            $folio = 1000;

                            $folio = intval($folio) + intval(sizeof($respuesta));

                          ?>

                          <input type="text" class="form-control input-lg" id="folioEmbarcacion" value="<?php echo $folio ?>" readonly>
                        </div> 


                      </div>

                      <div class="col-md-7">
                        <h4>Productos</h4>
                        <table class="table tablas" style="width: 100%;">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Descripcion</th>
                              <th>Stock</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $item = NULL;
                              $valor = NULL;

                              $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

                              foreach ($respuesta as $key => $value) {
                                
                            ?>
                              <tr>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td><?php echo $value["descripcion"]; ?></td>
                                <td><?php echo $value["stock_disponible"]; ?></td>
                                <td>
                                  <button class="btn btn-secondary btnAgregarEmbarcacion" idProducto="<?php echo $value['id_producto']; ?>">
                                    Agregar
                                  </button>
                                </td>
                              </tr>
                            <?php

                              }

                            ?>

                          </tbody>
                        </table>
                      </div>
                      
                    </div>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!--============================================
=            MODAL AGREGAR PRODUCTO            =
=============================================-->

<div class="modal fade" id="modalAgregarProducto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formCrearProducto" accept-charset="utf-8" enctype="multipart/form-data">
         
        <!-- ENCABEZADO DEL MODAL -->
        <div class="modal-header" style="background: #343A40; color:white;">
          <h4 class="modal-title">Crear Producto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">     

          <div class="row"> 
             <!-- Modelo -->
            <div class="col-md-6 mb-3">
              <h5 class="titprod"> Modelo:</h5>
              <div class="input-group">
                <div id="inputname" class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fas fa-barcode"></i>
                  </span>
                </div> 
                <input type="text" class="form-control input-lg" name="ProductonModelo" id="ProductonModelo" placeholder="Escribe modelo del producto..." required>
                <input type="hidden" id="idEmpresaProducto" value="<?php echo $_SESSION["idEmpresa_dashboard"] ?>">
                <input type="hidden" id="alias" value="<?php echo $_SESSION["aliasEmpresa_dashboard"] ?>">
                <input type="hidden" id="aleatorio">
              </div>
            </div>

            <!-- Nombre -->
            <div class="col-md-6 mb-3">
              <h5 class="titprod"> Nombre:</h5>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-tshirt"></i>
                  </span>
                </div>
                <input type="text" class="form-control input-lg" id="ProductonNombre"  placeholder="Escribe nombre del producto..." required>
              </div>
            </div>
          </div>
          <!-- Descripción -->
          <h5 class="titprod"> Descripción:</h5>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-list"></i>
              </span>
            </div>
            <textarea class="form-control input-lg" id="ProductonDescripcion" row="2" placeholder="Escribe la descripción del producto"></textarea>
          </div> 

          <!-- Piezas, Costo y Costo de envío  -->
          <div class="row">
            
            <div class="col-md-6 mb-3">
              <h5 class="titprod">No. de Piezas:</h5>
              <div class="input-group">
                <div id="inputname" class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-hashtag"></i>
                  </span>
                </div>
                <input type="number" class="form-control input-lg" id="ProductonStock" placeholder="Número piezas" min="0" required>

              </div>
            </div>

            <div class="col-md-6 mb-3">
              <h5 class="titprod">Costo por pieza (Lote):</h5>
              <div class="input-group">
                <div id="inputname" class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="number" class="form-control input-lg" id="ProductonCosto" step="0.01" placeholder="Costo de 1 pieza" min="0" required>

              </div>
            </div>
            
          </div>

          <div class="row">

            <div class="col-md-6 mb-3">
              <h5 class="titprod">Precio sugerido:</h5>
              <div class="input-group">
                <div id="inputname" class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="number" class="form-control input-lg" id="ProductoPrecioSugerido" step="0.01" placeholder="Precio sugerido de 1 pieza" required>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <h5 class="titprod">Precio de venta:</h5>
              <div class="input-group">
                <div id="inputname" class="input-group-prepend">
                  <span class="input-group-text">
                  <i class="fas fa-dollar-sign"></i>
                  </span>
                </div>
                <input type="number" class="form-control input-lg" id="ProductonPrecio" step="0.01" placeholder="Precio de 1 pieza" required>
              </div>
            </div>

          </div>

          <hr>
          <!-- Caracteristicas (Talla y Color) -->
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-xs-8">
                <h4 class="text-center">Agregar Caracteristica</h4>
              </div>
              <div class="col-md-4 col-xs-4">
                 <button type="button" class="chose-img btn btn-secondary btnColorCambio btn-block btnAgregarCaracteristica"> 
                <i class="fas fa-plus"></i>  
                    Agregar
                  </button>
              </div>
            </div>
          </div>
          <hr>
          <!-- Caracteristica a agregar -->
          <input type="hidden" id="listaAgregado">
          <div class="container nCaracteristica">
          </div>

          <hr>

          <!-- Factura -->
          <div class="row">
              <div class="col-md-6">
                <h5 class="titprod"> Folio de la factura:</h5>
                <div class="input-group mb-3">
                  <input type="text" class="form-control input-lg" id="ProductonFactura" placeholder="Folio">
                </div>
              </div>

              <div class="col-md-6">
                <h5 class="titprod"> Proveedor:</h5>
                <div class="input-group mb-3">
                  <select class="form-control input-lg" id="ProductonProveedor">
                    <option value="">Selecciona el proveedor...</option>
                    <?php
                      $item = NULL;
                      $valor = NULL;

                      $respuesta = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                      foreach ($respuesta as $key => $value) {
                          
                          echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
                      }

                    ?>
                  </select>
                </div>
              </div>
          </div>

          <hr>

          <div class="card-tools">
            <div class="row">
              <div class="col-md-11">
                <h5 class="titimg">Datos de envío</h5>  
              </div>
              <div class="col-md-1">
                <input type="checkbox" 
                  id="btn-mendesEnvio"   
                  data-toggle="collapse" 
                  href="#collapseEnvios" 
                  role="button" 
                  aria-expanded="false" 
                  aria-controls="collapseEnvios">
                  <label for="btn-mendesEnvio" class="lbl-menuEnvio">
                    <span id="sp1Envio"></span>
                    <span id="sp2Envio"></span>
                  </label>
              </div>
            </div>
          </div>

          <div class="collapse" id="collapseEnvios">
            <div class="container">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <h5 class="titprod">Largo (cm):</h5>
                  <div class="input-group">
                    <div id="inputname" class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-box-open"></i>
                      </span>
                    </div>
                    <input text="text" class="form-control input-lg" id="ProductonMedidasLargo" placeholder="Medidas por pza.">
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <h5 class="titprod">Ancho (cm):</h5>
                  <div class="input-group">
                    <div id="inputname" class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-box-open"></i>
                      </span>
                    </div>
                    <input text="text" class="form-control input-lg" id="ProductonMedidasAncho" placeholder="Medidas por pza.">
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <h5 class="titprod">Alto (cm):</h5>
                  <div class="input-group">
                    <div id="inputname" class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-box-open"></i>
                      </span>
                    </div>
                    <input text="text" class="form-control input-lg" id="ProductonMedidasAlto" placeholder="Medidas por pza.">
                  </div>
                </div>
              </div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <h5 class="titprod">Peso (kg):</h5>
                  <div class="input-group">
                    <div id="inputname" class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-weight"></i>
                      </span>
                    </div>
                    <input text="text" class="form-control input-lg" id="ProductonPeso" placeholder="Peso por pza.">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Datos para facturar producto (SAT) -->
          <hr>

          <div class="card-tools">
            <div class="row">
              <div class="col-md-11">
                <h5 class="titimg">Datos para facturar (SAT)</h5>  
              </div>
              <div class="col-md-1">
                <input type="checkbox" 
                  id="btn-mendesSAT"   
                  data-toggle="collapse" 
                  href="#collapseSAT" 
                  role="button" 
                  aria-expanded="false" 
                  aria-controls="collapseSAT">
                  <label for="btn-mendesSAT" class="lbl-menuSAT">
                    <span id="sp1SAT"></span>
                    <span id="sp2SAT"></span>
                  </label>
              </div>
            </div>
          </div>

          <div class="collapse" id="collapseSAT">
            <div class="container">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <h5 class="titprod">Clave productos y servicios</h5>
                  <div class="input-group">
                    <div id="inputname" class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-box-open"></i>
                      </span>
                    </div>
                    <input text="text" class="form-control input-lg" id="ProductonClaveProdServ" placeholder="Ej. 01010101">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <h5 class="titprod">Clave Unidad</h5>
                  <div class="input-group">
                    <div id="inputname" class="input-group-prepend">
                      <span class="input-group-text">
                      <i class="fas fa-box-open"></i>
                      </span>
                    </div>
                    <select class="form-control input-lg" id="ProductonClaveUnidad">
                      <option value="" disabled>Seleccionar clave</option>
                      <option value="H87" selected>Pieza</option>
                      <option value="EA">Elemento</option>
                      <option value="E48">Unidad de servicio</option>
                      <option value="ACT">Actividad</option>
                      <option value="KGM">Kilogramo</option>
                      <option value="E51">Trabajo</option>
                      <option value="A9">Tarifa</option>
                      <option value="MTR">Metro</option>
                      <option value="AB">Paquete a granel</option>
                      <option value="BB">Caja base</option>
                      <option value="KT">Kit</option>
                      <option value="SET">Conjunto</option>
                      <option value="LTR">Litro</option>
                      <option value="XBX">Caja</option>
                      <option value="MON">Mes</option>
                      <option value="HUR">Hora</option>
                      <option value="MTK">Metro cuadrado</option>
                      <option value="11">Equipos</option>
                      <option value="MGM">Miligramo</option>
                      <option value="XPK">Paquete</option>
                      <option value="XKI">Kit(Conjunto de piezas)</option>
                      <option value="AS">Variedad</option>
                      <option value="GRM">Gramo</option>
                      <option value="PR">Par</option>
                      <option value="DPC">Docenas de piezas</option>
                      <option value="xun">Unidad</option>
                      <option value="DAY">Día</option>
                      <option value="XLT">Lote</option>
                      <option value="10">Grupos</option>
                      <option value="MLT">Mililitro</option>
                      <option value="E54">Viaje</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> 

        <!-- FOOTER DEL MODAL -->
        <div class="modal-footer justify-content-between" style="background: #343A40; color:white;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-s  econdary btnColorCambio">Guardar</button>
        </div>

      </form>
    </div>
  </div> 
</div>
 
<!--====  End of MODAL AGREGAR PRODUCTO  ====-->

 
<!--===================================================
=      Detalles y edición del producto y sus lotes    =
====================================================-->

<div class="modal fade" id="modalMostrarInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- ENCABEZADO DEL MODAL -->
      <div class="modal-header" style="background: #343A40; color:white;">
        <h4 class="modal-title">Detalles de Producto, Precios y Lotes.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>

      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">
 
        <!-- CODIGO PESTAÑAS --> 
        <nav class="w-100 col-lg-12 navcl mt-2">
          <div class="nav nav-tabs" id="productedt-tab" role="tablist">
            <a class="nav-item nav-link active" id="product-edt-tab" data-toggle="tab" href="#product-edt" role="tab" aria-controls="product-edt" aria-selected="true">Producto</a>

            <a class="nav-item nav-link" id="product-lotes-tab" data-toggle="tab" href="#product-lotes" role="tab" aria-controls="product-lotes" aria-selected="false">Lotes</a>
            
            <a class="nav-item nav-link" id="product-listado-tab" data-toggle="tab" href="#product-listado" role="tab" aria-controls="product-listado" aria-selected="false">Listado Precios</a>
          </div>
        </nav>
        <div class="tab-content col-lg-12 navcl" id="nav-tabContentEditar">
          <!--Edición de productos-->
          <div class="tab-pane fade show active" id="product-edt" role="tabpanel" aria-labelledby="product-edt-tab"> 

            <div class="row">
              <div class="col-sm-9">
                <h3 class="mt-2">Edición:</h3>
              </div>
              <div class="col-sm-3"> 
                <div class='input-group-prepend'>
                  <?php
                    $item = NULL;
                    $valor = NULL;
                    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

                    
                    // if (sizeof($respuesta) < $contenidoServicio[0]["contenido_productos"]) {
                  ?>
                    <button type="button" class="btn btn-primary btn-sm btnModalDerivado btn-block" idProducto>
                      <i class="fa fa-gift"></i> Crear derivado
                    </button>
                  <?php
                    // }
                  ?>
                </div>
                
              </div> 
            </div>
            <hr>

            <!-- Modelo y nombre -->
            <div class="row">
              <!-- Modelo -->
              <div class="col-md-6 mb-3">
                <h5 class="titprod"> Modelo:</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fas fa-barcode"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control input-lg" id="ProductoeModelo" required readonly>
                </div>
              </div>
                <!-- Nombre -->
              <div class="col-md-6 mb-3">
                <h5 class="titprod"> Nombre:</h5>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-tshirt"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control input-lg" id="ProductoeNombre" placeholder="Escribe nombre del producto..." required>
                </div>
              </div>
            </div>

            <!-- Descripción -->
            <h5 class="titprod"> Descripción:</h5>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-list"></i>
                </span>
              </div>
              <textarea class="form-control input-lg" id="ProductoeDescripcion" row="2" placeholder="Escribe la descripción del producto"></textarea>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <h4 class="text-center">Caracteristicas</h4>
                </div>
                <div class="col-md-4">
                   <button type="button" class="chose-img btn btn-secondary btn-block btnAgregarECaracteristica" style="margin-bottom: 5px;"> 
                  <i class="fas fa-plus"></i>  
                      Agregar
                    </button>
                </div>
              </div>
            </div> 

            <div id="caracteristicasEditar"></div>
            <input type="hidden" id="listaAgregadoEditar">
            <hr>


            <div class="card-tools">
              <div class="row">
                <div class="col-md-11">
                  <h class="titimg" style="font-size: 20px;">Datos de envío:</h5>
                </div>  
                <div class="col-md-1">
                  <input type="checkbox"
                  id="btn-mendesEnvioEditar"   
                  data-toggle="collapse" 
                  href="#collapseEnvios" 
                  role="button" 
                  aria-expanded="false" 
                  aria-controls="collapseEnvios">
                  <label for="btn-mendesEnvioEditar" class="lbl-menuEnvioEditar">
                    <span id="sp1EnvioEditar"></span>
                    <span id="sp2EnvioEditar"></span>
                  </label>
                </div>
              </div>
            </div>

            <div class="collapse" id="collapseEnvios">
              <div class="container">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <h5 class="titprod">Largo (cm):</h5>
                    <div class="input-group">
                      <div id="inputname" class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-box-open"></i>
                        </span>
                      </div>
                      <input text="text" class="form-control input-lg" id="ProductoeMedidasLargo" placeholder="Medidas por pza.">
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <h5 class="titprod">Ancho (cm):</h5>
                    <div class="input-group">
                      <div id="inputname" class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-box-open"></i>
                        </span>
                      </div>
                      <input text="text" class="form-control input-lg" id="ProductoeMedidasAncho" placeholder="Medidas por pza.">
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <h5 class="titprod">Alto (cm):</h5>
                    <div class="input-group">
                      <div id="inputname" class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-box-open"></i>
                        </span>
                      </div>
                      <input text="text" class="form-control input-lg" id="ProductoeMedidasAlto" placeholder="Medidas por pza.">
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <h5 class="titprod">Peso (kg):</h5>
                    <div class="input-group">
                      <div id="inputname" class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-weight"></i>
                        </span>
                      </div>
                      <input text="text" class="form-control input-lg" id="ProductoePeso" placeholder="Peso por pza.">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datos para facturar producto (SAT) -->
            <hr>

            <div class="card-tools">
              <div class="row">
                <div class="col-md-11">
                  <h5 class="titimg">Datos para facturar (SAT)</h5>  
                </div>
                <div class="col-md-1">
                  <input type="checkbox" 
                    id="btn-mendesSAT"   
                    data-toggle="collapse" 
                    href="#collapseSAT" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="collapseSAT">
                    <label for="btn-mendesSAT" class="lbl-menuSAT">
                      <span id="sp1SAT"></span>
                      <span id="sp2SAT"></span>
                    </label>
                </div>
              </div>
            </div>

            <div class="collapse" id="collapseSAT">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <h5 class="titprod">Clave productos y servicios</h5>
                    <div class="input-group">
                      <div id="inputname" class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-box-open"></i>
                        </span>
                      </div>
                      <input text="text" class="form-control input-lg" id="ProductoeClaveProdServ" placeholder="Ej. 01010101">
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <h5 class="titprod">Clave Unidad</h5>
                    <div class="input-group">
                      <div id="inputname" class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-box-open"></i>
                        </span>
                      </div>
                      <select class="form-control input-lg" id="ProductoeClaveUnidad">
                        <option value="" disabled>Seleccionar clave</option>
                        <option value="H87" selected>Pieza</option>
                        <option value="EA">Elemento</option>
                        <option value="E48">Unidad de servicio</option>
                        <option value="ACT">Actividad</option>
                        <option value="KGM">Kilogramo</option>
                        <option value="E51">Trabajo</option>
                        <option value="A9">Tarifa</option>
                        <option value="MTR">Metro</option>
                        <option value="AB">Paquete a granel</option>
                        <option value="BB">Caja base</option>
                        <option value="KT">Kit</option>
                        <option value="SET">Conjunto</option>
                        <option value="LTR">Litro</option>
                        <option value="XBX">Caja</option>
                        <option value="MON">Mes</option>
                        <option value="HUR">Hora</option>
                        <option value="MTK">Metro cuadrado</option>
                        <option value="11">Equipos</option>
                        <option value="MGM">Miligramo</option>
                        <option value="XPK">Paquete</option>
                        <option value="XKI">Kit(Conjunto de piezas)</option>
                        <option value="AS">Variedad</option>
                        <option value="GRM">Gramo</option>
                        <option value="PR">Par</option>
                        <option value="DPC">Docenas de piezas</option>
                        <option value="xun">Unidad</option>
                        <option value="DAY">Día</option>
                        <option value="XLT">Lote</option>
                        <option value="10">Grupos</option>
                        <option value="MLT">Mililitro</option>
                        <option value="E54">Viaje</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <button type="button" class="btn btn-info btn-block btnEditarInformacionProducto" ideProducto>Guardar cambios</button>

          </div>

          <!--Edición de lotes-->
          <div class="tab-pane fade" id="product-lotes" role="tabpanel" aria-labelledby="product-lotes-tab">
            <div class="col-sm-12">
              <h3>Lista de lotes:</h3>
            </div>

            <div class="row">
              <!-- <input type="text" id="stockProductoGeneral" dispon hidden> -->
              <input type="hidden" id="infoLoteProducto" readonly>
              <div class="col-md-12">
                <table class="table table-bordered table-striped dt-responsive" style="width: 100%;">
                  <thead>
                    <tr>
                      <th id="ocultarTHfecha">Fecha</th>
                      <th >Proveedor</th>
                      <th >Costo</th>
                      <th>Cantidad</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="bodyLotes">
                  </tbody>
                </table>
              </div>
            </div> 
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-info float-right btnMostrarTodosLotes" sku>Ver todos</button>
              </div>
            </div>

            <hr>                

            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-secondary btnLoteAgregar float-right">
                  <i class="fas fa-truck-loading"></i>
                  Agregar lote
                </button> 
              </div>
            </div>

            <div>
              <form id="formNuevoLote" accept-charset="utf-8" style="display: none;">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <h5 class="titprod"> Número de piezas:</h5>
                      <div class="input-group">
                        <input type="text" class="form-control input-lg" id="LotenPiezas" required>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <h5 class="titprod"> Costo del lote por pieza: </h5>
                      <div class="input-group">
                        <input type="text" class="form-control input-lg" id="LotenCosto" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <h5 class="titprod"> Proveedor:</h5>
                      <div class="input-group">
                        <select id="LotenProveedor" class="form-control input-lg">
                          <option value="">Selecciona el proveedor...</option>
                          <?php
                            $item = NULL;
                            $valor = NULL;

                            $respuesta = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                            foreach ($respuesta as $key => $value) {
                                
                                echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <h5 class="titprod"> Folio de factura:</h5>
                      <div class="input-group">
                        <input type="text" class="form-control input-lg" id="LotenFactura">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <h5 class="titprod"> Precio Sugerido:</h5>
                      <div class="input-group">
                        <input type="number" step="0.01" class="form-control input-lg" id="p_sugerido">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <button type="submit" class="btn btn-block btn-success btnNuevoLote" sku="">GUARDAR</button>
                  </div>
              </form>
            </div>

          </div>

          <!-- Edicion de lista de precios -->
          <div class="tab-pane fade" id="product-listado" role="tabpanel" aria-labelledby="product-listado-tab">
            <div class="col-sm-12">
              <h3>Precio Unitario:</h3>
            </div>

            <div class="row">
              <div class="col-md-12">
                <table style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Cantidad</th>
                      <th>Precio Unidad</th>
                      <th>Precio Promoción</th>
                      <th>Activar promo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="bodyListadoUnitario">
                  </tbody>
                </table>
              </div>
            </div>

            <hr>
            <!-- Lista de precios -->
            <div class="col-sm-12">
              <h3>Precios de mayoreo:</h3>
            </div>

            <div class="row">
              <div class="col-md-12">
                <table class="table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Cantidad</th>
                      <th>Precio Unidad</th>
                      <th></th> 
                    </tr>
                  </thead>
                  <tbody id="bodyListado">
                  </tbody>
                </table>
              </div>
            </div>

            <hr>

            <button type="button" class="btn btn-info btn-block btnListadoAgregar mt-2" >Agregar precio a lista de precios</button>

            <br>

            <div>
              <form id="formNuevoPrecioListadoProducto" accept-charset="utf-8" style="display: none;">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <h5 class="titprod"> Número de piezas:</h5>
                    <div class="input-group">
                      <input type="text" class="form-control input-lg" id="ListadonPiezas" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <h5 class="titprod"> Precio de venta por pieza:</h5>
                    <div class="input-group">
                      <input type="text" class="form-control input-lg" id="ListadonCosto" required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <button type="submit" class="btn btn-block btn-success btnNuevoListado" modelo="">GUARDAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--====  End of MOSTRAR DETALLES DEL PRODUCTO  ====-->

<!--============================================
=            MODAL AGREGAR DERIVADO            =
=============================================-->

<div class="modal fade" id="modalAgregarDerivado">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

     <form id="formCrearProductoDerivado" accept-charset="utf-8">
      <!-- ENCABEZADO DEL MODAL -->
      <div class="modal-header" style="background: #343A40; color:white;">
        <h4 class="modal-title">Crear Derivación del Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">

        <div class="row">

          <!-- Modelo -->
          <div class="col-md-6 mb-3">
            <h5 class="titprod"> Modelo:</h5>
            <div class="input-group">
              <div id="inputname" class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fas fa-barcode"></i>
                </span>
              </div>
              <input type="text" class="form-control input-lg" name="ProductonModelo" id="ProductodModelo" readonly required>

              <input type="hidden" id="ProductodIdEmpresa" value="<?php echo $_SESSION["idEmpresa_dashboard"] ?>">
              <input type="hidden" id="ProductodAlias" value="<?php echo $_SESSION["aliasEmpresa_dashboard"] ?>">
              <input type="hidden" id="ProductodAleatorio" value="">
            </div>
          </div>

          <!-- Nombre -->
          <div class="col-md-6 mb-3">
            <h5 class="titprod"> Nombre:</h5>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-tshirt"></i>
                </span>
              </div>
              <input type="text" class="form-control input-lg" id="ProductodNombre"  placeholder="Escribe nombre del producto..." required>
            </div>
          </div>

        </div>

        <!-- Descripción -->
        <h5 class="titprod"> Descripción:</h5>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="fas fa-list"></i>
            </span>
          </div>
          <textarea class="form-control input-lg" id="ProductodDescripcion" row="2" placeholder="Escribe la descripción del producto"></textarea>
        </div> 


        <!-- Piezas, Costo y Costo de envío  -->
        <div class="row">
            
          <div class="col-md-6 mb-3">
            <h5 class="titprod">No. de Piezas:</h5>
            <div class="input-group">
              <div id="inputname" class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-hashtag"></i>
                </span>
              </div>
              <input text="number" class="form-control input-lg" id="ProductodStock" placeholder="Número piezas" min="0" required>

            </div>
          </div>

          <div class="col-md-6 mb-3">
            <h5 class="titprod">Costo por pieza (Lote):</h5>
            <div class="input-group">
              <div id="inputname" class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-dollar-sign"></i>
                </span>
              </div>
              <input text="number" class="form-control input-lg" id="ProductodCosto" placeholder="Costo de 1 pieza" min="0" required>
            </div>
          </div>

        </div>

        <hr>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xs-8">
              <h4 class="text-center">Caracteristicas</h4>
            </div>
            <div class="col-md-4 col-xs-4">
               <button type="button" class="chose-img btn btn-secondary btn-block btnAgregarDCaracteristica" style="margin-bottom: 5px;"> 
              <i class="fas fa-plus"></i>  
                  Agregar
                </button>
            </div>
          </div>
        </div>


        <!-- Caracteristicas (Talla y Color) -->
        
        <div class="container dCaracteristica"></div>
        <input type="hidden" id="dListaAgregado">
        <hr>

        <div class="row">
          <!-- Factura -->
          <div class="col-md-6">
            <h5 class="titprod"> Folio de la factura:</h5>
            <div class="input-group mb-3">
              <input type="text" class="form-control input-lg" id="ProductodFactura" placeholder="Folio">
            </div>
          </div>

          <!-- Proveedor -->
          <div class="col-md-6">
            <h5 class="titprod"> Proveedor:</h5>
            <div class="input-group mb-3">
              <select class="form-control input-lg" id="ProductodProveedor">
                <option value="">Selecciona el proveedor...</option>
                <?php
                  $item = NULL;
                  $valor = NULL;

                  $respuesta = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                  foreach ($respuesta as $key => $value) {
                      
                      echo '<option value="'.$value["nombre"].'">'.$value["nombre"].'</option>';
                  }

                ?>
              </select>
            </div>
          </div>
        </div>

        <hr>
        
        <!-- DATOS DE ENVIO -->
        
        <div class="card-tools">
          <div class="row">
            <div class="col-md-11">
              <h5 class="titimg">Datos de envío</h5>  
            </div>
            <div class="col-md-1">
              <input type="checkbox" 
                id="btn-mendesEnvioDerivado"   
                data-toggle="collapse" 
                href="#collapseEnvioDerivado" 
                role="button" 
                aria-expanded="false" 
                aria-controls="collapseEnvioDerivado">
                <label for="btn-mendesEnvioDerivado" class="lbl-menuEnvioDerivado">
                  <span id="sp1EnvioDerivado"></span>
                  <span id="sp2EnvioDerivado"></span>
                </label>
            </div>
          </div>
        </div>

        <div class="collapse" id="collapseEnvioDerivado">
          <div class="container">
            <div class="row">
              <div class="col-md-4 mb-3">
                <h5 class="titprod">Largo (cm):</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-box-open"></i>
                    </span>
                  </div>
                  <input text="text" class="form-control input-lg" id="ProductodMedidasLargo" placeholder="Medidas por pza.">
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <h5 class="titprod">Ancho (cm):</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-box-open"></i>
                    </span>
                  </div>
                  <input text="text" class="form-control input-lg" id="ProductodMedidasAncho" placeholder="Medidas por pza.">
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <h5 class="titprod">Alto (cm):</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-box-open"></i>
                    </span>
                  </div>
                  <input text="text" class="form-control input-lg" id="ProductodMedidasAlto" placeholder="Medidas por pza.">
                </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md-6 mb-3">
                <h5 class="titprod">Peso (kg):</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-weight"></i>
                    </span>
                  </div>
                  <input text="text" class="form-control input-lg" id="ProductodPeso" placeholder="Peso por pza.">
                </div>
              </div>
            </div>
          </div>
        </div> 

        <!-- Datos para facturar producto (SAT) -->
        <hr>

        <div class="card-tools">
          <div class="row">
            <div class="col-md-11">
              <h5 class="titimg">Datos para facturar (SAT)</h5>  
            </div>
            <div class="col-md-1">
              <input type="checkbox" 
                id="btn-mendesSAT"   
                data-toggle="collapse" 
                href="#collapseSAT" 
                role="button" 
                aria-expanded="false" 
                aria-controls="collapseSAT">
                <label for="btn-mendesSAT" class="lbl-menuSAT">
                  <span id="sp1SAT"></span>
                  <span id="sp2SAT"></span>
                </label>
            </div>
          </div>
        </div>

        <div class="collapse" id="collapseSAT">
          <div class="container">
            <div class="row">
              <div class="col-md-6 mb-3">
                <h5 class="titprod">Clave productos y servicios</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-box-open"></i>
                    </span>
                  </div>
                  <input text="text" class="form-control input-lg" id="ProductodClaveProdServ" placeholder="Ej. 01010101">
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <h5 class="titprod">Clave Unidad</h5>
                <div class="input-group">
                  <div id="inputname" class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="fas fa-box-open"></i>
                    </span>
                  </div>
                  <select class="form-control input-lg" id="ProductodClaveUnidad">
                    <option value="" disabled>Seleccionar clave</option>
                    <option value="H87" selected>Pieza</option>
                    <option value="EA">Elemento</option>
                    <option value="E48">Unidad de servicio</option>
                    <option value="ACT">Actividad</option>
                    <option value="KGM">Kilogramo</option>
                    <option value="E51">Trabajo</option>
                    <option value="A9">Tarifa</option>
                    <option value="MTR">Metro</option>
                    <option value="AB">Paquete a granel</option>
                    <option value="BB">Caja base</option>
                    <option value="KT">Kit</option>
                    <option value="SET">Conjunto</option>
                    <option value="LTR">Litro</option>
                    <option value="XBX">Caja</option>
                    <option value="MON">Mes</option>
                    <option value="HUR">Hora</option>
                    <option value="MTK">Metro cuadrado</option>
                    <option value="11">Equipos</option>
                    <option value="MGM">Miligramo</option>
                    <option value="XPK">Paquete</option>
                    <option value="XKI">Kit(Conjunto de piezas)</option>
                    <option value="AS">Variedad</option>
                    <option value="GRM">Gramo</option>
                    <option value="PR">Par</option>
                    <option value="DPC">Docenas de piezas</option>
                    <option value="xun">Unidad</option>
                    <option value="DAY">Día</option>
                    <option value="XLT">Lote</option>
                    <option value="10">Grupos</option>
                    <option value="MLT">Mililitro</option>
                    <option value="E54">Viaje</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>         

      </div>

      <!-- FOOTER DEL MODAL -->
      <div class="modal-footer justify-content-between" style="background: #343A40; color:white;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

     </form>
    </div>
  </div>
</div>

<!--====  End of MODAL AGREGAR DERIVADO  ====-->

<!--========================================================================
=            MODAL VER LISTADO DE PRECIO DE PRODUCTO EN ALMACEN            =
=========================================================================-->

<div class="modal fade" id="modalListadoPrecioAlmacen">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- ENCABEZADO DEL MODAL -->
      <div class="modal-header" style="background: #343A40; color:white;">
        <h4 class="modal-title">Listado de precio rosado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">
        <table class="table table-hover" style="width: 100%;">
          <thead>
            <tr>
              <th>
                Cantidad
              </th>
              <th>
                Precio Unidad
              </th>
              <th>
                Precio Promoción.
              </th>
              <th>
                Activar promo
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody id="tbodyListadoAlmacen">
            
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<!--====  End of MODAL VER LISTADO DE PRECIO DE PRODUCTO EN ALMACEN  ====-->


<!--==================================================
=            MODAL AGREGAR LOTE A ALMACEN            =
===================================================-->
  
<div class="modal fade" id="modalAgregarProductoEmbarcación">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- ENCABEZADO DEL MODAL -->
      <div class="modal-header" style="background: #343A40; color:white;">
        <h4 class="modal-title">Agregar producto a embarcación</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- CUERPO DEL MODAL -->
      <div class="modal-body">
        <div class="row">

          <div class="col-md-12">
            <p id="stockDisponibleTXT" style="text-align: center; color: red;"></p>
          </div>

          <div class="col-md-12 mb-3">
            <h5 class="titprod">Stock</h5>
            <div class="input-group">
              <div id="inputname" class="input-group-prepend">
              </div>
              <input text="text" class="form-control input-lg" id="ProductoStockAlmacen" stockDisponible idAlmacen idProducto>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer justify-content-between" style="background: #343A40; color:white;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btnCargarProductoEmbarque">Guardar</button>
      </div>

    </div>
  </div>
</div>
  
<!--====  End of MODAL AGREGAR LOTE A ALMACEN  ====-->
<style>
  .textbienvenida{
      font-size: 2.5rem;
      font-weight: bold;
  }
</style>