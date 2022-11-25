@extends('Template.principal')

@section('title', 'Reconect | Movimentação Recursos')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Relatorio Movimentação de Recursos</h2>
    </div>
</div><br>

<div class="ibox-content">
    <div class="table-responsive">
        <div id="DataTables_Table_0_wrapper" 
             class="dataTables_wrapper container-fluid dt-bootstrap4">

<table class="table table-striped table-bordered table-hover dataTables-example dataTable" 
       id="TabReport" 
       aria-describedby="DataTables_Table_0_info" 
       role="grid">

    <thead>
        <tr role="row">
            <th class="sorting_asc" 
                tabindex="0" 
                aria-controls="DataTables_Table_0" 
                rowspan="1" 
                colspan="1" 
                aria-sort="ascending" 
                aria-label="Rendering engine: activate to sort column descending"
                style="width: 413.438px;">ITEM
            </th>
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
                style="width: 457.078px;">DATA DA RETIRADA
            </th>
            <th class="sorting" 
                tabindex="0" 
                aria-controls="DataTables_Table_0" 
                rowspan="1" 
                colspan="1" 
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 457.078px;">RESPONSAVEL PELA RETIRADA
            </th>
            <th class="sorting" 
                tabindex="0" 
                aria-controls="DataTables_Table_0" 
                rowspan="1" 
                colspan="1" 
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 457.078px;">DATA DE DEVOLUÇÃO
            </th>
            <th class="sorting" 
                tabindex="0" 
                aria-controls="DataTables_Table_0" 
                rowspan="1" 
                colspan="1" 
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 457.078px;">RESPONSAVEL PELA DEVOLUÇÃO
            </th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($reports as $report)
            <tr class="gradeA odd" role="row">
                <td align='left'><img src="/img/itens/{{ $report->itemOut->photo }}" class="img-circle m-b"width="50px"></td>
                <td align='left'>{{ $report->itemOut->name_item }}</td>
                <td align='left'>{{ $report->itemOut->description }}</td>
                <td align='left'>{{ $report->dt_in }}</td>
                <td align='left'>{{ $report->responsible_in }}</td>
                <td align='left'>{{ $report->dt_out }}</td>
                <td align='left'>{{ $report->responsible_out }}</td>
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
 
    $('#TabReport').DataTable({
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

</script>

@endsection