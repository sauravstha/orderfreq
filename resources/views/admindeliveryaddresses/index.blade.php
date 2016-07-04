@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">

        <div style="float: right;"><a href="{{ url('/admin/deliveryaddresses/add') }}" class="btn btn-success" type="button">Add Delivery Address</a></div>
        <h3 style="text-align: center;">Delivery Addresses</h3>
            <br>
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>User</th> 
                        <th>Address</th>
                        <th>City</th> 
                        <th>District</th>
                        <th>Pincode</th> 
                        <th></th> 
                        <th></th> 
                    </thead>
                    <tbody style="text-align:left;">
                        @foreach ($deliveryaddresses as $deliveryaddress)
                        <tr>
                            <td style="vertical-align:middle;">{{ $deliveryaddress->user->first_name }} {{ $deliveryaddress->user->last_name }}</td> 
                            <td style="vertical-align:middle;">{{ $deliveryaddress->address }}</td>
                            <td style="vertical-align:middle;">{{ $deliveryaddress->city }}</td> 
                            <td style="vertical-align:middle;">{{ $deliveryaddress->district }}</td> 
                            <td style="vertical-align:middle;">{{ $deliveryaddress->pincode }}</td> 
                            <td><a href="{{ url('/admin/deliveryaddresses/edit/'.$deliveryaddress->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a></td>
                            <td><a href="{{ url('/admin/deliveryaddresses/delete/confirm/'.$deliveryaddress->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" class="modal-modal btn btn-xs glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></a></td>
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
