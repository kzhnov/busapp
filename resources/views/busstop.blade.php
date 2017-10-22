@extends('layouts.app')

@section('stylesheets')
    <link href="{{ asset('css/nearest_bus_stop.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}: {{ $bus_stop_name }}</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bus No.</th>
                            <th>Waiting Time (min)</th>
                        </tr>
                        @foreach ($buses_info as $bus_name => $waiting_time)
                            <tr>
                                <td>{{ $bus_name }}</td>
                                <td>{{ implode(', ', $waiting_time) }}</td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection