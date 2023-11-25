@extends('layout')
@section('body-content')

@if (isset($pagina))
@include('componentes.banner')
@php
    echo $pagina->contenido;
@endphp
@include('componentes.footer')

@else
@include('componentes.inicio')
@endif
@endsection