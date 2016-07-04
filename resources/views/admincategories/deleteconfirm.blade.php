<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this orderlistproduct?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>Category</th>
                        <th>Parent</th> 
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td style="vertical-align:middle">{{ $category->name }}</td>
                            <td style="vertical-align:middle">{{ $category->parent_id == 0 ? "" : $category->parent->name }}</td> 
                        </tr>
                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/categories/delete/'.$category->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
