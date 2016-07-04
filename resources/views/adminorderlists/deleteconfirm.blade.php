<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderproduct?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>List Name</th>
                        <th>User Name</th> 
                        <th>Frequency</th>
                        <th>Start delivery date</th> 
                        <th>Scheduled delivery date</th> 
                        <th>Actual delivery date</th>
                        <th>Home</th>
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td style="vertical-align:middle;">{{ $orderlist->name }}</td> 
                            <td style="vertical-align:middle;">{{ $orderlist->home->user->first_name }} {{ $orderlist->home->user->last_name }}</td>
                            <td style="vertical-align:middle;" align="right">{{ $orderlist->frequency }}</td>
                            <td style="vertical-align:middle;">{{ $orderlist->start_delivery_date }}</td> 
                            <td style="vertical-align:middle;">{{ $orderlist->scheduled_delivery_date }}</td> 
                            <td style="vertical-align:middle;">{{ $orderlist->actual_delivery_date }}</td>
                            <td style="vertical-align:middle;">{{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}</td>
                        </tr>
                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/orderlists/delete/'.$orderlist->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
