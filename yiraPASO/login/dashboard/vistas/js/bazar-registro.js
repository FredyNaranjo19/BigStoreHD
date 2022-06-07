/*==========================================================
=            MOSTRAR SUBCATEGORIAS DE CATEGORIA            =
==========================================================*/

$(document).on("change", "#ProductonCategoriaBazar", function(){

    var idBazarCategoria = $(this).val();
  
    $("#ProductonSubcategoriaBazar").children().remove();
  
    var datos = new FormData();
    datos.append("idBazarCategoria", idBazarCategoria);
    // var slec = "";
  
    $.ajax({
      url: "../items/mvc/ajax/dashboard/bazar-registro.ajax.php", 
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
  
        $("#ProductonSubcategoriaBazar").append('<option value="">Seleccionar subcategoria</option>');
  
        for (var i = 0; i < respuesta.length; i++) {
          
          $("#ProductonSubcategoriaBazar").append('<option value="'+ respuesta[i]["id_subcategoria"] +'">'+ respuesta[i]["nombre_subcategoria"] +'</option>');
  
        }
  
      }
    })
  
})
  
  /*=====  End of MOSTRAR SUBCATEGORIAS DE CATEGORIA  ======*/

  /*==========================================================
=            MOSTRAR MUNICIPIOS DE LOS ESTADOS            =
==========================================================*/

$(document).on("change", "#selectEstado", function(){

  var idMunicipio = $(this).val();

  $("#selectMunicipio").children().remove();

  var datos = new FormData();
  datos.append("idMunicipio", idMunicipio);
  // var slec = "";

  $.ajax({
    url: "../items/mvc/ajax/dashboard/bazar-registro.ajax.php", 
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

      $("#selectMunicipio").append('<option value="">Seleccionar municipio</option>');

      for (var i = 0; i < respuesta.length; i++) {
        
        $("#selectMunicipio").append('<option value="'+ respuesta[i]["id"] +'">'+ respuesta[i]["nombre"] +'</option>');

      }

    }
  })

})

/*=====  End of MOSTRAR MUNICIPIOS DE LOS ESTADOS  ======*/


  $(document).on("click", "#registrarEmpresaCV", function(){
    
    var idBazarCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idBazarCategoria", idBazarCategoria);
    // var slec = "";
  
    $.ajax({
      url: "../items/mvc/ajax/dashboard/bazar-registro.ajax.php", 
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
  
       console.log(respuesta)
  
      }
    })
  })
  

