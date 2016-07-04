<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderproduct?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>Order Id</th> 
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td style="vertical-align:middle;" align="right">{{ $orderproduct->order_id }}</td> 
                            <td style="vertical-align:middle;">{{ $orderproduct->product->name }}</td>
                            <td style="vertical-align:middle;" align="right">Rs. {{ $orderproduct->price }}</td>
                            <td style="vertical-align:middle;" align="right">{{ $orderproduct->quantity }}</td>
                        </tr>
                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/orderproducts/delete/'.$orderproduct->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
