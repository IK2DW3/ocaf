@extends('layouts.master')

@section('content')

<div class="contenedor">
    <div class="tarjeta">
        <div class="row">
            @foreach( $arrayCarta as $key => $carta )
            <div class="col-sm-6 colcard colcard-img">
                @if ($carta->imgRuta == '' || $carta->imgRuta == null)
                    <img src="../../resources/img/imglogo.svg" class="card-img-top" alt="No encontrado" title="No encontrado" style="height:200px">
                @else
                    <img src="../../resources/img/cartas/{{$carta->imgRuta}}" class="card-img-top" alt="{{$carta->nombre}}" title="{{$carta->nombre}}" style="height:250px; width:220px;">
                @endif
            </div>
            <div class="col-sm-6 colcard colcard-info">

                {{-- TODO: Datos de la película --}}
                <h1><?php echo $carta->nombre . ' ' . $carta->apellido ?></h1>
                <p><strong>Fecha Nacimiento:</strong> <?php echo $carta->fechaNacimiento ?></p>
                <p><strong>Fecha de muerte:</strong>
                    <?php
                        if ($carta->fechaMuerte != '') {
                            echo $carta->fechaMuerte;
                        } else {
                            echo 'N/A';
                        }
                    ?>
                </p>
                <p><strong>Ambito:</strong> <?php echo $carta->ambitoEsp ?></p>
            </div>
            <div class="col-sm-12 colcard colcard-resumen">
                <p><strong>Resumen: </strong><?php echo $carta->loreEsp ?></p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop
