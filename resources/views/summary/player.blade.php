@extends("layout.app")

@section('content')
<center>
    <h2>{{$stats->name}}</h2>
</center>
<hr>
@include('summary.layout')
@endsection
