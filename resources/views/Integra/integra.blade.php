@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<style>
.social-feed-box {
    border-radius: 10px;
}

.ibox-content{
     border-radius: 10px;
}
</style>

<div class="container">
    <div class="ibox">
        <div class="ibox-content" align="center">
            <h3 class="m-b-xxs">Social Feed</h3>
                <small>Entreterimento</small>
        </div>
    </div>

    <a href="{{ route('data_post') }}" class="btn btn-primary block full-width m-b">Nova Postagem</a>

    @if(session('mensagem'))
        <div class="alert alert-success">
            <p align='center'>{{ session('mensagem') }}</p>
        </div>
    @endif

    @if(session('mensagem1'))
        <div class="alert alert-success">
            <p align='center'>{{ session('mensagem1') }}</p>
        </div>
    @endif

    @if(session('mensagem2'))
        <div class="alert alert-danger">
            <p align='center'>{{ session('mensagem2') }}</p>
        </div>
    @endif

    @foreach($data as $post)
        <div class="social-feed-box">
            <div class="social-avatar">
                <a href="" class="float-left">
                    <img class="rounded-circle" 
                         alt="image" 
                         src="img/profile/{{ $post->userPost->photo }}">
                </a>
            <div class="media-body">
                <a><b>Criado por</b>: {{ $post->userPost->name }}</a>
                    <small class="text-muted">{{ date('d/m/y H:i:s', strtotime($post->created_at)) }} - {{ $post->tagPost->tag_name }}</small>
                        <form action="{{ route('delete_post') }}"
                              method="POST">
                            @csrf  
                                @if($post->users_id == auth()->user()->id)
                                    <button type="submit" 
                                            class="btn btn-outline-danger pull-right"
                                            name="btn_delete_post"
                                            id="btn_delete_post"
                                            value="{{ $post->id }}">Excluir Postagem
                                    </button>
                                @endif    
                        </form>
            </div>
        </div>
        <div class="social-body">
            <p align="center">
                <img class="img-fluid" 
                     alt="image"
                     src="img/post/{{ $post->message }}">
            </p>
                <div class="btn-group"> 
                     <div class="form-group d-flex">
                        <div class="d-flex">
                            <a onclick="loadLike('{{ $post->id }}')"><i class="fa fa-users"></i></a>
                            <div class="col-md-2">
                                <a onclick="like('{{ $post->id }}')"><i class="fa fa-heart"></i></a>
                            </div>
                            <div class="ml-1"
                                 id="like_{{ $post->id }}">@if($post->likePost){{ $post->likePost->count() }}@endif</div>
                        </div>|         
                            <div class="d-flex ml-3">
                                <a onclick="comment('{{ $post->id }}')"><i class="fa fa-comment"></i></a>
                            <div class="ml-2"
                                 id="num_comment_{{ $post->id }}">@if($post->commentPost){{ $post->commentPost->count() }}@endif
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
 <div>
        <div id="comment_{{ $post->id }}"></div> 
        <div id="load_like_{{ $post->id }}"></div>      
    @endforeach 
    
@endsection

@section('scripts')

<script>

function like(id)
{
    requisicao('{{ route('like') }}', 'POST', id)
    .then(result => { 
        $('#like_'+id).html(result);

}).catch(error =>{
console.log(error);
}); 
}

function comment(id_post)
{
    listaJS('comment_'+id_post,'comment/'+id_post, 'POST');
}

function loadLike(id_post)
{
    listaJS('load_like_'+id_post,'load_like_/'+id_post, 'POST');
}

</script>

@endsection