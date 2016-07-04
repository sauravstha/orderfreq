@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-12">

        <div style="float: right;"><a href="{{ url('/admin/orders/add') }}" class="btn btn-success" type="button">Add Order</a></div>
        <h3 style="text-align: center;">Orders</h3>
            <br>
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>User</th>
                        <th>Order Date</th> 
                        <th>Delivery Date</th>
                        <th>Delivered Date</th> 
                        <th>Delivery address</th> 
                        <th>Order List</th>
                        <th></th> 
                        <th></th> 
                    </thead>
                    <tbody style="text-align:left;">
                        @foreach ($orders as $order)
                        <tr>
                            <td style="vertical-align:middle;">{{ $order->orderlist->home->user->first_name }} {{ $order->orderlist->home->user->last_name }}</td> 
                            <td style="vertical-align:middle;">{{ $order->order_date }}</td> 
                            <td style="vertical-align:middle;">{{ $order->delivery_date }}</td>
                            <td style="vertical-align:middle;">{{ $order->delivered_date }}</td> 
                            <td style="vertical-align:middle;">{{ $order->deliveryaddress->city }}, {{ $order->deliveryaddress->district }}, {{ $order->deliveryaddress->address }}, {{ $order->deliveryaddress->pincode }}</td> 
                            <td style="vertical-align:middle;">{{ $order->orderlist->name }}</td>
                            <td><a href="{{ url('/admin/orders/edit/'.$order->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a></td>
                            <td><a href="{{ url('/admin/orders/delete/confirm/'.$order->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" class="modal-modal btn btn-xs glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></a></td>
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
