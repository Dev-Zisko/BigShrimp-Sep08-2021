@extends('layouts.messages')

@section('content')

      <h3 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">{{ $messagePage }}</h3>

      <p class="breadcrumb-custom"><a href="{{url('cotizacion',Crypt::encrypt('all'))}}">Regresar</a></p>

@endsection