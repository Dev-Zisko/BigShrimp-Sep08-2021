<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Importadora y Exportadora | El Gran Camarón</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Importadora y Exportadora: El Gran Camarón, nos especializamos
    en traer los productos más importantes del sector....">

    <meta name="keywords" content="Importadora y Exportadora, Importadora, Exportadora, importadora y exportadora, el gran camaron, camaron, importadora el gran camaron, importadora y exportadora el gran camaron, etc...">

    <meta name="author" content="[Dev] Zisko" />

    <meta name="copyright" content="Importadora y Exportadora: El Gran Camarón" />

    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="{{ url('js/chosen/chosen.min.css') }}">
    
  </head>
  <body onload="loadProducts()">
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-3" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <img style="margin-top: 30px;" width="180px" height="180px" src="../images/newlogowhite.png">
            <!--
            <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0">Logistics</a></h1>
            -->
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="{{ route('el-gran-camaron') }}">Principal</a></li>
                <li><a href="{{ route('sobre-nosotros') }}">Sobre nosotros</a></li>
                <li class="has-children">
                  <a href="#">Productos</a>
                  <ul class="dropdown">
                    @if($categories != "Yes")
                      <li><a href="{{url('productos',Crypt::encrypt('all'))}}">Ver todos</a></li>
                      @foreach($categories as $category)
                        <li><a href="{{url('productos',Crypt::encrypt($category['id']))}}">{{ $category->name }}</a></li>
                      @endforeach
                    @else
                      <li><a href="#">Error al cargar datos del sistema</a></li>
                    @endif
                  </ul>
                </li>
                <li><a href="{{ route('contacto') }}">Contacto</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

    @yield('content')
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Quienes somos?</h2>
                <ul class="list-unstyled">
                  <li><a href="{{ route('sobre-nosotros') }}">Sobre nosotros</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Productos</h2>
                <ul class="list-unstyled">
                  <li><a href="{{url('productos',Crypt::encrypt('all'))}}">Ver productos</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Contacto</h2>
                <ul class="list-unstyled">
                  <li><a href="{{ route('contacto') }}">Contáctanos</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Nuestras redes</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Cotiza con nosotros</h2>
            <form method="GET" action="{{url('cotizacion',Crypt::encrypt('all'))}}">
              @csrf
              <div class="input-group mb-3">
                <div style="margin-left: 10px;" class="input-group-append">
                  <button class="btn btn-primary text-white" id="button-addon2">Cotizar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Plantilla creada con <i class="icon-heart" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank" >Colorlib</a>. Editada por [Dev] Zisko.
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  @yield('scripts')

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/aos.js"></script>

  <script src="../js/main.js"></script>

  <script src="{{ url('js/chosen/chosen.jquery.min.js') }}"></script>

  <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 1,
            no_results_text: "Producto no encontrado.",
            width: "100%"
        });
    });
  </script>
    
  </body>
</html>