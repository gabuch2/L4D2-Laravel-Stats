@extends("layout.app")

@section('content')
<center>
    <h2>Player Rankings</h2>
</center>
<hr>
<table class="table" id="datatables_top_players">
    <thead>
        <tr>
            <th>
                Rank
            </th>
            <th>
                Player
            </th>
            <th>
                Points
            </th>
            <th>
                Playtime
            </th>
            <th>
                Last Online
            </th>
        </tr>
    </thead>
    <tbody>
    </body>           
</table>
@endsection

@push('custom_scripts')
<script type="text/javascript"> 
    var datatable_toprank_options = null;
    var datatable_toprank = null;


    datatable_toprank_options = Object.create(datatable_global_options);
    datatable_toprank_options.processing = true;
    datatable_toprank_options.serverSide = true;
    datatable_toprank_options.ordering = false;
    datatable_toprank_options.ajax = {};
    datatable_toprank_options.ajax.url = "{{route('api.ranking')}}";
    datatable_toprank_options.ajax.data = null;
    datatable_toprank_options.stateSave= true;

    datatable_toprank = $('#datatables_top_players').DataTable(datatable_toprank_options);
</script>
@endpush