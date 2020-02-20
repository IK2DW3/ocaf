<div class="row">
    <div class="col-sm-12 px-3 pt-2 pb-1"><h4 class="text-center blog-title-navigation">Filtrar</h4></div>
    <div class="col-sm-12 px-3 pt-2 pb-1">
        <form action="{{ url('/blog/post/filtrar') }}" method="post">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <input type="text" class="form-control blog-aside-busqueda" name="post-filter" placeholder="Buscar posts..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-warning" type="button">&#128269;</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-12">
        <div class="list-group">
            @foreach( $data['categorys'] as $key => $categoria )
            <a href="{{ url('blog/posts/category/' . $categoria->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center blog-aside-lista-item">{{$categoria->nombre}}
                <span class="badge badge-warning badge-pill">{{$categoria->numero_posts}}</span>
            </a>
            @endforeach
        </div>
    </div>
</div>