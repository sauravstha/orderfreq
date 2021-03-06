@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Orderlistproductproduct</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/orderlistproducts/add') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

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
                                    <i class="fa fa-btn fa-plus"></i>Add Orderlistproduct
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
