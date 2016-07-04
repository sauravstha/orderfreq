@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
    <div class="row">
        <div >
            <div>
                <h3>Profile</h3>

                <div class="col-md-12">

                    <td class="table-text">
                        <div>
                            <img src="{{ $photo }}" height ="250px">
                        </div>
                    </td>
                    <br>
                    </div>
                <div class="col-md-6">
                    <h4>User Details</h4>

                    <td class="table-text">
                        <div>First Name: {{ $user->first_name }}</div>
                    </td>

                    <td class="table-text">
                        <div>Last Name: {{ $user->last_name }}</div>
                    </td>

                    <td class="table-text">
                        <div>Username: {{ $user->username }}</div>
                    </td>

                    <td class="table-text">
                        <div>Phone: {{ $user->phone }}</div>
                    </td>

                    <td class="table-text">
                        <div>Email: {{ $user->email }}</div>
                    </td>

                    <td class="table-text">
                        <div>Member since: {{ $user->created_at }}</div>
                    </td>

                    @foreach($user->roles as $role)
                        <td class="table-text">
                            <div>Role: {{ $role->name }}</div>
                        </td>
                    @endforeach
                </div>

                <div class="col-md-6">
                <h4>Update Details</h4>

                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Roles</label>

                            <div class="col-md-6">
                                <select name="roles[]" multiple>
                                    @foreach($roles as $role)
                                        @if(roleExists($role, $user->roles))
                                            <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                        
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('roles'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roles') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">

                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="fa fa-btn fa-save btn btn-success">
                                    Save
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
