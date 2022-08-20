@extends("layout.app")

@section('content')
<center>
    <h2>Players Online</h2>
</center>
<hr>
<table class="table" id="datatables_top_players">
    <thead>
        <tr>
            <th>
                Player			
            </th>
            <th>
                Points
            </th>
            <th>
                Gamemode
            </th>
            <th>
                Rank
            </th>
            <th>
                Total Playtime
            </th>
        </tr>
    </thead>
    <tbody>
    </body>           
</table>
@endsection

@push('custom_scripts')
<script type="text/javascript"> 
    var datatable_online_options = null;
    var datatable_online = null;


    datatable_online_options = Object.create(datatable_global_options);
    datatable_online_options.processing = true;
    datatable_online_options.serverSide = true;
    datatable_online_options.ordering = false;
    datatable_online_options.ajax = {};
    datatable_online_options.ajax.url = "{{route('api.online')}}";
    datatable_online_options.ajax.data = null;
    datatable_online_options.stateSave = true;
    datatable_online_options.searching = false;
    datatable_online_options.bInfo = false;
    datatable_online_options.bLengthChange = false;
    datatable_online_options.paging = false;
    datatable_online_options.bPaginate = false;

    datatable_online = $('#datatables_top_players').DataTable(datatable_online_options);
</script>
@endpush