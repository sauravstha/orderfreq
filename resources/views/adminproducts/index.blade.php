@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-12">
        <div style="float: right;"><a href="{{ url('/admin/products/add') }}" class="btn btn-success" type="button" style="text-align: center;">Add Product</a></div>
        <h3 style="text-align: center;">Products</h3>
            <br>
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>Product photo</th> 
                        <th>Name</th> 
                        <th>Description</th>
                        <th>Cost price</th>
                        <th>Selling price</th>
                        <th>Category</th> 
                        <th>Stock quantity</th> 
                        <th></th> 
                        <th></th> 
                    </thead>
                    <tbody style="text-align:left;">
                        @foreach ($products as $product)
                        <tr>
                            <td><img src=" {{ asset($productUploadPath .$product->photo) }} " height ="150px"></td>
                            <td style="vertical-align:middle;">{{ $product->name }}</td> 
                            <td style="vertical-align:middle;">{{ $product->description }}</td>
                            <td style="vertical-align:middle;" align="right">Rs. {{ $product->cost_price }}</td>
                            <td style="vertical-align:middle;" align="right">Rs. {{ $product->selling_price }}</td>
                            <td style="vertical-align:middle;">{{ $product->category->name }}</td>
                            <td style="vertical-align:middle;" align="right">{{ $product->stock_quantity }}</td>
                            <td style="vertical-align:middle;"><a href="{{ url('/admin/products/edit/'.$product->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a></td>
                            <td style="vertical-align:middle;"><a href="{{ url('/admin/products/delete/confirm/'.$product->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" class="modal-modal btn btn-xs glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></a></td>
                        </tr>

                        @endforeach
                    </tbody>
            
                </table> 
            </div>
        </div>
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
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
