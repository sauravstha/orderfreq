<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderproduct?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>User</th>
                        <th>Order Date</th> 
                        <th>Delivery Date</th>
                        <th>Delivered Date</th> 
                        <th>Delivery address</th> 
                        <th>Order List</th>
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td style="vertical-align:middle;">{{ $order->orderlist->home->user->first_name }} {{ $order->orderlist->home->user->last_name }}</td> 
                            <td style="vertical-align:middle;">{{ $order->order_date }}</td> 
                            <td style="vertical-align:middle;">{{ $order->delivery_date }}</td>
                            <td style="vertical-align:middle;">{{ $order->delivered_date }}</td> 
                            <td style="vertical-align:middle;">{{ $order->deliveryAddress->address }}</td> 
                            <td style="vertical-align:middle;">{{ $order->orderlist->name }}</td>
                        </tr>
                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/orders/delete/'.$order->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
