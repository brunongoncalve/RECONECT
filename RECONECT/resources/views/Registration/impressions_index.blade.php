@extends('Template.main')

@section('title', 'Reconect | Cadastro de Impressões')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Impressões</h2>
    </div>
</div><br>

        <form class="m-t" 
              action="{{ route('registration_impressions') }}"
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
                                <label class="font-normal">IMPRESSORA:</label>
                                    <select class="form-control m-b" 
                                            name="status" 
                                            id="status">
                                                <option></option>
                                                    @foreach($printer as $printer) 
                                                        <option value="{{ $printer->id }}">{{ $printer->id }} - {{ $printer->name_printer }}</option>
                                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="font-normal">QUANTIDADE DE IMPRESSÕES COLORIDAS:</label>
                                    <div class="input-group">
                                        <input type="number" 
                                               class="form-control"
                                               id="color_prints"
                                               name="color_prints">
                                    </div> 
                            </div>
                            <div class="form-group">
                                <label class="font-normal">QUANTIDADE DE IMPRESSÕES PRETO E BRANCO:</label>
                                    <div class="input-group">
                                        <input type="number" 
                                               class="form-control"
                                               id="black_prints"
                                               name="black_prints">
                                    </div> 
                            </div>
                            <button type="submit" 
                                    class="btn btn-primary block full-width m-b">Salvar
                            </button>
        </form>

@endsection

@section('scripts')

@endsection