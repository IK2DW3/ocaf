@extends('layouts.master')

@section('content')


    <div class="contenedor">
        <div class="row align-items-start justify-content-center contenido blog-body m-0 p-2">
            <div class="col-sm-12 col-md-8 blog-section mx-1">
                <div class="row">
                    <div class="col-sm-12 px-3 pt-2 pb-1">
                        <div class="card blog-post">
                            <div class="card-body">
                                <h5 class="card-title titulo-principal">{{Str::limit($data['post']->titulo)}}</h5>
                                @if ($data['post']->imagen != null || $data['post']->imagen != '')
                                <div class="row">
                                    <div class="card-body blog-post-img">
                                        <img src="../../../resources/img/posts/{{$data['post']->imagen}}" class="card-img-top" alt="Imagen representativa" title="{{$data['post']->titulo}}">
                                    </div>
                                </div>
                                @endif
                                <p class="card-text my-2">{{Str::limit($data['post']->descripcion)}}</p>
                                <div class="row align-items-center justify-content-center h-25">
                                    <div class="col-sm-12 col-md-5">
                                        <p class="card-text text-info"><strong>Categoria:</strong> {{$data['post']->categoria->nombre}}</p>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <p class="card-text text-info"><strong>&#x1F4C5;</strong>  {{$data['post']->created_at}}</p>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <p class="card-text text-info"><strong>&#x1F464;</strong> {{$data['post']->user->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                <div class="row my-3">
                    <div class="col-sm-12">
                        <h3>Dejar comentario</h3>
                    </div>
                    <div class="col-sm-12">
                        <form action="{{ url('/blog/post/comentar') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="hidden" name="post-postid-comment" value="{{$data['post']->id}}">
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="post-userid-comment" value="{{Auth::user()->id}}">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><img src="../../../resources/img/avatars/{{Auth::user()->avatar}}" alt="avatar" title="{{Auth::user()->name}}" width="30" height="30"></span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name="post-comment"></textarea>
                                <div class="input-group-append">
                                    <input class="btn btn-success" type="submit" value="Comentar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="row my-3">
                    <div class="col-sm-12">
                        <p>¿Tienes ya una cuenta? Inicia sesion <a href="{{route('login')}}">aquí</a> o <a href="{{route('login')}}">registrate</a>.</p>
                    </div>
                </div>
                @endauth
                <div class="row my-3">
                    @foreach( $data['comentarys'] as $key => $comentario )
                    <div class="col-sm-12 my-1">
                        <div class="card blog-comentary">
                            <div class="card-body blog-comentary-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-1 d-flex align-items-center justify-content-center h-100">
                                        <img src="../../../resources/img/avatars/{{$comentario->user->avatar}}" alt="avatar" title="{{$comentario->user->name}}" width="50" height="50">
                                    </div>
                                    <div class="col-sm-12 col-md-11">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-8">
                                                <p class="card-text text-info"><strong>{{$comentario->user->name}}</strong></p>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <p class="card-text text-info"><strong>&#x1F4C5;</strong> {{$comentario->created_at}}</p>
                                            </div>
                                            @if (Auth::check() && Auth::user()->rango_id === 1 || Auth::check() && Auth::user()->rango_id === 2)
                                            <div class="col-sm-12 col-md-1 d-flex align-items-start justify-content-center">
                                                <form action="{{ url('/blog/comentario/eliminar') }}" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="input-group">
                                                        <input type="hidden" name="post-postid-comment" value="{{$data['post']->id}}">
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="hidden" name="post-comment-id" value="{{$comentario->id}}">
                                                    </div>
                                                    <div class="input-group">
                                                        <input class="text-danger btn btn-comentario-eliminar p-0" type="submit" value="&#x274C;">
                                                    </div>
                                                </form>
                                            </div>
                                            @endif
                                            <div class="col-sm-12">
                                                <p class="card-text">{{$comentario->descripcion}}</p>
                                            </div>
                                        </div>                                        
                                    </div>
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