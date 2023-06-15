@include('componentes.slider')
@include('componentes.seccionpresentacion')
@foreach ($secciones as $item)
    @php
        echo $item->contenido;
    @endphp
@endforeach
@include('componentes.footer')