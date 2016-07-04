<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete this home?</h3>
        <h4>Home details</h4>
        <table class="table table-hover" >
                        <thead>
                            <th>User</th>
                            <th>Address</th>
                            <th>Phone Number</th> 
                            <th>City</th>
                            <th>District</th>
                            <th>Pincode</th>
                        </thead>
                        <tbody style="text-align:left;">
                            <tr>
                                <td>{{ $home->user->first_name }} {{ $home->user->last_name }}</td>
                                <td>{{ $home->address }}</td>
                                <td>{{ $home->phone }}</td> 
                                <td>{{ $home->city }}</td>
                                <td>{{ $home->district }}</td>
                                <td>{{ $home->pincode }}</td>
                            </tr>
                        </tbody>
                
                    </table>  
        
        <br>
        <div>
        <a href="{{ url('homes/delete/'.$home->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href=""class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
