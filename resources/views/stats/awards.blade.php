@extends("layout.app")

@section('content')
<center>
    <h2>Rank Awards</h2>
</center>
<hr>
<div class="col-lg-16">
    @foreach($awards_array as $award)
        <div class="card mb-4">
            <div class="card-body">
                {!! sprintf($award["description"], route('stats.individual', ['steamid' => $award["top"][0]->steamid ]), htmlentities($award["top"][0]->name), htmlentities($award["top"][0]->score)) !!}<br>
                <a href="{{route('stats.individual', ['steamid' => $award["top"][1]->steamid ])}}">{{$award["top"][1]->name}}</a> came in 2nd with <b>{{$award["top"][1]->score}}</b><br>
                <a href="{{route('stats.individual', ['steamid' => $award["top"][2]->steamid ])}}">{{$award["top"][2]->name}}</a> came in 3rd with <b>{{$award["top"][2]->score}}</b>
            </div> 
        </div>
    @endforeach
</div>
@endsection

@push('custom_scripts')
@endpush