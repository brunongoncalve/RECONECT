<table id='TabVehicle' 
       class='table table-striped table-condensed  table-hover' 
       cellspacing='0' 
       width='100%'>
        <thead>
            <tr>
                <th align='left'><b>#</th>
                <th align='left'><b>NOME</th>
                <th align='left'><b>PLACA</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loadVehicle as $vehicle)
                <tr onclick="selectVehicle({{ $vehicle->id }})">
                    <td align='left'><img src="img/vehicle/{{ $vehicle->photo }}" class="img-circle m-b"width="60px"></td>
                    <td align='left'>{{ $vehicle->name_car }}</td>
                    <td align='left'>{{ $vehicle->plate }}</td>
            @endforeach
        </tbody>
</table>

<script>

$(document).ready(function() {
    $('#TabVehicle').DataTable({
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