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

                    @if(session('mensagem1'))
                        <div class="alert alert-success">
                            <p align='center'>{{session('mensagem1')}}</p>
                        </div>
                    @endif 

                        <div class="col-md-4 col-xs-4 pull-left" 
                             name="photo"
                             id="photo">
                                <img class="'img-responsive avatar-view"
                                     src="{{ asset('img/default.jpg') }}" 
                                     alt="Avatar">
                        </div>
                        <div class="col-md-4 col-xs-4 pull-left">
                        <button type="button" 
                                class="btn btn-success" 
                                onclick="loadManager()" 
                                name="btn_entrada" 
                                id="btn_entrada" 
                                value="ENTRADA">&nbsp;SELECIONE O GESTOR&nbsp;
                        </button>
                        <button type="button" 
                                class="btn btn-success" 
                                onclick="loadVehicle()"
                                name="btn_entrada" 
                                id="btn_entrada" 
                                value="ENTRADA">&nbsp;SELECIONE O VEICULO&nbsp;
                        </button>
                        </div>  
                        <div class="col-md-8 col-xs-6 pull-left">
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback" 
                                 style="display: none">
                                <label>COD.Func:</label>
                                    <input type="text" 
                                           class="form-control"  
                                           name="id" 
                                           id="id"  
                                           readonly>
                            </div><br>
                            <div class="form-group col-md-4" 
                                 id="div_manager" 
                                 name="div_manager" 
                                 style="display: none">
                                    <label>GESTOR:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="name" 
                                               id="name" 
                                               readonly>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback" 
                                 id="div_vehicle" 
                                 name="div_vehicle" 
                                 style="display: none">
                                    <label>VEICULO:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="vehicle" 
                                               id="vehicle"
                                               readonly>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback" 
                                 id="div_plate" 
                                 name="div_plate" 
                                 style="display: none">
                                    <label>PLACA:</label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="plate" 
                                               id="plate"
                                               readonly>
                                        <input type="hidden" 
                                               class="form-control" 
                                               name="id_vehicle" 
                                               id="id_vehicle"
                                               readonly>
                            </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                                        <a href="#" 
                                           class="btn btn-success"
                                           style="display: none"
                                           id="btn_clean"
                                           name="btn_clean">&nbsp;Limpar&nbsp;
                                        </a>
                                        <a href="{{ route('manager') }}"
                                                class="btn btn-primary" 
                                                onclick="entry('ENTRY')" 
                                                style="display: none" 
                                                name="btn_entry" 
                                                id="btn_entry" 
                                                value="ENTRY">&nbsp;Entrar&nbsp;
                                        </a>
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
                                    @foreach ($flow as $flow1)
                                        <tr>
                                            <td align='left'>{{ $flow1->id }}</td>
                                            <td align='left'>{{ $flow1->manager->name }}</td>
                                            <td align='left'>{{ $flow1->car_in }}</td>
                                            <td align='left'>{{ $flow1->plate_in }}</td>
                                            <td align='left'>{{ date('d/m/y H:i:s', strtotime($flow1->date_in)) }}</td>
                                            <td align='left'>{{ $flow1->vehicle_flow }}</td>
                                            <td align='left'>{{ $flow1->plate_out }}</td>
                                            <td align='left'>{{ date('d/m/y H:i:s', strtotime($flow1->date_out)) }}</td>
                                            <td align='left'>{{ $flow1->responsible }}</td>
                                            <td align='left'><a href="{{ route('manager') }}"
                                                                class="btn btn-danger" 
                                                                onclick="exit('{{ $flow1->id }}', '{{ $flow1->port002_id }}', '{{ $flow1->plate_in }}')">&nbsp;Saida&nbsp;
                                                            </a>
                                            </td>
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
    "pageLength": 5,
    "order": [0, 'desc'],

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
        console.log(result);
            $('#photo').html("<img class='img-responsive avatar-view' src='img/profile/"+ result.photo +"'>");
            $('#id').val(result.id);
            $('#name').val(result.name);
            $('#div_manager').show('slow');
            $('#XModal').modal('hide');

}).catch(error =>{
    console.log(error);
}); 
}

function loadVehicle(id)
{
    $('#Xmod_titulo').html('<h3>SELECIONE O VEICULO:</h3>');
    listaJS('Xmod_corpo', '{{ route('load_vehicle') }}','GET');
}

function selectVehicle(id)
{
    requisicao('{{ route('select_vehicle') }}','GET', id)
    .then(result => { 
        result = JSON.parse(result);
            if(result.status == 1) {
                $('#id_vehicle').val(result.id);
                $('#vehicle').val(result.name_car);
                $('#plate').val(result.plate);
                $('#div_vehicle').show('slow');
                $('#div_plate').show('slow');
                $('#btn_entry').show('slow');
                $('#btn_clean').show('slow');
                $('#XModal').modal('hide');
            } else if(result.status == 2){
                alert('VEICULO DENTRO DA EMPRESA, REALIZE A SAIDA');
            }

}).catch(error =>{
    console.log(error);
}); 
}

function entry(action)
{
    const vehicle = $('#vehicle').val();
    const plate = $('#plate').val();
    const id = $('#id').val();
    const id_vehicle = $('#id_vehicle').val();

    requisicao('{{route('manager')}}','POST', vehicle,plate,id,id_vehicle,action)
    .then(result => { 

}).catch(error =>{
console.log(error);
}); 
}

function exit(id,id_vehicle,plate_in)
{ 
    requisicao('{{route('saveExit')}}','POST', id,id_vehicle,plate_in)
    .then(result => { 

}).catch(error =>{
console.log(error);
}); 
}

</script>

@endsection