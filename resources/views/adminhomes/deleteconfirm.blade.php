<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderlistproduct?</h3><br/>
        <div class="table-responsive">
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
                            <td style="vertical-align:middle;">{{ $home->user->first_name }} {{ $home->user->last_name }}</td> 
                            <td style="vertical-align:middle;">{{ $home->address }}</td>
                            <td style="vertical-align:middle;">{{ $home->phone }}</td> 
                            <td style="vertical-align:middle;">{{ $home->city }}</td> 
                            <td style="vertical-align:middle;">{{ $home->district }}</td> 
                            <td style="vertical-align:middle;">{{ $home->pincode }}</td> </td>
                        </tr>
                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/homes/delete/'.$home->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
