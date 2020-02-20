@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-start justify-content-center contenido blog-body m-0 p-2">
            <div class="col-sm-12 col-md-8 blog-section mx-1">
                <div class="row my-3">
                    <div class="col-sm-12 mt-2 mb-3">
                        <h3 class="blog-text-secundary">Resultados de búsqueda "{{$data['category']->nombre}}"</h3>
                    </div>
                    @foreach( $data['posts'] as $key => $posts )
                    <div class="col-sm-12 col-md-6 px-3 pt-2 pb-1">
                        <div class="card blog-article">
                            <div class="card-body">
                                <h5 class="card-title titulo-principal">{{Str::limit($posts->titulo,30)}}</h5>
                                <h5 class="card-subtitle mb-2 text-muted">{{Str::limit($posts->descripcion,50)}}</h5>
                                <p class="card-text"><strong>Categoria:</strong> {{$posts->categoria->nombre}}</p>
                                <p class="card-text text-info"><strong>&#x1F4C5;</strong>  {{$posts->created_at}}</p>
                            </div>
                            <div class="card-footer blog-article-footer text-center">
                                <div class="row">
                                    <div class="col-sm-10"><a href="{{ url('blog/post/' . $posts->id ) }}" class="btn btn-primary">Leer más</a></div>
                                    @if (Auth::user()->rango_id === 1 || Auth::user()->rango_id === 2)
                                    <div class="col-sm-2">
                                        <form action="{{ url('/blog/post/eliminar') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="input-group">
                                                <input type="hidden" name="post-postid-comment" value="{{$posts->id}}">
                                            </div>
                                            <div class="input-group">
                                                <input class="text-danger btn btn-comentario-eliminar p-0" type="submit" value="&#x274C;">
                                            </div>
                                        </form>
                                    </div>
                                    @endif
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