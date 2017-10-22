@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Wecome {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{ route('nearest_bus_stop', ['lat' => 1.296988, 'lng' => 103.840285]) }}">View nearest bus stop</a></li>
                        <li><a href="{{ route('bus.create') }}">Register new bus</a></li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
