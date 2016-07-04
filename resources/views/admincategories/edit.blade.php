@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Category</div>       

                <div class="panel-body">
                        
                    
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/categories/edit/'.$category->id) }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{  old('name',$category->name) }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Parent Category</label>
                            <div class="col-md-6">
                                <select class= "form-control" name="parent_id">
                                @if($category->parent_id == NULL)
                                    <option selected value="">---</option>
                                @else
                                    <option value="">---</option>
                                @endif
                                @foreach($categories as $cat)
                                    @if ($cat->id == $category->parent_id)
                                        <option selected value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @else
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="glyphicon glyphicon-refresh"></i> Update
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
