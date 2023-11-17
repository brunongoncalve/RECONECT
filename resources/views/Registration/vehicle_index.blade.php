@extends('Template.main')

@section('title', 'Reconect | Cadastro Veiculos')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cadastro de Veiculos</h2>
    </div>
</div><br>

    <form class="m-t" 
          action="{{ route('registration_vehicle') }}"
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
                                <label class="font-normal">NOME DO VEICULO:</label>
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control"
                                               id="name_car"
                                               name="name_car">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="font-normal">PLACA DO VEICULO:</label>
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control"
                                               id="plate"
                                               name="plate">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="font-normal">SELECIONE A FOTO DO VEICULO:</label>
                                    <input type="file" 
                                           class="form-control" 
                                           value="{{ old('photo') }}"
                                           id="photo"
                                           name="photo">
                            </div>
                            <button type="submit" 
                                    class="btn btn-primary block full-width m-b">Salvar
                            </button>

                        </div>
                    </div>
                </div> 
                           
    </form>
</div>

@endsection

@section('scripts')

@endsection