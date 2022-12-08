@extends('Template.main')

@section('title', 'Reconect | Cadastro de Usuarios')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Usuarios</h2>
    </div>
</div><br>

<form class="m-t" 
      action="{{ route('registration_user') }}"
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
                  value="{{ old('name') }}"
                  id="name"
                  name="name">
        </div>
</div>

<div class="form-group">
    <label class="font-normal">EMAIL:</label>
        <div class="input-group">
            <input type="text" 
                  class="form-control"
                  value="{{ old('email') }}"
                  id="email"
                  name="email">
        </div>
</div>

<div class="form-group">
    <label class="font-normal">DATA DE NASCIMENTO:</label>
        <input type="date" 
               class="form-control"
               value="{{ old('birth') }}" 
               id="birth"
               name="birth">
</div>

<div class="form-group">
    <label class="font-normal">DEPARTAMENTO:</label>
        <input type="text" 
               class="form-control" 
               value="{{ old('department') }}"
               id="department"
               name="department">
</div>

<div class="form-group">
    <label class="font-normal">SELECIONE A FOTO DE PERFIL:</label>
        <input type="file" 
               class="form-control" 
               value="{{ old('photo') }}"
               id="photo"
               name="photo">
</div>

<div class="form-group">
    <input type="password" 
           class="form-control" 
           placeholder="********" 
           id="password"
           name="password"
           required>
</div>

<button type="submit" 
        class="btn btn-primary block full-width m-b">Salvar
</button>

</form>
</div>

@endsection

@section('scripts')

@endsection