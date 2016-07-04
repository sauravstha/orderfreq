@extends('layouts.app')

@section('content')
<div class="col-sm-2" style="text-align: center;">
    <h3>Categories</h3>
    <br>
    <div>
        <a href="{{ url('/products') }}" class="btn btn-primary" role="button" style="width: 100%">All products</a>
        @foreach ($categories as $category)
        <a href="{{ url('/products/categories/'.$category->id) }}" class="btn btn-primary" role="button" style="width: 100%">{{ $category->name }}</a>
        @endforeach
    </div>
</div>

<div class="container" style="text-align: center;">
    <div class="row">
        <div class="col-sm-10">

            @if ($currentCategory == NULL) 
            <h3>Products</h3>
            @endif

            @foreach ($categories as $category)
            @if ( $category->id == $currentCategory )
            <h3>Products by {{ $category->name }}</h3>
            @endif 
            @endforeach

            <br />
            @foreach ($products as $product)
            <div class="col-sm-4" style="text-align: center; margin-bottom: 30px">
                <a class="modal-modal" href="{{ url('/orderlists/products/'. $product->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg">
                    <div class="panel panel-default" title="{{ $product->name }}">
                        <div class="panel-heading" style="clear: both; display: block; overflow: hidden; white-space:pre;">{{ $product->name }}</div>
                        <div class="panel-body" >
                            <img src="{{ asset($productUploadUrl . $product->photo) }}" height="100px">
                        </div>
                        <div class="panel-footer">Rs. {{ $product->selling_price }}</div>
                    </div>
                </a>
            </div>  
            @endforeach

        </div>
        {!! $products->render() !!}
    </div>
</div>

<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>


<script type="text/javascript">
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });
</script>

@endsection
