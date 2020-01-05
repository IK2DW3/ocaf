@extends('layouts.master')

@section('content')

<div class="contenedor">
    <div class="tarjeta">
        <div class="row">
            @foreach( $arrayCarta as $key => $carta )
            <div class="col-sm-4 colcard colcard-img">
                @if ($carta->imgRuta == '' || $carta->imgRuta == null)
                    <img src="../../resources/img/imglogo.svg" class="card-img-top" alt="No encontrado" title="No encontrado" style="height:200px">
                @else
                    <img src="../../resources/img/cartas/{{$carta->imgRuta}}" class="card-img-top" alt="{{$carta->nombre}}" title="{{$carta->nombre}}" style="height:250px; width:220px;">
                @endif
            </div>
            <div class="col-sm-8 colcard colcard-info">

                {{-- TODO: Datos de la película --}}
                <h1><?php echo $carta->nombre . ' ' . $carta->apellido ?></h1>
                <h2>Fecha Nacimiento: <?php echo $carta->fechaNacimiento ?></h2>
                <h2>Fecha de muerte:
                    <?php
                        if ($carta->fechaMuerte != '') {
                            echo $carta->fechaMuerte;
                        } else {
                            echo 'N/A';
                        }
                    ?>
                </h2>
                <h3>Ambito: <?php echo $carta->ambitoEsp ?></h3>
                <br>
                <p><strong>Resumen: </strong><?php echo $carta->loreEsp ?></p>
                <br>

            </div>
            @endforeach
        </div>
    </div>
</div>

@stop
