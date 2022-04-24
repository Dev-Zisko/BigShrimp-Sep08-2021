@extends('layouts.main')

@section('content')

	<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Cotización</h1>
            <p class="breadcrumb-custom"><a href="{{ route('el-gran-camaron') }}">Principal</a> <span class="mx-2">&gt;</span> <span>Cotización</span></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">

      <h5 style="text-align: center;">Formulario de Cotización</h5>

      <div class="container-quotation container">
        <form method="POST" class="p-5 bg-white">
             @csrf
              <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black label-bold" for="fname">Nombres</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Nombres..." required>
                </div>
                <div class="col-md-6">
                  <label class="text-black label-bold" for="lname">Apellidos</label>
                  <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Apellidos..." required>
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('name') }}</strong>
                    </span>
                @endif

                @if ($errors->has('lastname'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
              </div>

              <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                
                <div class="col-md-12">
                  <label class="text-black label-bold" for="email">Correo Electrónico</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="Correo elétronico..." required>
                </div>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="row form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                
                <div class="col-md-12">
                  <label class="text-black label-bold" for="subject">Número de teléfono</label> 
                  <input type="text" id="cellphone" name="cellphone" class="form-control" placeholder="Número de teléfono..." required>
                </div>

                @if ($errors->has('cellphone'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('cellphone') }}</strong>
                    </span>
                @endif
              </div>

              <div class="row form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                
                <div class="col-md-12">
                  <label class="text-black label-bold" for="subject">RIF o Número de identificación</label> 
                  <input type="text" id="rif" name="rif" class="form-control" placeholder="RIF o Número de identificación..." required>
                </div>

                @if ($errors->has('rif'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('rif') }}</strong>
                    </span>
                @endif
              </div>

              <div class="row form-group{{ $errors->has('business') ? ' has-error' : '' }}">
                
                <div class="col-md-12">
                  <label class="text-black label-bold" for="subject">Nombre de la empresa</label> 
                  <input type="text" id="business" name="business" class="form-control" placeholder="Nombre de la empresa..." required>
                </div>

                @if ($errors->has('business'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('business') }}</strong>
                    </span>
                @endif
              </div>

              <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  <label class="text-black label-bold" for="message">Dirección</label> 
                  <textarea type="text" name="address" id="address" cols="30" rows="7" class="form-control" placeholder="Dirección..." required></textarea>
                </div>

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('address') }}</strong>
                    </span>
                @endif
              </div>

              <div class="row form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  <label class="text-black label-bold" for="message">Mensaje</label> 
                  <textarea type="text" name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Escribe tu mensaje acá..."></textarea>
                </div>

                @if ($errors->has('message'))
                    <span class="help-block">
                        <strong style="color: red; font-size: 0.9em;">{{ $errors->first('message') }}</strong>
                    </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                  <label class="text-black label-bold" for="message">Seleccionar y buscar productos a añadir</label> 
                  <div style="width: 80%;" class="input-group mb-3">
                      <select type="text" id="products" name="products[]" class="standardSelect"
                      multiple>
                          @foreach($products as $product)
                              <option value="{{ $product->name }}">{{ $product->name }}</option>
                          @endforeach
                      </select>

                      @if ($errors->has('products'))
                          <span class="help-block">
                              <strong style="color: red;">{{ $errors->first('products') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div style="width: 90%; margin-top: -46px; margin-left: 80%;" class="row">
                      <div class="col-md-12">
                          <button style="background: #FF7231; border-radius: 5px; width: 20%;" name="add" id="add" type="button" class="btn btn-sm btn-secondary" onclick="addProduct()">+ Añadir</button>
                      </div>
                  </div>
              </div>
            
              <div class="card">
                  <div class="card-header">
                      Lista de Producto(s) a cotizar
                  </div>

                  <div class="card-body">
                      <table class="table" id="products_table">
                          <thead>
                          <tr>
                              <th>Producto</th>
                              <th>Cantidad</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                  </div>
              </div>

              <div style="margin-top: 30px; text-align: center;" class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Envíar Cotización" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>
  
            </form>
      </div>
    </div>

@endsection

@section('scripts')

  <script type="text/javascript">

    var i = 1;

    function loadProducts(){
        const products = @json($productsSelected);

        for (product of products) {
            $('#products_table')
            .append('<tr id="row'+i+'">' +
            '<td><input id="" name="" class="form-control" type="text" value="'+product.name+'" disabled /></td>' +
            '<td><input id="quantity" name="quantity[]" class="form-control" type="number" required /></td>' +
            '<td><a class="delete-product" type="button" style="color: red;" name="delete" id="delete" onclick="deleteProduct('+i+')">Eliminar</a></td>' +
            '<td style="width: 1px; height: 1px;"><input id="prod" name="prod[]" class="form-control" type="hidden" value="'+product.name+'" required /></td>' +
            '</tr>');
            i++;
        }
        
    }

    function addProduct(){
      var select = $('#products').val();
      var productsSelected = JSON.stringify(select);
      if (productsSelected != "[]") {
        productsSelected = productsSelected.replace('[','');
        productsSelected = productsSelected.replace(/['"]+/g, '');
        productsSelected = productsSelected.replace(']','');
        productsSelected = productsSelected.split(",");
        for (var j=0; j < productsSelected.length; j++) {
          $('#products_table')
          .append('<tr id="row'+i+'">' +
          '<td><input id="" name="" class="form-control" type="text" value="'+productsSelected[j]+'" disabled /></td>' +
          '<td><input id="quantity" name="quantity[]" class="form-control" type="number" required /></td>' +
          '<td><a class="delete-product" type="button" style="color: red;" name="delete" id="delete" onclick="deleteProduct('+i+')">Eliminar</a></td>' +
          '<td style="width: 1px; height: 1px;"><input id="prod" name="prod[]" class="form-control" type="hidden" value="'+productsSelected[j]+'" required /></td>' +
          '</tr>');
          i++;
        }
        $('#products').val('').trigger('chosen:updated');
      } else {
        alert("Por favor seleccione algún producto para añadir.");
      }
    }

    function deleteProduct(index){
      if(index == 0){
        //
      }else{
        $('#row'+index).remove();
      }
    }
  </script>

@endsection