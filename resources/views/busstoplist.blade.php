@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach ($bus_stops as $bus_stop)
                        <li>{{ $bus_stop->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection