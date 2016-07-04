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
                        </thead>
                        <tbody>
                        <!-- {{ $total = 0 }} -->
                        @foreach($orderlistProducts as $orderlistProduct)
                        <!-- {{ $subTotal = $orderlistProduct->quantity * $orderlistProduct->product->selling_price }} -->
                        <!-- {{ $total += $subTotal }} -->
                        <tr>
                        	<td>{{ $orderlistProduct->product->name }}</td>
                            <td align="right">{{ $orderlistProduct->quantity }}</td>
                            <td align="right">Rs. {{ $orderlistProduct->product->selling_price }}</td>
                            <td align="right">Rs. {{ $subTotal }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th align="right">Rs. {{ $total }}</th>
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
@endsection
