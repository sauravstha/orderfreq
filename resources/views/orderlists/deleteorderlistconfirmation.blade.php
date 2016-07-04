<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete orderlist - {{ $orderlist->name }}?</h3>
        <div>
            <h4>List Details</h4>
            
                <br/>
                <div class="table-responsive">
                    <table class="table table-hover" style="text-align: left;">
                        <thead>
                            <th>Product Name</th>
                            <th align="right">Quantity</th>
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
            Address: {{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}
        </div>
        <br>
        <div>
        <a href="{{ url('orderlists/delete/'.$orderlist->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
