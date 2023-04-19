@extends('Template.main')

@section('title', 'Reconect | Cadastro de Impressora')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Impressoras</h2>
    </div>
</div><br>

        <form class="m-t" 
              action="{{ route('registration_printer') }}"
              enctype="multipart/form-data"
              method="POST">
            @csrf

                @if(session('mensagem'))
                    <div class="alert alert-success">
                        <p align='center'>{{session('mensagem')}}</p>
                    </div>
                @endif 

                <div class="col-lg-5">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="form-group">
                                <label class="font-normal">NOME DA IMPRESSORA:</label>
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control"
                                               id="name_printer"
                                               name="name_printer">
                                    </div>
                            </div>
                            <button type="submit" 
                                    class="btn btn-primary block full-width m-b">Salvar
                            </button>
        </form>

@endsection

@section('scripts')

@endsection