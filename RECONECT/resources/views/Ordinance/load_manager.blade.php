<table id='TabLoagManager' 
       class='table table-striped table-condensed  table-hover' 
       cellspacing='0' 
       width='100%'>
        <thead>
            <tr>
                <th align='left'><b>ID</th>
                <th align='left'><b>NOME</th>
                <th align='left'><b>DEPARTAMENTO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loadManager as $manager)
                <tr onclick="selectManager('{{ $manager->id }}')">
                    <td align='left'>{{ $manager->id }}</td>
                    <td align='left'>{{ $manager->name }}</td>
                    <td align='left'>{{ $manager->department }}</td>                
                </tr>  
            @endforeach
        </tbody>
</table>

<script>

$(document).ready(function() {
    $('#TabLoagManager').DataTable({
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

</script>