@extends('layouts.main')

@section('content')

	<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Productos</h1>
            <p class="breadcrumb-custom"><a href="{{ route('el-gran-camaron') }}">Principal</a> <span class="mx-2">&gt;</span> <span>Productos</span></p>
          </div>
        </div>
      </div>
    </div>

    <!-- SEARCH BAR -->
    <div style="background-color: #FF7231; max-height: 40px;" class="site-section">
      <div style="margin-top: -20px;" class="container">
        <form method="POST" action="{{ route('buscar-producto') }}">
          @csrf
          <div class="container-search">
              <input class="input-search" type="search" id="search" name="search" placeholder="Buscar producto..." />
              <button class="icon-search my-icon"></button>
          </div>
        </form>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          @if(count($products) == 0)
            <h4 style="margin: 0 auto; text-align: center;">No se encontraron productos que coincidan con la búsqueda.<a href="{{url('productos',Crypt::encrypt('all'))}}"> </br> Ver todos</a></h4>
          @else
            @foreach($products as $product)
              <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                  <img style="width: 400px; height: 300px;" src="../storage/{{ $product->image }}" alt="Image" class="img-fluid">
                  <h2 class="font-size-regular"><a style="cursor: auto;" href="#">{{ $product->name }}</a></h2>
                  <div class="meta mb-4"></span>{{ $product->category }}<span class="mx-2">&bullet;</span> <a href="{{url('cotizacion',Crypt::encrypt($product['id']))}}">Cotizar</a></div>
                  <p>{{ $product->description }}</p>
                </div> 
              </div>
            @endforeach
          @endif
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