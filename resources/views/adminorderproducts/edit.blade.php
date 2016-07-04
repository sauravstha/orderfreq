@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Orderproduct</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/orderproducts/edit/'.$orderproduct->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        
                        <div class="form-group{{ $errors->has('order_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order Id</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="order_id">
                                @foreach($orders as $order)
                                    @if ($order->id == $orderproduct->order->id)
                                        <option selected value="{{ $order->id }}">{{ $order->id }}</option>
                                    @else
                                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="product_id">
                                @foreach($products as $product)
                                    @if ($product->id == $orderproduct->product->id)
                                        <option selected value="{{ $product->id }}">{{ $product->name }}</option>
                                    @else
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="price" value="{{  old('price',$orderproduct->price) }}">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="quantity" value="{{  old('quantity',$orderproduct->quantity) }}">

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class=" glyphicon glyphicon-refresh"></i> Update
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
