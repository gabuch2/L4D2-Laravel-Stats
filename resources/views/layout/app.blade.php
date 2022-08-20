<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{env('COMMUNITY_NAME')}} - Left 4 Dead Stats</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="{{asset('vendor/BootStrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('vendor/DataTables-1.12.1/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="http://fonts.cdnfonts.com/css/dot-matrix" rel="stylesheet">
        <style>
            /* hack, I can't use blade functions in css files */
            .header-image 
            {
                background-image: url({{\CommonFunctions::get_random_header_image()}});
                background-position: 50% 20%;
                background-repeat: no-repeat;
                background-size: cover;
                padding: 0px !important;
                height: 100%;
            }

            .backdrop_filter
            {
                flex: 1;
                width: 100%;
                height: 100%;
                backdrop-filter: blur(3px);
            }

            .motd_message
            {
                font-family: 'Dot Matrix', sans-serif;
                color: greenyellow;
                text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
                font-size: 1.35em;
            }

            .title_name
            {
                text-shadow: 0px 0px 9px #000000;
            }

            table
            {
                width:100% !important;
            }
        </style>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Left 4 Dead Stats</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="collapseExample">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        {{-- Links go Here --}}
                        {{-- <li class="nav-item"><a class="nav-link" href="https://your_discord_invite/">Discord Server</a></li> --}}
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4 header-image blur-bgimage" style="display: flex; flex-direction: column;">
            <div class="backdrop_filter">
                <div class="container">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder text-white title_name">{{env('COMMUNITY_NAME')}}</h1>
                    </div>
                    <marquee class="motd_message flex-fill" direction="left">
                        {{\CommonFunctions::get_message_of_the_day()}}
                    </marquee>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Main Content-->
                <div class="col-lg-8">
                    @include('flash::message')
                    @yield('content')
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="list-group">
                            <a href="{{route('stats.online')}}" class="list-group-item list-group-item-action {{ (request()->is('/')) ? 'active' : '' }}">Players Online</a>
                            <a href="{{route('stats.ranking')}}" class="list-group-item list-group-item-action {{ (request()->is('playerlist') || request()->is('player')) ? 'active' : '' }}">Player Rankings</a>
                            <a href="{{route('stats.awards')}}"" class="list-group-item list-group-item-action {{ (request()->is('awards')) ? 'active' : '' }}">Rank Awards</a>
                            <a href="{{route('stats.server')}}" class="list-group-item list-group-item-action {{ (request()->is('server')) ? 'active' : '' }}">Server Stats</a>
                        </div>
                    </div>
                    <!-- Top 10 Players Widget-->
                    <div class="card mb-4">
                        <div class="card-header">Top 10 Players</div>
                        <div class="card-body">
                            <table class="table">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $top10players = \CommonFunctions::top_10_players();
                                    @endphp
                                    @foreach($top10players as $player)
                                    <tr>
                                        <td>
                                            {{$player->position}}
                                        </td>
                                        <td>
                                            <a href="{{route('stats.individual', ['steamid' => $player->steamid ])}}">{{$player->name}}</a>
                                        </td>
                                        <td>
                                            {{$player->points}} points
                                        </td>
                                    </tr>
                                    @endforeach
                                </body>           
                            </table>
                        </div>
                    </div>
                    <!-- Side widget-->
                    @if(env('DISCORD_GUILD_ID', 0) > 0)
                    @php
                        $widget_url = sprintf("https://discord.com/widget?id=%d&theme=light", env('DISCORD_GUILD_ID', 0));
                    @endphp
                    <div class="card mb-4">
                        <iframe src="{{$widget_url}}" width="100%" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Laravel L4D2 Stats &#127279; <a href="https://github.com/gabuch2">gabuch2</a></p>
                <p class="m-0 text-center text-white">Custom Player Stats &#127279; <a href="https://github.com/muukis">muukis</a></p>
                <p class="m-0 text-center text-white">{{date("Y")}}</p>
            </div>
        </footer>
    </body>
</html>

<script src="{{asset('vendor/jQuery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('vendor/BootStrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/DataTables-1.12.1/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/DataTables-1.12.1/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('vendor/Responsive-2.3.0/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendor/Responsive-2.3.0/js/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('vendor/Masonry/js/masonry.pkgd.min.js')}}"></script>

<script>
    var datatable_global_options = {
        "dom": "lftip",    
        "responsive": true,
        "buttons": [],
        "searching": true,
        "deferRender": true,
        "order": [[ 0, "desc" ]],
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
        "bInfo": true,
        "bLengthChange": true,
        "paging": true,
        "bPaginate": true,
        // "language": {
        //     "emptyTable":"No existe información para ser mostrada",
        //     "search": "Buscar:",
        //     "zeroRecords":"No se encontraron registros coincidentes",
        //     "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        //     "infoEmpty":"Mostrando 0 a 0 de 0 filas",
        //     "lengthMenu":"Mostrar _MENU_ filas",
        //     "paginate": {
        //         "previous": "Anterior",
        //         "next": "Siguiente",
        //     },
        // }
    };

    var datatable_minimal_options = {
        "dom": "",    
        "responsive": true,
        "buttons": [],
        "searching": false,
        "deferRender": false,
        "order": [[ 1, "desc" ]],
        "bInfo": false,
        "bLengthChange": false,
        "paging": false,
        "bPaginate": false,
    };


    $('.masonry').masonry();
    $('.stat_table').DataTable(datatable_minimal_options);
</script>

@stack('custom_scripts')