@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Orderproduct</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/orderproducts/add') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}


                        <div class="form-group{{ $errors->has('order_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Order Id</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="order_id">
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="product_id">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">

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
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">

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
                                    <i class="fa fa-btn fa-plus"></i>Add Orderproduct
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
