<div class="row" style="width:100%; text-align:center;">
    <div class="col-sm-12">
        <h3>Are you sure you want to delete role this product?</h3><br/>
        <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <th>Product photo</th> 
                        <th>Name</th> 
                        <th>Description</th>
                        <th>Cost price</th>
                        <th>Selling price</th>
                        <th>Category</th> 
                        <th>Stock quantity</th>
                    </thead>
                    <tbody style="text-align:left;">
                        <tr>
                            <td><img src=" {{ asset($productUploadPath .$product->photo) }} " height ="150px"></td>
                            <td>{{ $product->name }}</td> 
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                        </tr>

                    </tbody>
            
                </table> 
            </div>
        <br>
        <div>
        <a href="{{ url('/admin/products/delete/'.$product->id) }}" class="btn btn-success" type="button" style="width: 45%">Yes</a>
        <a href="" class="btn btn-danger" type="button" style="width: 45%">No</a>
        </div>
        
    </div>
</div>
