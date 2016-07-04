<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-6">
        <h3>Product Details</h3>
        <div class="row">
            <div><img src="{{ asset($productUploadUrl .$product->photo) }}" height ="200px"></div>
            <div>{{ $product->name }}</div>
            <div>Category: {{ $product->category->name }}</div>
            <div>Description: {{ $product->description }}</div>
            <div>Rs. {{ $product->selling_price }}</div>
            
        </div>
    </div>
    <div class="col-sm-6" style="text-align:center;">
        <h3>Add to order list</h3>
        <br/>
             <form class="form-horizontal" role="form" method="POST" action="{{ url('/orderlists/add/products/'.$product->id) }}" enctype="multipart/form-data">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Quantity</label>

                    <div class="col-md-6">
                        <input type="number" min="1" class="form-control" name="quantity" value="{{ old('quantity') }}">

                        @if ($errors->has('quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <hr/>

                <div class="form-group{{ $errors->has('orderlist') ? ' has-error' : '' }}">
                    <label class="control-label">Select order list</label>

                    <div>
                        @foreach ($orderlists as $orderlist)
                        <div class="radio">
                            <label class="radio">
                                <input type="radio" name="orderlist" value="{{ old('orderlist', $orderlist->id) }}">{{ $orderlist->name }}
                            </label>
                        </div>

                        @endforeach

                        @if ($errors->has('orderlist'))
                            <span class="help-block">
                                <strong>{{ $errors->first('orderlist') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-plus"> Add</i>
                        </button>
                    </div>
                </div>
            </form>
    </div>
</div>
