<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderlistproduct?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>Product</th> 
                        <th>Quantity</th>
                        <th>User</th>
                        <th>Order list</th>
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td style="vertical-align:middle;">{{ $orderlistproduct->product->name }}</td> 
                            <td style="vertical-align:middle;" align="right">{{ $orderlistproduct->quantity }}</td>
                            <td style="vertical-align:middle;">{{ $orderlistproduct->orderlist->home->user->first_name }} {{ $orderlistproduct->orderlist->home->user->last_name }}</td>
                            <td style="vertical-align:middle;">{{ $orderlistproduct->orderlist->name }}</td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/orderlistproducts/delete/'.$orderlistproduct->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
