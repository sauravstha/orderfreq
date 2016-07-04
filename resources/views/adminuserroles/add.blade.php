@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add User Role</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/userroles/add') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}


                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">User</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Role</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-plus"> Add User Role</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
