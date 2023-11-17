<table id='TabManager' 
       class='table table-striped table-condensed  table-hover' 
       cellspacing='0' 
       width='100%'>
        <thead>
            <tr>
                <th align='left'><b>COD.FUNC</th>
                <th align='left'><b>NOME</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loadManager as $manager)
                <tr onclick="selectManager({{ $manager->id }})">
                    <td align='left'>{{ $manager->id }}</td>
                    <td align='left'>{{ $manager->name }}</td>
            @endforeach
        </tbody>
</table>

<script>

$(document).ready(function() {
    $('#TabManager').DataTable({
    "paging": true,
    "responsive": true,
    "processing": true,
    "bAutoWidth": true,
    "bDeferRender": true,
    "bLengthChange": false,
    "pageLength": 8,

        dom: "Bfrtip",
        buttons: []
    });
});

</script>