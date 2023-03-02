@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<style>
	.container {
	    width: 50%; /* Define a largura da div */
	    margin: 0 auto; /* Centraliza a div */
	}

    .input {
        background-color: transparent;
    }
</style>

<div class="container">
    <div class="ibox">
        <div class="ibox-content text-center">
            <h3 class="m-b-xxs">Social Feed</h3>
                <small>Entreterimento</small>
        </div>
    </div>



    @if(session('mensagem2'))
        <div class="alert alert-danger">
            <p align='center'>{{session('mensagem2')}}</p>
        </div>
    @endif 

    <a href="{{ route('data_post') }}" class="btn btn-primary block full-width m-b">Nova Postagem</a>

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
            </div>
        </div>
        <div class="social-body">
            <p>
                <img alt="image" 
                     src="img/post/{{ $post->message }}">
            </p>
                <div class="btn-group"> 
                    <div class="panel-footer">
                        <div class="form-group row">
                            <a onclick="like('{{ $post->id }}')"><i class="fa fa-thumbs-up"></i></a>
                            <div class="col-md-1" 
                                 id="like_{{ $post->id }}">@if($post->likePost){{ $post->likePost->count() }}@endif
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    @endforeach 

@endsection

@section('scripts')

<script>

function like(id)
{
    requisicao('{{route('like')}}', 'POST', id)
    .then(result => { 
        $('#like_'+id).html(result);

}).catch(error =>{
console.log(error);
}); 
}

</script>

@endsection