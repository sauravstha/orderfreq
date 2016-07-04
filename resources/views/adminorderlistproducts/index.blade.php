@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-12">

        <div style="float: right;"><a href="{{ url('/admin/orderlistproducts/add') }}" class="btn btn-success" type="button">Add Order List Product</a></div>
        <h3 style="text-align: center;">Orderlist Products</h3>
            <br>
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>Product</th> 
                        <th>Quantity</th>
                        <th>User</th>
                        <th>Order list</th>
                        <th></th> 
                        <th></th> 
                    </thead>
                    <tbody style="text-align:left;">
                        @foreach ($orderlistproducts as $orderlistproduct)
                        <tr>
                            <td style="vertical-align:middle;">{{ $orderlistproduct->product->name }}</td> 
                            <td style="vertical-align:middle;" align="right">{{ $orderlistproduct->quantity }}</td>
                            <td style="vertical-align:middle;">{{ $orderlistproduct->orderlist->home->user->first_name }} {{ $orderlistproduct->orderlist->home->user->last_name }}</td>
                            <td style="vertical-align:middle;">{{ $orderlistproduct->orderlist->name }}</td>
                            <td><a href="{{ url('/admin/orderlistproducts/edit/'.$orderlistproduct->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a></td>
                            <td><a href="{{ url('/admin/orderlistproducts/delete/confirm/'.$orderlistproduct->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" class="modal-modal btn btn-xs glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></a></td>
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
