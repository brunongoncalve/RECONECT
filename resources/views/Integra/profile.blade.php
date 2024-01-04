@extends('Template.main')

@section('title', 'Reconect | Editar Perfil')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Editar Perfil</h2>
    </div>
</div><br>

    <form class="m-t" 
          action="{{ route('profile') }}"
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

                <div class="form-group">
                    <label class="font-normal">ALTERE A FOTO PERFIL:</label>
                        <input type="file" 
                               class="form-control" 
                               value="{{ old('alter_photo') }}"
                               id="alter_photo"
                               name="alter_photo">
                </div>
                <button type="submit"
                        id="btn_save_profile"
                        name="btn_save_profile"
                        value="btn_save_profile" 
                       class="btn btn-primary block full-width m-b">Salvar
                </button>
    </form>             

@endsection

@section('scripts')

@endsection