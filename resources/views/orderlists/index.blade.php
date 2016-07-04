@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <div>
                <div style="float: right;"><a href="{{ url('/orderlists/add') }}" class="btn btn-success" type="button">Add New Order List</a></div>
                <h3 style="text-align: center;">Order lists</h3>
            </div>
            <br/>
            
            @foreach ($orderlists as $orderlist)
            <div class="col-sm-4" style="text-align: center; margin-bottom: 30px">
                    <div class="panel panel-default" title="{{ $product->name }}">
                        <div class="panel-heading" style="clear: both; display: block; overflow: hidden; white-space:pre;"><a href="{{ url('/orderlists/details/'.$orderlist->id) }}">{{ $orderlist->name }}</a></div>
                        
                        <div class="panel-body" >
                            Total Items: {{ $orderlist->orderlistProducts()->count() }}<br/> 

                            Next delivery date: {{ $orderlist->actual_delivery_date }}<br/>

                            Frequency: {{ $orderlist->frequency }}<br/>

                            Delivery Address: {{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}<br/>

                            <a href="{{ url('/orderlists/'.$orderlist->id . '/add/' . $product->id) }}" class="btn btn-xs glyphicon glyphicon-plus" data-toggle="tooltip" title="Add items to this list"></a>
                                
                            <a href="{{ url('orderlists/edit/'.$orderlist->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a>

                            <a class="modal-modal btn btn-xs glyphicon glyphicon-trash" href="{{ url('orderlists/delete/confirm/'.$orderlist->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" data-toggle="tooltip" title="Delete"></a>
                        </div>
                    </div>
            </div>  
            @endforeach
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th style="vertical-align:middle;">Order List Name</th>
                            <th style="vertical-align:middle;">Total Items</th> 
                            <th style="vertical-align:middle;">Next Delivery Date</th>
                            <th style="vertical-align:middle;">Frequency</th>
                            <th style="vertical-align:middle;">Delivery Address</th>
                            <th style="vertical-align:middle;"></th>
                            <th style="vertical-align:middle;"></th>
                            <th style="vertical-align:middle;"></th>
                        </thead>
                        <tbody>
                            @foreach ($orderlists as $orderlist)
                            <tr>
                                <td style="vertical-align:middle;"><a href="{{ url('/orderlists/details/'.$orderlist->id) }}">{{ $orderlist->name }}</a></td>

                                <td align="right" style="vertical-align:middle;">{{ $orderlist->orderlistProducts()->count() }}</td> 

                                <td style="vertical-align:middle;">{{ $orderlist->actual_delivery_date }}</td>

                                <td align="right" style="vertical-align:middle;">{{ $orderlist->frequency }}</td>

                                <td style="vertical-align:middle;">{{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}</td>

                                <td style="vertical-align:middle;"><a href="{{ url('/orderlists/'.$orderlist->id . '/add/' . $product->id) }}" class="btn btn-xs glyphicon glyphicon-plus" data-toggle="tooltip" title="Add items to this list"></a></td>
                                
                                <td style="vertical-align:middle;">
                                    <a href="{{ url('orderlists/edit/'.$orderlist->id) }}" class="btn btn-xs glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a>
                                </td>
                                <td style="vertical-align:middle;">

                                <a>
                                <a class="modal-modal btn btn-xs glyphicon glyphicon-trash" href="{{ url('orderlists/delete/confirm/'.$orderlist->id) }}" data-toggle="modal" data-target=".bs-example-modal-lg" data-toggle="tooltip" title="Delete"></a></a>
                                </td>
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
