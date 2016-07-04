@extends('layouts.app')

@section('content')

<div class="container" style="text-align:center;">
    <div class="row">
        <div class="col-sm-12">
            <div>
            <div style="float: right;"><a href="{{ url('/products') }}" class="btn btn-success" type="button" style="text-align: center;">Add Items To This List</a></div>
            <h3>{{ $orderlist->name }} - Details</h3>
            </div>
            
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover" style="text-align: left;">
                        <thead>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub total</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                        <!-- {{ $total = 0 }} -->
                        @foreach($orderlistProducts as $orderlistProduct)
                        <!-- {{ $subTotal = $orderlistProduct->quantity * $orderlistProduct->product->selling_price }} -->
                        <!-- {{ $total += $subTotal }} -->
                        <tr>
                        	<td style="vertical-align:middle;">{{ $orderlistProduct->product->name }}</td>
                            <td align="right" style="vertical-align:middle;">{{ $orderlistProduct->quantity }}</td>
                            <td align="right" style="vertical-align:middle;">Rs. {{ $orderlistProduct->product->selling_price }}</td>
                            <td align="right" style="vertical-align:middle;">Rs. {{ $subTotal }}</td>
                            <td>
                                <a href="{{ url('/orderlists/'.$orderlist->id . '/edit/products/'.$orderlistProduct->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" class="modal-modal btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a>
                            </td>
                            <td>
                                <a class="modal-modal btn btn-xs glyphicon glyphicon-trash" href="{{ url('/orderlists/'.$orderlist->id . '/delete/confirm/products/'.$orderlistProduct->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" data-toggle="tooltip" title="Delete"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th align="right">Rs. {{ $total }}</th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>

            Next Delivery: {{ $orderlist->actual_delivery_date }}<br/>
            Frequency: Every {{ $orderlist->frequency }} days<br/>
            Address: {{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}<br/>
            First Delivery Date: {{ $orderlist->start_delivery_date }}<br/>
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
