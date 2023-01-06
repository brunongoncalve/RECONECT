@extends('Template.main')

@section('title', 'Reconect | Movimentação Recursos')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Movimentação de Recursos</h2>
    </div>
</div><br>

<div class="row">
    <div class="col-lg-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>RECURSOS DISPONIVEIS</h5>
            </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" 
                             class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <form class="m-t" 
                                      action="{{ route('movement_resources') }}"
                                      method="POST">
                                    @csrf 

                                        <button type="submit" 
                                                class="btn btn-warning"
                                                value="btn_exit_item"
                                                href="{{route('movement_resources')}}">Confrimar Liberação
                                        </button>
                                        <a href="{{ route('movement_resources') }}" 
                                           class="btn btn-success">Limpar
                                        </a><br><br>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Item:</label>
                                                                <input type="hidden" 
                                                                       class="form-control" 
                                                                       id="id"
                                                                       name="id">
                                                                <input type="text" 
                                                                       class="form-control" 
                                                                       readonly  
                                                                       id="name_item"
                                                                       name="name_item">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Descrição Item:</label>
                                                                <input type="text"
                                                                       class="form-control" 
                                                                       readonly 
                                                                       id="description"
                                                                       name="description">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label>Responsavel:</label>
                                                                <input type="hidden" 
                                                                       class="form-control" 
                                                                       id="id_user"
                                                                       name="id_user">
                                                                <input type="text" 
                                                                       class="form-control" 
                                                                       readonly 
                                                                       id="responsible_in"
                                                                       name="responsible_in"
                                                                       onclick="loadUser()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                        </div>
                                                     </div>
                                                </div>    
                                </form><br>

                                    <table class="table table-striped table-bordered table-hover dataTables-example dataTable" 
                                           id="TabItem" 
                                           aria-describedby="DataTables_Table_0_info" 
                                           role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" 
                                                    tabindex="0" 
                                                    aria-controls="DataTables_Table_0" 
                                                    rowspan="1" 
                                                    colspan="1" 
                                                    aria-label="Browser: activate to sort column ascending" 
                                                    style="width: 505.562px;">ITEM
                                                </th>
                                                <th class="sorting" 
                                                    tabindex="0" 
                                                    aria-controls="DataTables_Table_0" 
                                                    rowspan="1" 
                                                    colspan="1" 
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 457.078px;">DESCRIÇÃO
                                                </th>
                                                <th class="sorting" 
                                                    tabindex="0" 
                                                    aria-controls="DataTables_Table_0" 
                                                    rowspan="1" 
                                                    colspan="1" 
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 457.078px;">GRUPO
                                                </th>
                                                <th class="sorting" 
                                                    tabindex="0" 
                                                    aria-controls="DataTables_Table_0" 
                                                    rowspan="1" 
                                                    colspan="1" 
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 457.078px;">STATUS
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($resources as $resource)
                                                <tr class="gradeA odd" role="row" onclick="selectItem({{ $resource->id }})">
                                                    <td align='left'>{{ $resource->name_item }}</td>
                                                    <td align='left'>{{ $resource->description }}</td>
                                                    <td align='left'>{{ $resource->group->description }}</td>
                                                    <td align='left'>{{ $resource->statu->description }}</td>
                                                </tr>
                                            @endforeach    
                                        </tbody> 
                                    </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox-title">
        <h5>RECURSOS EM USO</h5>
    </div>

        <div class="ibox-content">
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" 
                     class="dataTables_wrapper container-fluid dt-bootstrap4">

                    <form class="m-t" 
                          action="{{ route('movement_resources') }}"
                          method="POST">
                        @csrf 

                            <button type="submit" 
                                    class="btn btn-warning"
                                    value="btn_exit_item_out"
                                    href="{{route('movement_resources')}}">Confrimar Devolução
                            </button>
                            <a href="{{ route('movement_resources') }}" 
                               Class="btn btn-success">Limpar
                            </a><br><br>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Item:</label>
                                                    <input type="hidden" 
                                                           class="form-control" 
                                                           id="id_out"
                                                           name="id_out">
                                                    <input type="text" 
                                                           placeholder="" 
                                                           class="form-control"  
                                                           readonly  
                                                           id="name_item_out"
                                                           name="name_item_out">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Descrição Item:</label>
                                                    <input type="text" 
                                                           placeholder="" 
                                                           class="form-control" 
                                                           readonly
                                                           id="description_out"
                                                           name="description_out">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Responsavel:</label>
                                                    <input type="hidden" 
                                                           class="form-control" 
                                                           id="id_user_out"
                                                           name="id_user_out">
                                                    <input type="text" 
                                                           placeholder="" 
                                                           class="form-control" 
                                                           readonly
                                                           id="responsible_out"
                                                           name="responsible_out"
                                                           onclick="loadUserOut()">
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>        
                    </form><br>

                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable" 
                               id="TabItemOut" 
                               aria-describedby="DataTables_Table_0_info" 
                               role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" 
                                        tabindex="0" 
                                        aria-controls="DataTables_Table_0" 
                                        rowspan="1" 
                                        colspan="1" 
                                        aria-label="Browser: activate to sort column ascending" 
                                        style="width: 505.562px;">NOME
                                    </th>
                                    <th class="sorting" 
                                        tabindex="0" 
                                        aria-controls="DataTables_Table_0" 
                                        rowspan="1" 
                                        colspan="1" 
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 457.078px;">DESCRIÇÃO
                                    </th>
                                    <th class="sorting" 
                                        tabindex="0" 
                                        aria-controls="DataTables_Table_0" 
                                        rowspan="1" 
                                        colspan="1" 
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 457.078px;">DATA DA ENTREGA
                                    </th>
                                    <th class="sorting" 
                                        tabindex="0" 
                                        aria-controls="DataTables_Table_0" 
                                        rowspan="1" 
                                        colspan="1" 
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 457.078px;">RESPONSAVEL POR RETIRAR
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resourcesOut as $out)
                                    <tr class="gradeA odd" role="row" onclick="selectItemOut({{ $out->id }})">
                                        <td align='center'>{{ $out->itemOut->name_item }}</td>
                                        <td align='center'>{{ $out->itemOut->description }}</td>
                                        <td align='center'>{{ date('d/m/y H:i:s', strtotime($out->dt_in)) }}</td>
                                        <td align='center'>{{ $out->responsible_in }}</td>
                                    </tr>
                                @endforeach    
                            </tbody> 
                        </table>
                     </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>

$(document).ready(function() {
    $('#TabItem').DataTable({
    "paging": true,
    "responsive": true,
    "processing": true,
    "bAutoWidth": true,
    "bDeferRender": true,
    "bLengthChange": false,
    "pageLength": 4,
    "order": [0, 'desc'],

        dom: "Bfrtip",
        buttons: []
    });
});

$(document).ready(function() {
    $('#TabItemOut').DataTable({
    "paging": true,
    "responsive": true,
    "processing": true,
    "bAutoWidth": true,
    "bDeferRender": true,
    "bLengthChange": false,
    "pageLength": 4,
    "order": [0, 'desc'],

        dom: "Bfrtip",
        buttons: []
    });
});

function loadUser(id)
{
    $('#Xmod_titulo').html('<h3>SELECIONA USUARIO:</h3>');
    listaJS('Xmod_corpo', '{{ route('load_user') }}','GET');
}

function loadUserOut(id)
{
    $('#Xmod_titulo').html('<h3>SELECIONA USUARIO:</h3>');
    listaJS('Xmod_corpo', '{{ route('load_user_out') }}','GET');
}

function selectUser(id)
{
    requisicao('{{ route('select_user') }}','GET', id)
    .then(result => { 
    result = JSON.parse(result);
        $('#id_user').val(result.id);
        $('#responsible_in').val(result.name);
        $('#XModal').modal('hide');
    
}).catch(error =>{
console.log(error);
}); 
}

function selectUserOut(id)
{
    requisicao('{{ route('select_user_out') }}','GET', id)
    .then(result => { 
    result = JSON.parse(result);
        $('#id_user_out').val(result.id);
        $('#responsible_out').val(result.name);
        $('#XModal').modal('hide');
    
}).catch(error =>{
console.log(error);
}); 
}

function selectItem(id)
{
    requisicao('{{ route('select_item') }}','GET', id)
    .then(result => { 
    result = JSON.parse(result);
        $('#id').val(result.id);
        $('#name_item').val(result.name_item);
        $('#description').val(result.description);
    
}).catch(error =>{
console.log(error);
}); 
}

function selectItemOut(id)
{
    requisicao('{{ route('select_item_out') }}','GET', id)
    .then(result => { 
    result = JSON.parse(result);
        $('#id_out').val(result.id);
        $('#id_item_out').val(result.item[0].id);
        $('#name_item_out').val(result.item[0].name_item);
        $('#description_out').val(result.item[0].description);
    
}).catch(error =>{
console.log(error);
}); 
}

</script>

@endsection