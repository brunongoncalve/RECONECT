<table id='TabLoadUser' class='table table-striped table-condensed  table-hover' cellspacing='0' width='100%'>

<thead>
    <tr>
       <th align='left'><b>#</th>
       <th align='left'><b>NOME</th>
       <th align='left'><b>DESCRIÇÃO</th>
    </tr>
</thead>

<tbody>
    @foreach ($loadUser as $user)
        <tr onclick="selectUser({{ $user->id }})">
          <td align='left'>{{ $user->id }}</td>
          <td align='left'>{{ $user->name }}</td>
          <td align='left'>{{ $user->email }}</td>
    @endforeach
</tbody>

</table>
</div>
</div>
</div>

<script>

$(document).ready(function() {
    $('#TabLoadUser').DataTable({
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