@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
@endsection

@section('content')
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #007ED8 !important;" class="m-0 font-weight-bold text-primary">Datos del Producto a eliminar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form style="margin: 0 auto;" class="form-login" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header card-header-primary text-center">
                  <div class="social-line">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i style="color: #007ED8;" class="fa fa-fw fa-user"></i>
                                </span>
                            </div>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre del producto..." value="{{ $product->name }}" disabled>

                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong style="color: red; font-size: 0.9em;">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                      <label class="col-md-12 control-label" style="text-align: center;">Categoría</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i style="color: #007ED8;" class="fa fa-fw fa-bars"></i>
                              </span>
                          </div>
                          <select type="text" id="category" name="category" class="form-control" disabled>
                            @foreach($categories as $category)
                                @if($category->id == $product->id_category)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>                
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="descripcion" class="col-md-12 control-label" style="text-align: center;">Descripción</label>

                        <div class="col-md-12">
                            <textarea id="description" type="text" class="form-control" name="description" placeholder="Text something here..." disabled rows="4" cols="50">{{ $product->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <label class="col-md-12 control-label" style="text-align: center;">Imagen</label>

                    <img style="width: 300px; height: 300px; padding: 30px;" src="../storage/{{ $product->image }}" />

                  </div>
                </div>
                <br>
                <div class="footer text-center">
                    <button style="color: #007ED8;" type="submit" class="btn btn-outline-dark"><i style="color: #007ED8;" class="fa fa-fw fa-trash"></i> Eliminar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection