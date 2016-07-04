
<div style="text-align: center;">
    <h3>Edit Order Item</h3>
    <div class="row">
        <div class="col-md-12">
            <h4>"{{ $orderlistProduct->product->name }}" on Orderlist "{{ $orderlistProduct->orderlist->name }}" </h4>     

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/orderlists/'.$orderlist->id . '/edit/products/'.$orderlistProduct->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}


                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="quantity" value="{{  old('quantity',$orderlistProduct->quantity) }}">

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
                                    <i class="glyphicon glyphicon-refresh"> Update</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>

    </div>
</div>
