@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-12">
        
        <div style="float: right;"><a href="{{ url('/admin/orderlists/add') }}" class="btn btn-success" type="button">Add Order List</a></div>

        <h3 style="text-align: center;">Orderlists</h3>
            <br>
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
                        <th></th> 
                        <th></th> 
                    </thead>
                    <tbody style="text-align:left;">
                        @foreach ($orderlists as $orderlist)
                        <tr>
                            <td style="vertical-align:middle;">{{ $orderlist->name }}</td> 
                            <td style="vertical-align:middle;">{{ $orderlist->home->user->first_name }} {{ $orderlist->home->user->last_name }}</td> 
                            <td style="vertical-align:middle;" align="right">{{ $orderlist->frequency }}</td>
                            <td style="vertical-align:middle;">{{ $orderlist->start_delivery_date }}</td> 
                            <td style="vertical-align:middle;">{{ $orderlist->scheduled_delivery_date }}</td> 
                            <td style="vertical-align:middle;">{{ $orderlist->actual_delivery_date }}</td>
                            <td style="vertical-align:middle;">{{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}</td>
                            <td><a href="{{ url('/admin/orderlists/edit/'.$orderlist->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a></td>
                            <td><a href="{{ url('/admin/orderlists/delete/confirm/'.$orderlist->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" class="modal-modal btn btn-xs glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></a></td>
                        </tr>

                        @endforeach
                    </tbody>
            
                </table> 
            </div>
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
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection
