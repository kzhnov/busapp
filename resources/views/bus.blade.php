@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('register_bus') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Bus No.</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bus_stop_id" class="col-md-4 control-label">Bus Stop</label>
                            <div class="col-md-6">
                                <select name="bus_stop_id" id="bus_stop_id" class="form-control">
                                    @foreach ($bus_stops as $bus_stop)
                                    <option value="{{ $bus_stop->id }}">{{ $bus_stop->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('waiting_time') ? ' has-error' : '' }}">
                            <label for="waiting_time" class="col-md-4 control-label">Waiting Time</label>
                            <div class="col-md-6">
                                <input id="waiting_time" type="number" class="form-control" name="waiting_time" value="{{ old('waiting_time') }}" required min="1" max="60" autofocus>
                                <small class="form-text text-muted">
                                    Waiting must be between 1 and 60.
                                </small>
                                @if ($errors->has('waiting_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('waiting_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection