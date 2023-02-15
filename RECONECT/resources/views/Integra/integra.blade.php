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
                            <a href="#">
                                {{ $post->userPost->name }}
                            </a>
                            <small class="text-muted">{{ date('d/m/y H:i:s', strtotime($post->created_at)) }}</small>
                        </div>
                </div>
                <div class="social-body">
                    <p>
                       <img align="center" alt="image" src="img/post/{{ $post->message }}">
                    </p>
                <div class="btn-group">
                    <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Curtida</button>
                    <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comentario</button>     
                    <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Compartilhar</button>
                </div>
            </div>
        
            <div class="social-footer">
                <div class="social-comment">
                    <a href="" class="float-left">
                        <img class="rounded-circle" alt="image" src="img/profile/{{ auth()->user()->photo }}">
                    </a>
                        <div class="media-body">
                            <a href="#">
                                {{ auth()->user()->name }}
                            </a>
                                Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                            <br>
                            <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                                <small class="text-muted">12.06.2014</small>
                        </div>
                </div>
                <div class="social-comment">
                    <a href="" class="float-left">
                        <img class="rounded-circle" alt="image" src="img/profile/{{ auth()->user()->photo }}">
                    </a>
                <div class="media-body">
                    <a href="#">
                        {{ auth()->user()->name }}
                    </a>
                        Making this the first true generator on the Internet. It uses a dictionary of. <br>
                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> -
                    <small class="text-muted">10.07.2014</small>
                </div>
            </div>

            <div class="social-comment">
                <a href="" class="float-left">
                    <img class="rounded-circle" alt="image" src="img/profile/{{ auth()->user()->photo }}">
                </a>
                <div class="media-body">
                    <textarea class="form-control" placeholder="Write comment..."></textarea>
                </div>
            </div>
    </div>
    @endforeach 
</div>

@endsection

@section('scripts')

@endsection