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
                <div class="row my-3">
                    <div class="col-sm-12">
                        <h3>Dejar comentario</h3>
                    </div>
                    @auth
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
                            </div>
                            <div class="input-group my-1">
                                <input class="btn btn-success" type="submit" value="Comentar">
                            </div>
                        </form>
                    </div>
                    @endauth
                </div>
                <div class="row my-3">
                    @foreach( $data['comentarys'] as $key => $comentario )
                    <div class="col-sm-12 my-1">
                        <div class="card blog-comentary">
                            <div class="card-body blog-comentary-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-1 d-flex align-items-center justify-content-center h-100">
                                        <img src="../../../resources/img/avatars/{{$comentario->user->avatar}}" alt="avatar" title="{{$comentario->user->name}}" width="30" height="30">
                                    </div>
                                    <div class="col-sm-12 col-md-11">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-8">
                                                <p class="card-text text-info">{{$comentario->user->name}}</p>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <p class="card-text text-info"><strong>&#x1F4C5;</strong> {{$comentario->created_at}}</p>
                                            </div>
                                            @if (Auth::user()->rango_id === 1 || Auth::user()->rango_id === 2)
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
                <div class="row">
                    <div class="col-sm-12 px-3 pt-2 pb-1"><h4 class="text-center blog-title-navigation">Navegador</h4></div>
                    <div class="col-sm-12 px-3 pt-2 pb-1">
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <input type="text" class="form-control blog-aside-busqueda" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button">&#128269;</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="list-group">
                            @foreach( $data['categorys'] as $key => $categoria )
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center blog-aside-lista-item">{{$categoria->nombre}}
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