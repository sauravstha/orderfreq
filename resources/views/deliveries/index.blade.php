@extends('layouts.app')

@section('content')
<div class="container" style=" text-align:center;">
    <div class="row">
        <div class="col-md-12">
        <h3>Deliveries</h3>
                <div class="table-responsive">
                    <table class="table table-hover" >
                        <thead>
                            <th>Order List Name</th>
                            <th>Customers</th> 
                            <th>Address</th>
                            <th>Contact</th> 
                            <th>Delivery date</th> 
                        </thead>
                        <tbody style="text-align:left;">
                            @foreach ($orderlists as $orderlist)
                            <tr>
                                <td><a href="{{ url('/deliveries/details/'.$orderlist->id) }}">{{ $orderlist->name }}</a></td>
                                <td>{{ $orderlist->home->user->first_name }} {{ $orderlist->home->user->last_name }}</td> 
                                <td>{{ $orderlist->home->city }}, {{ $orderlist->home->district }}, {{ $orderlist->home->address }}, {{ $orderlist->home->pincode }}</td>
                                <td>{{ $orderlist->home->phone }}</td> 
                                <td>{{ $orderlist->actual_delivery_date }}</td> 
                            </tr>

                            @endforeach
                        </tbody>
                
                    </table>                    
                   
    </div>
</div>
@endsection
