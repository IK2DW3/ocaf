@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-start justify-content-center contenido blog-body m-0 p-2">
            <div class="col-sm-12 col-md-8 blog-section mx-1">
                @if ($data['post'] != null)
                <div class="row">
                    <div class="col-sm-12 px-3">
                        <div class="card blog-article-principal">
                            <div class="card-body">
                                <h2 class="card-title titulo-principal">{{Str::limit($data['post']->titulo,80)}}</h2>
                                <p class="card-text text-principal">{{Str::limit($data['post']->descripcion,80)}}</p>
                                <div class="row h-25">
                                    <div class="col-sm-12">
                                        <p class="card-text text-info"><strong>&#x1F464;</strong> {{$data['post']->user->name}}</p>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-center h-25">
                                    <div class="col-sm-12 col-md-5">
                                        <p class="card-text text-info"><strong>Categoria:</strong> {{$data['post']->categoria->nombre}}</p>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <p class="card-text text-info"><strong>&#x1F4C5;</strong>  {{$data['post']->created_at}}</p>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <a href="{{ url('blog/post/' . $data['post']->id ) }}" class="btn btn-success">Leer más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-sm-12 px-3">
                        <h2>No hay ninguna entrada que mostar</h2>
                    </div>
                </div>
                @endif
                <div class="row my-3">
                    <div class="col-sm-12 my-3">
                        <h3 class="blog-text-secundary">Últimas publicaciones</h3>
                    </div>
                    @foreach( $data['posts'] as $key => $posts )
                    <div class="col-sm-6 col-md-4 col-lg-3 px-3 pt-2 pb-1">
                        <div class="card blog-article">
                            @if (Auth::check() && Auth::user()->rango_id === 1 || Auth::check() && Auth::user()->rango_id === 2)
                            <div class="card-body pt-1">
                                <div class="row align-items-center justify-content-end pr-1">
                                    <div class="col-sm-2">
                                        <form action="{{ url('/blog/post/eliminar/' . $posts->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="input-group">
                                                <input class="text-danger btn btn-comentario-eliminar p-0" type="submit" value="&#x274C;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                            <div class="card-body">
                            @endif
                                <h5 class="card-title titulo-principal">{{Str::limit($posts->titulo,30)}}</h5>
                                <p class="card-text"><strong>Categoria:</strong> {{$posts->categoria->nombre}}</p>
                                <p class="card-text text-info"><strong>&#x1F4C5;</strong>  {{$posts->created_at}}</p>
                            </div>
                            <div class="card-footer blog-article-footer text-center">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-sm-10"><a href="{{ url('blog/post/' . $posts->id ) }}" class="btn btn-primary">Leer más</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12 col-md-2 blog-aside mx-1">
                <!-- Barra de navegacion lateral -->
                @include('layouts.blogaside')
            </div>
        </div>
    </div>


@stop