@extends('Template.main')

@section('title', 'Reconect | Portaria Gestores')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gestores / Coordenadores</h2>
             <span>Controle de acesso</span>
    </div>
</div><br>

<div class="ibox-content">
    <div class="table-responsive">
        <div id="DataTables_Table_0_wrapper" 
             class="dataTables_wrapper container-fluid dt-bootstrap4">

                <form class="m-t" 
                      action="{{ route('managers') }}"
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
                                     src="{{ asset('/img/default.jpg') }}" 
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
                                           name="sign" 
                                           id="sign">
                                    <input type="hidden" 
                                           class="form-control" 
                                           name="ID_VEICULO_SAIDA" 
                                           id="ID_VEICULO_SAIDA">
                            </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <a href="{{ route('managers') }}" 
                                           class="btn btn-primary"
                                           style="display: none"
                                           id="btn_clean"
                                           name="btn_clean">&nbsp;Limpar&nbsp;
                                        </a>
                                        <button type="submit" 
                                                class="btn btn-success" 
                                                onclick="entry('ENTRY')" 
                                                name="btn_entry" 
                                                id="btn_entry" 
                                                value="ENTRY">&nbsp;Entrada&nbsp;
                                        </button>
                                        <button type="submit" 
                                                class="btn btn-danger"  
                                                onclick="entrada('SAIDA')"  
                                                style="display: none" 
                                                name="btn_exit" 
                                                id="btn_exit" 
                                                value="EXIT">&nbsp;Saida&nbsp;
                                        </button>
                                    </div>
                                </div>
                </form>
        </div>

                <div class="clearfix"></div></div>
                    <div class="x_content"><br><br>
                        <h3><strong>Fluxo do Dia</strong></h3><hr>

                            <table id='TabFlowDay' 
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
                                    @foreach($flowDay as $day)
                                    <tr> 
                                        <td align='left'>{{ $day->id }}</td>
                                        <td align='left'>{{ $day->managerCar->name }}</td>
                                        <td align='left'>{{ $day->car_in }}</td>
                                        <td align='left'>{{ $day->sign_in }}</td>
                                        <td align='left'>{{ date('d/m/y H:i:s', strtotime($day->date_in)) }}</td>
                                        <td align='left'>{{ $day->car_out }}</td>
                                        <td align='left'>{{ $day->sign_out }}</td>
                                        <td align='left'>{{ date('d/m/y H:i:s', strtotime($day->date_out)) }}</td>
                                        <td align='left'>{{ $day->responsibleOrdinanca->name }}</td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> 
    </div>
</div>

@endsection

@section('scripts')

<script>

$(document).ready(function() {
    $('#TabFlowDay').DataTable({
    "paging": true,
    "responsive": true,
    "processing": true,
    "bAutoWidth": true,
    "bDeferRender": true,
    "bLengthChange": false,
    "pageLength": 10,

        dom: "Bfrtip",
        buttons: []
    });
});

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
            $('#photo').html("<img class='img-responsive avatar-view' src='img/profile/"+ result.photo +"'>");
            $('#id').val(result.id);
            $('#name').val(result.name);
            $('#XModal').modal('hide');
            

}).catch(error => {
    console.log(error);
}); 
}

function insideOrOutside(id)
{
    requisicao('{{route('select_manager')}}','GET', id)
    .then(result => { 
    result = JSON.parse(result);
        if(result.VEICULO_GESTOR.STATUS == 0) {
            $('#btn_limpa').show('slow');
            $('#btn_saida').show('slow');
            $('#btn_entrada').hide('slow');
            $('#ACAO').val('SAIDA');
            $('#DN_VEICULO').val();
            $('#DN_PLACA').val();
        } else {
            $('#btn_limpa').show('slow');
            $('#btn_entrada').show('slow');
            $('#btn_saida').hide('slow');
            $('#ACAO').val('ENTRADA');
            $('#DN_VEICULO').val();
            $('#DN_PLACA').val();
        }

}).catch(error => {
console.log(error);
}); 
}

function entry(ACTION)
{
    const car = $('#car').val();
    const sign = $('#sign').val();
    const id = $('#id').val();

    requisicao('{{route('managers')}}','POST', car,sign,id,ACTION)
    .then(result => { 

}).catch(error =>{
console.log(error);
}); 
}

</script>

@endsection