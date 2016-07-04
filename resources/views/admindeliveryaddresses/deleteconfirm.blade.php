<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderlistproduct?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>User</th> 
                        <th>Address</th>
                        <th>City</th> 
                        <th>District</th>
                        <th>Pincode</th> 
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td style="vertical-align:middle;">{{ $deliveryaddress->user->first_name }} {{ $deliveryaddress->user->last_name }}</td> 
                            <td style="vertical-align:middle;">{{ $deliveryaddress->address }}</td>
                            <td style="vertical-align:middle;">{{ $deliveryaddress->city }}</td> 
                            <td style="vertical-align:middle;">{{ $deliveryaddress->district }}</td> 
                            <td style="vertical-align:middle;">{{ $deliveryaddress->pincode }}</td> 
                        </tr>
                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/deliveryaddresses/delete/'.$deliveryaddress->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
