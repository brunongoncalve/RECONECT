@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<style>
	.container {
	    width: 50%; /* Define a largura da div */
	    margin: 0 auto; /* Centraliza a div */
	}
</style>

<div class="container">
    <div class="ibox">
        <div class="ibox-content text-center">
            <h3 class="m-b-xxs">Social Feed</h3>
                <small>Entreterimento</small>
        </div>
    </div>

        <a href="{{ route('post') }}" class="btn btn-primary block full-width m-b">Nova Postagem</a>

        @foreach($data as $post)
            <div class="social-feed-box">
                <div class="social-avatar">
                    <a href="" class="float-left">
                        <img class="rounded-circle" alt="image" src="img/profile/{{ $post->userPost->photo }}">
                    </a>
                        <div class="media-body">
                            <a><b>Criado por</b>: {{ $post->userPost->name }}</a>
                            <small class="text-muted">{{ date('d/m/y H:i:s', strtotime($post->created_at)) }} - {{ $post->tagPost->tag_name }}</small>
                        </div>
                </div>
                <div class="social-body">
                        <p>
                            <img align="center" alt="image" src="img/post/{{ $post->message }}">
                        </p>
                <div class="btn-group">
                <form action="{{ route('like') }}"
                      method="POST">
                    @csrf  
                    <button class="btn btn-white btn-xs"
                            type="submit" 
                            value="{{ $post->id }}"
                            name="btn_like"
                            id="btn_like">
                                <i class="fa fa-thumbs-up"></i> Curtida</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comentario</button>     
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Compartilhar</button>
                </form>    
                </div>
            </div>
        </div>
        @endforeach 
</div>

@endsection

@section('scripts')

<script>

</script>

@endsection