@extends('layouts.dashboard')

@section('head-content')
    <h1 class="h3 mb-0 text-gray-800">Cotizaciones</h1>
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
              <h6 style="text-align: center; color: #007ED8 !important;" class="m-0 font-weight-bold text-primary">Cotizaciones del sistema</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre y Apellido</th>
                      <th>Email</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($quotes as $quote)
                        <tr>
                            <td>{{ $quote['name'] }} {{ $quote['lastname'] }}</td>
                            <td>{{ $quote['email'] }}</td>
                            <td>
                                <a target="_blank" href="{{url('ver-cotizacion',Crypt::encrypt($quote['id']))}}"><i style="color: #007ED8;" class="fa fa-fw fa-eye"></i></a>
                                <a href="{{url('eliminar-usuario',Crypt::encrypt($quote['id']))}}"><i style="color: #007ED8;" class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($quotes) == 0)
                        <tr>
                            <td>No hay cotizaciones registradas aún</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection