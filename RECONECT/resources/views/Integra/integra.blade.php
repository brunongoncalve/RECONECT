@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<div class="container">
    <div class="ibox">
        <div class="ibox-content text-center">
            <h3 class="m-b-xxs">Social Feed</h3>
                <small>Entreterimento</small>
        </div>
    </div>

    <a href="{{ route('data_post') }}" class="btn btn-primary block full-width m-b">Nova Postagem</a>

    @if(session('mensagem'))
        <div class="alert alert-success">
            <p align='center'>{{session('mensagem')}}</p>
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
                    <a href="{{ route('integra') }}"><i class="glyphicon glyphicon-trash mao pull-right text-danger m-l" 
                          onclick="delete_post('{{ $post->id }}')"></i></a>&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <div class="social-body">
            <p>
                <img class="img-fluid" 
                     alt="image"
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

function delete_post(id)
{
    requisicao('{{ route('delete_post') }}', 'POST', id)
    .then(result => { 

}).catch(error =>{
console.log(error);
}); 
}

function like(id)
{
    requisicao('{{ route('like') }}', 'POST', id)
    .then(result => { 
        $('#like_'+id).html(result);

}).catch(error =>{
console.log(error);
}); 
}

</script>

@endsection