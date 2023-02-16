@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>NOVA POSTAGEM</h2>
    </div>
</div><br>

    <form class="m-t" 
          action="{{ route('post') }}"
          enctype="multipart/form-data"
          method="POST">
        @csrf

            @if($errors->any())
                <div class="alert alert-danger m-b">
                    @foreach ($errors->all() as $error)
                        <p align='center'>{{ $error }}</p>
                     @endforeach
                </div>
            @endif

            @if(session('mensagem'))
                <div class="alert alert-success">
                    <p align='center'>{{ session('mensagem') }}</p>
                </div>
            @endif

            <div class="col-lg-5">
                <div class="ibox ">
                     <div class="ibox-content">

                        <div class="form-group">
                            <label class="font-normal">Tag:</label>
                                <div class="input-group">
                                    <select class="form-control m-b" 
                                            name="tag_id" 
                                            id="tag_id">
                                            <option></option>
                                                @foreach($dataTag as $tag) 
                                                    <option value="{{ $tag->id }}">{{ $tag->id }} - {{ $tag->tag_name }}</option>
                                                @endforeach
                                    </select>
                                </div>
                        </div> 

                        <div class="form-group">
                            <label class="font-normal">POST:</label>
                                <input type="file" 
                                       class="form-control" 
                                       value="{{ old('message') }}"
                                       id="message"
                                       name="message">
                        </div>
                        <button type="submit"
                                id="btn_save_post"
                                name="btn_save_post"
                                value="btn_save_post" 
                                class="btn btn-primary block full-width m-b">Salvar
                        </button>

                    </div>
                </div>
            </div>

    </form>             

@endsection

@section('scripts')

<link rel="stylesheet" href="{{ asset('vendor/summernote/dist/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2-3.5.2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2-3.5.2/select2-bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('vendor/summernote/dist/summernote.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/select2-3.5.2/select2.min.js') }}"></script>

<script>

$(document).ready(function(){
    $('.summernote').summernote();
});

</script>

@endsection