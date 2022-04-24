@extends('layouts.main')

@section('content')

	<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Contáctanos</h1>
            <p class="breadcrumb-custom"><a href="{{ route('el-gran-camaron') }}">Principal</a> <span class="mx-2">&gt;</span> <span>Contacto</span></p>
          </div>
        </div>
      </div>
    </div>  

    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">

            

            <form action="#" class="p-5 bg-white">
             

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nombres</label>
                  <input type="text" id="fname" class="form-control" placeholder="Nombres...">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Apellidos</label>
                  <input type="text" id="lname" class="form-control" placeholder="Apellidos...">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Correo Electrónico</label> 
                  <input type="email" id="email" class="form-control" placeholder="Correo elétronico...">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="subject">Número de teléfono</label> 
                  <input type="number" id="phone" class="form-control" placeholder="Número de teléfono...">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Mensaje</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Escribe tu mensaje acá..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Envíar mensaje" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Dirección</p>
              <p class="mb-4">Av. Sur 11, de Junín a Páez, Casa N° 143, Urb San Agustín. Zona Postal 1010.</p>

              <p class="mb-0 font-weight-bold">Teléfonos</p>
              <p class="mb-4"><a href="#">(0212) 8982486</a></p>
              <p class="mb-4"><a href="tel:+584168130047">+58 4168130047</a></p>
              <p class="mb-4"><a href="tel:+584142495153">+58 4142495153</a></p>

              <p class="mb-0 font-weight-bold">Correo elétronico</p>
              <p class="mb-0"><a href="mailto:iegrancamaron@gmail.com">iegrancamaron@gmail.com</a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Para cotizar</h3>
              <p>Si deseas realizar alguna cotización de alguno de nuestros productos, por favor haz click en el botón de abajo.</p>
              <p><a href="{{url('cotizacion',Crypt::encrypt('all'))}}" class="btn btn-primary px-4 py-2 text-white">Cotizar</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')

  <script type="text/javascript">

    function loadProducts(){
        //
    }
  </script>
  
@endsection