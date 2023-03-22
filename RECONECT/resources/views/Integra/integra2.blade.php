@extends('Template.main')

@section('title', 'INTEGRA 2')

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
                        <a><i class="glyphicon glyphicon-trash mao pull-right text-danger m-l"></i></a>&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <div class="social-body">
            <p align="center">
                <img class="img-fluid" 
                     alt="image"
                     src="img/post/{{ $post->message }}">
            </p>
                <div class="btn-group"> 
                    <div class="panel-footer">
                        <div class="form-group row">
                            <a><i class="fa fa-thumbs-up"></i></a>
                            <div class="col-md-1" 
                                 id="like_{{ $post->id }}">@if($post->likePost){{ $post->likePost->count() }}@endif
                            </div>
                            <div class="col-md-1"></div>
                            <a onclick="comment('{{ $post->id }}')"><i class="fa fa-comment"></i></a>
                            <div class="col-md-1" 
                                 id="comment_{{ $post->id }}">@if($post->commentPost){{ $post->commentPost->count() }}@endif
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
             <div id="comentar_{{ $post->id }}"></div><br>   
        </div>
 <div>
    @endforeach 

@endsection

@section('scripts')

<script>

function comment(id_post)
{
    listaJS('comment_'+id_post,'comment/'+id_post, 'POST');
}

</script>

@endsection