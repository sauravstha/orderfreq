<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete this user role relation?</h3><br/>
        <h5>{{ $userrole->user->first_name }} {{ $userrole->user->last_name }} = {{ $userrole->role->name }}</h5>
        
        <br>
        <div>
        <a href="{{ url('/admin/userroles/delete/'.$userrole->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
