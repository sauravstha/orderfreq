@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Order</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/orders/add') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('order_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="order_date" value="{{ old('order_date') }}">

                                @if ($errors->has('order_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('delivery_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Delivery Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="delivery_date" value="{{ old('delivery_date') }}">

                                @if ($errors->has('delivery_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delivery_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('delivered_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Delivered date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="delivered_date" value="{{ old('delivered_date') }}">

                                @if ($errors->has('delivered_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delivered_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('deliveryaddress_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Delivery Address</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="deliveryaddress_id">
                                @foreach($deliveryaddresses as $deliveryaddress)
                                    <option value="{{ $deliveryaddress->id }}">{{ $deliveryaddress->city }}, {{ $deliveryaddress->district }}, {{ $deliveryaddress->address }}, {{ $deliveryaddress->pincode }}, User: {{ $deliveryaddress->user->first_name }} {{ $deliveryaddress->user->last_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('orderlist_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order List</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="orderlist_id">
                                @foreach($orderlists as $orderlist)
                                    <option value="{{ $orderlist->id }}">{{ $orderlist->name }}, User: {{ $orderlist->home->user->first_name }} {{ $orderlist->home->user->last_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-plus"></i>Add Order
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
