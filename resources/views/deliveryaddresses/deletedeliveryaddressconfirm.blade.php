<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete this delivery address?</h3>
        <h4>Delivery address details</h4>
        <table class="table table-hover" >
                        <thead>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>City</th> 
                            <th>District</th>
                            <th>Pincode</th> 
                        </thead>
                        <tbody style="text-align:left;">
                            <tr>
                                <td>{{ $deliveryaddress->user->first_name }} {{ $deliveryaddress->user->last_name }}</td> 
                                <td>{{ $deliveryaddress->address }}</td>
                                <td>{{ $deliveryaddress->city }}</td> 
                                <td>{{ $deliveryaddress->district }}</td>
                                <td>{{ $deliveryaddress->pincode }}</td> 
                                <td>
                            </tr>
                        </tbody>
                
                    </table>  
        
        <br>
        <div>
        <a href="{{ url('deliveryaddresses/delete/'.$deliveryaddress->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
