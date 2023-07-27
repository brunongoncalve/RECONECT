@extends('Template.main')

@section('title', 'INTEGRA')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gestores / Coordenadores</h2>
             <span>Controle de Gestores e Coordenadores</span>
    </div>
</div><br>

<div class="ibox-content">
    <div class="table-responsive">
        <div id="DataTables_Table_0_wrapper" 
             class="dataTables_wrapper container-fluid dt-bootstrap4">

                <form class="m-t" 
                      action="{{ route('manager') }}"
                      method="POST">
                    @csrf 

                    @if(session('mensagem'))
                        <div class="alert alert-success">
                            <p align='center'>{{session('mensagem')}}</p>
                        </div>
                    @endif 

                        <div class="col-md-4 col-xs-4 pull-left" 
                             name="photo"
                             id="photo">
                                <img class="'img-responsive avatar-view"
                                     src="{{ asset('img/default.jpg') }}" 
                                     alt="Avatar">
                        </div>
                        <div class="col-md-8 col-xs-8 pull-right">
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback" style="display: none">
                                <label>COD.Func:</label>
                                    <input type="text" 
                                           class="form-control"  
                                           name="id" 
                                           id="id"  
                                           readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label>GESTOR:</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="name" 
                                           id="name" 
                                           placeholder="Selecione o gestor" 
                                           readonly 
                                           onclick="loadManager()">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback">
                                <label>VEICULO:</label>
                                     <input type="text" 
                                            class="form-control" 
                                            name="car" 
                                            id="car">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback">
                                <label>PLACA:</label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="DN_PLACA" 
                                           id="DN_PLACA">
                                    <input type="hidden" 
                                           class="form-control" 
                                           name="ID_VEICULO_SAIDA" 
                                           id="ID_VEICULO_SAIDA">
                            </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <a href="#" 
                                           class="btn btn-primary"
                                           style="display: none"
                                           id="btn_limpa"
                                           name="btn_limpa">&nbsp;Limpar&nbsp;
                                        </a>
                                        <button type="submit" 
                                                class="btn btn-success" 
                                                onclick="entrada('ENTRADA')" 
                                                style="display: none" 
                                                name="btn_entrada" 
                                                id="btn_entrada" 
                                                value="ENTRADA">&nbsp;Entrada&nbsp;
                                        </button>
                                        <button type="submit" 
                                                class="btn btn-danger"  
                                                onclick="entrada('SAIDA')"  
                                                style="display: none" 
                                                name="btn_saida" 
                                                id="btn_saida" 
                                                value="SAIDA">&nbsp;Saida&nbsp;
                                        </button>
                                    </div>
                                </div>
                </form>
        </div>
        <div class="clearfix"></div></div>
            <div class="x_content"><br><br>
                <h3><strong>Fluxo do Dia</strong></h3><hr>

                    <table id='TabFluxoDia' 
                           class='table table-striped table-condensed  table-hover' 
                           cellspacing='0' 
                           width='100%'>
                                <thead>
                                    <tr>
                                        <th align='left'><b>#</th>
                                        <th align='left'><b>FUNCIONARIO</th>
                                        <th align='left'><b>VEICULO ENTRADA</th>
                                        <th align='left'><b>PLACA ENTRADA</th>
                                        <th align='left'><b>DATA ENTRADA</th>
                                        <th align='left'><b>VEICULO SAIDA</th>
                                        <th align='left'><b>PLACA SAIDA</th>
                                        <th align='left'><b>DATA SAIDA</th>
                                        <th align='left'><b>RESPONSAVEL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                    </table>
            </div>
        </div> 
    </div>
</div>

@endsection

@section('scripts')

<script>

function loadManager(id)
{
    $('#Xmod_titulo').html('<h3>SELECIONE O GESTOR:</h3>');
    listaJS('Xmod_corpo', '{{ route('load_manager') }}','GET');
}

function selectManager(id)
{
    requisicao('{{ route('select_manager') }}','GET', id)
    .then(result => { 
        result = JSON.parse(result);
        console.log(result);
            $('#photo').html("<img class='img-responsive avatar-view' src='img/profile/"+ result.photo +"'>");
            $('#id').val(result.id);
            $('#name').val(result.name);
            //$('#DN_VEICULO').val(result.VEICULO_GESTOR.VEICULO_IN);
            //$('#DN_PLACA').val(result.VEICULO_GESTOR.PLACA_IN);
            //$('#ID_VEICULO_SAIDA').val(result.VEICULO_GESTOR.ID);
            $('#XModal').modal('hide');

}).catch(error =>{
    console.log(error);
}); 
}

</script>

@endsection