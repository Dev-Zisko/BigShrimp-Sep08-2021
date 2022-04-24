@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Categorías</h1>

    <a href="{{ route('crear-categoria') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Crear categoría</a>
@endsection

@section('content')
          @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('message')}}
            </div>
          @endif
          @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{Session::get('error')}}
            </div>
          @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 style="text-align: center; color: #007ED8 !important;" class="m-0 font-weight-bold text-primary">Categorías del sistema</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre de la categoría</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category['name'] }}</td>
                            <td>
                                <a href="{{url('actualizar-categoria',Crypt::encrypt($category['id']))}}"><i style="color: #007ED8;" class="fa fa-fw fa-edit"></i></a>
                                <a href="{{url('eliminar-categoria',Crypt::encrypt($category['id']))}}"><i style="color: #007ED8;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($categories) == 0)
                        <tr>
                            <td>No hay categorías registradas aún</td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection