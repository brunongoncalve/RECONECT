@extends('Template.principal')

@section('title', 'Reconect | Cadastro Grupo')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Grupos</h2>
    </div>
</div><br>

<form class="m-t" 
      action="{{ route('registration_group') }}"
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
    <label class="font-normal">NOME:</label>
        <div class="input-group">
            <input type="text" 
                  class="form-control"
                  id="name_group"
                  name="name_group">
        </div>
</div>

<div class="form-group">
    <label class="font-normal">DESCRIÇÃO:</label>
        <div class="input-group">
            <input type="text" 
                  class="form-control"
                  id="description"
                  name="description">
        </div>
</div>

<button type="submit" 
        class="btn btn-primary block full-width m-b">Salvar
</button>

</form>
</div>

@endsection

@section('scripts')

@endsection