<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
    	<form method="POST" action="{{ url('/orderlists/'.$orderlist->id . '/delete/products/'.$orderlistProduct->id) }}">
    		{!! csrf_field() !!}
	        <h3>Are you sure you want to delete item "{{ $orderlistProduct->product->name }}" from order list "{{ $orderlist->name }}"?</h3>
	        
	        <br>
	        <div>
		        <button type="submit" class="btn btn-success" style="width: 45%">Yes</button>
		        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
	        </div>
        </form>
    </div>
</div>
