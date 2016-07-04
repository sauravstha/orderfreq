@extends('layouts.app')

@section('content')

<div class="container" style="text-align: center;">
    <div class="row">
        <h3>Welcome to Orderfreq!</h3>
        <br>

            @if (Auth::user()->roles()->where('name', 'Admin')->count() >= 1)
            <div class="col-sm-12">
            @elseif (!Auth::user()->roles()->where('name', 'Admin')->count() >= 1)
            <div class="col-sm-6">
            @endif
                <h4>My Profile</h4>
                <br>
                <a href="{{ url('/user') }}" class="photo" style="width: 100%"><img src="{{ $photo }}" height ="250px"></a>
                <br>
                {{ $user->first_name }} {{ $user->last_name }}<br>
                Member since: {{ $user->created_at }}
            
            </div>
            @if (!Auth::user()->roles()->where('name', 'Admin')->count() >= 1)
            <div class="col-sm-6">
            <h4>My Orders</h4>
            <br>
            <a href="{{ url('/orderlists') }}" class="btn btn-primary" role="button" style="width: 100%">Orders</a>
            <br>
            @endif
            
            </div>
    </div>
</div>
@endsection
