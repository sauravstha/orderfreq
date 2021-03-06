@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/products/edit/'.$product->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{  old('name',$product->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cost_price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cost Price</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="cost_price" value="{{ old('cost_price', $product->cost_price) }}">

                                @if ($errors->has('cost_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('selling_price') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Selling Price</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="selling_price" value="{{ old('selling_price', $product->selling_price) }}">

                                @if ($errors->has('selling_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('selling_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stock_quantity') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Stock Quantity</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}">

                                @if ($errors->has('stock_quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stock_quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="category_id">
                                @foreach($categories as $category)
                                    @if ($category->id == $product->category->id)
                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div style="text-align: center;">
                                <img src=" {{ asset($productUploadPath .$product->photo) }} " height ="250px">
                        </div>
    
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-refresh"> Update</i>
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
