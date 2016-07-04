@extends('layouts.app')

@section('content')
<div class="container" style="text-align: justify;">
<div class="row">
    <div class="col-md-12">
        <h3 style="text-align: center;">How It Works?</h3>
        <br>
    </div>
    <div class="col-md-4">
        <h4 style="text-align: center;">Create Order List</h4>
            <br>-> Create order list according to your requirements.
            <br>-> You can create multiple lists as well.
            <br>-> Set special list for special occasions.
    </div>
    <div class="col-md-4">
        <h4 style="text-align: center;">Set First Delivery Date and Need Frequency</h4>
            <br>-> Set date for first delivery date and repeat frequency.
            <br>-> Set address for delievery.
    </div>
    <div class="col-md-4">
        <h4 style="text-align: center;">Relax!</h4>
            <br>-> Just wait for your orders to get delivered in your home on required date.
            <br>-> No need to worry about anything. Just relax after setting order once.
    </div>
    <div class="col-md-12" style="text-align: center;">
        <br>
        <a href="{{ url('/products') }}" type="button" class="btn btn-success">Make Order Now</a>
    </div>
</div>
</div>
@endsection
