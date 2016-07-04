@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Order List</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/orderlists/add') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">List Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('frequency') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Frequency</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="frequency" value="{{ old('frequency') }}">

                                @if ($errors->has('frequency'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('frequency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_delivery_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Start delivery date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="start_delivery_date" value="{{ old('start_delivery_date') }}">

                                @if ($errors->has('start_delivery_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_delivery_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('scheduled_delivery_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Scheduled delivery date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="scheduled_delivery_date" value="{{ old('scheduled_delivery_date') }}">

                                @if ($errors->has('scheduled_delivery_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('scheduled_delivery_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('actual_delivery_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Actual delivery date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="actual_delivery_date" value="{{ old('actual_delivery_date') }}">

                                @if ($errors->has('actual_delivery_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('actual_delivery_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('home_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Home</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="home_id">
                                @foreach($homes as $home)
                                    <option value="{{ $home->id }}">{{ $home->city }}, {{ $home->district }}, {{ $home->address }}, {{ $home->pincode }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-plus"> Add Order List</i>
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
