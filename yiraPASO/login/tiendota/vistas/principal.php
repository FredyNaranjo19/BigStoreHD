<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Store</title>
    <link rel="icon" type="image/png" href="vistas/img/icons/iconxd.png"/> 

<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vistas/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vistas/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/vendor/slick/slick.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vistas/css/util.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/main.css">
<!--===============================================================================================-->
</head>

<body class="animsition">
    <?php
    include 'modulos/fix/navbar.php';
    ?>
    <?php
        if (isset($_GET["ruta"])) {
		
            if ($_GET['ruta'] == "inicio" ||
                $_GET['ruta'] == "busqueda"||
                $_GET['ruta'] == "empresa"||
                $_GET['ruta'] == "empresas"||
                $_GET['ruta'] == "categorias"||
                $_GET['ruta'] == "categoria"||
                $_GET['ruta'] == "productodetalle") {
                
                include 'modulos/'.$_GET["ruta"].'.php';
    
            } else {
                include 'modulos/404error.php';
            }
     
        } else {
            include 'modulos/inicio.php';
        }
    ?>

    <?php
    include 'modulos/fix/footer.php';
    ?>

   
<!--===============================================================================================-->   
        <script src="vistas/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
        <script src="vistas/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
        <script src="vistas/vendor/bootstrap/js/popper.js"></script>
        <script src="vistas/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
        <script src="vistas/vendor/select2/select2.min.js"></script>
        <script>
            $(".js-select2").each(function(){
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            })
        </script>
<!--===============================================================================================-->
        <script src="vistas/vendor/daterangepicker/moment.min.js"></script>
        <script src="vistas/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
        <script src="vistas/vendor/slick/slick.min.js"></script>
        <script src="vistas/js/slick-custom.js"></script>
<!--===============================================================================================-->
        <script src="vistas/vendor/parallax100/parallax100.js"></script>
        <script>
            $('.parallax100').parallax100();
        </script>
<!--===============================================================================================-->
        <script src="vistas/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
        <script>
            $('.gallery-lb').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled:true
                    },
                    mainClass: 'mfp-fade'
                });
            });
        </script>
<!--===============================================================================================-->
        <script src="vistas/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
        <script src="vistas/vendor/sweetalert/sweetalert.min.js"></script>
        <script>
            $('.js-addwish-b2').on('click', function(e){
                e.preventDefault();
            });

            $('.js-addwish-b2').each(function(){
                var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
                $(this).on('click', function(){
                    swal(nameProduct, "Fue agregado a tus me gusta", "De manera exitosa");

                    $(this).addClass('js-addedwish-b2');
                    $(this).off('click');
                });
            });

            $('.js-addwish-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

                $(this).on('click', function(){
                    swal(nameProduct, "Fue agregado a tus me gusta", "De manera exitosa");

                    $(this).addClass('js-addedwish-detail');
                    $(this).off('click');
                });
            });

            /*---------------------------------------------*/

            $('.js-addcart-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "Fue agregado al carrito", "De manera exitosa");
                });
            });
        
        </script>
<!--===============================================================================================-->
        <script src="vistas/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script>
            $('.js-pscroll').each(function(){
                $(this).css('position','relative');
                $(this).css('overflow','hidden');
                var ps = new PerfectScrollbar(this, {
                    wheelSpeed: 1,
                    scrollingThreshold: 1000,
                    wheelPropagation: false,
                });

                $(window).on('resize', function(){
                    ps.update();
                })
            });
        </script>
<!--===============================================================================================-->
        <script src="vistas/js/main.js"></script>
   
</body>
</html>