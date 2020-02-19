@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-start justify-content-center contenido blog-body m-0 p-2">
            <div class="col-sm-12 col-md-8 blog-section mx-1">
                <div class="row">
                    <div class="col-sm-12 px-3">
                        <div class="card blog-article-principal">
                            <div class="card-body">
                                <h2 class="card-title titulo-principal">{{Str::limit($data['post']->titulo,80)}}</h2>
                                <p class="card-text text-principal"><strong>Categoria:</strong> {{Str::limit($data['post']->descripcion,80)}}</p>
                                <p class="card-text text-info"><strong>Autor:</strong> {{$data['post']->categoria->nombre}}</p>
                                <p class="card-text text-info"><strong>Categoria:</strong> {{$data['post']->categoria->nombre}}</p>
                                <p class="card-text text-info"><strong>Publicado el:</strong>  {{$data['post']->created_at}}</p>
                                <a href="#" class="btn btn-success">Leer más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-sm-12 my-3">
                        <h3>Últimas publicaciones</h3>
                    </div>
                    @foreach( $data['posts'] as $key => $posts )
                    <div class="col-sm-6 col-md-4 col-lg-3 px-3 pt-2 pb-1">
                        <div class="card blog-article">
                            <div class="card-body">
                                <h5 class="card-title titulo-principal">{{Str::limit($posts->titulo,30)}}</h5>
                                <p class="card-text"><strong>Categoria:</strong> {{$posts->categoria->nombre}}</p>
                                <p class="card-text"><strong>Publicado el:</strong>  {{$posts->created_at}}</p>
                                <a href="#" class="btn btn-primary">Leer más</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12 col-md-2 blog-aside mx-1">
                <div class="row">
                    <div class="col-sm-12 px-3 pt-2 pb-1"><h4 class="text-center">Navegador</h4></div>
                    <div class="col-sm-12 px-3 pt-2 pb-1">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control blog-busqueda" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button">&#128269;</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="list-group">
                            @foreach( $data['categorys'] as $key => $categoria )
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{$categoria->nombre}}
                                <span class="badge badge-warning badge-pill">{{$categoria->numero_posts}}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop