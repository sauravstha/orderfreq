@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Order</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/orders/edit/'.$order->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('order_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="order_date" value="{{  old('order_date',$order->order_date) }}">

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
                                <input type="date" class="form-control" name="delivery_date" value="{{  old('delivery_date',$order->delivery_date) }}">

                                @if ($errors->has('delivery_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('delivery_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('delivered_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Delivered Date</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="delivered_date" value="{{  old('delivered_date',$order->delivered_date) }}">

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
                                    @if ($deliveryaddress->id == $order->deliveryaddress->id)
                                        <option selected value="{{ $deliveryaddress->id }}">{{ $deliveryaddress->city }}, {{ $deliveryaddress->district }}, {{ $deliveryaddress->address }}, {{ $deliveryaddress->pincode }}, User: {{ $deliveryaddress->user->first_name }} {{ $deliveryaddress->user->last_name }}</option>
                                    @else
                                        <option value="{{ $deliveryaddress->id }}">{{ $deliveryaddress->city }}, {{ $deliveryaddress->district }}, {{ $deliveryaddress->address }}, {{ $deliveryaddress->pincode }}, User: {{ $deliveryaddress->user->first_name }} {{ $deliveryaddress->user->last_name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('orderlist_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order List</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="orderlist_id">
                                @foreach($orderlists as $orderlist)
                                    @if ($orderlist->id == $order->orderlist->id)
                                        <option selected value="{{ $orderlist->id }}">{{ $orderlist->name }}, User: {{ $orderlist->home->user->first_name }} {{ $orderlist->home->user->last_name }}</option>
                                    @else
                                        <option value="{{ $orderlist->id }}">{{ $orderlist->name }}, User: {{ $orderlist->home->user->first_name }} {{ $orderlist->home->user->last_name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-refresh"></i> Update
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
