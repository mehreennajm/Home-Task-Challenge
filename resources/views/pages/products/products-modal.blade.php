<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="modal-title" id="modalHeader"></h4>
                    <button type="button" class="close close_icon" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form method="post" id="productsData" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id" value="">
                                        <label for="type">Product Name</label>
                                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name" value="">
                                    </div>
                                    @if($errors->has('product_name'))
                                        <div class="alert alert-danger">{{$errors->first('product_name')}}</div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Product Type</label>
                                        <select name="product_type_id" id="product_type_id" class="form-control">
                                            <option value="" disabled selected>Select Product Type</option>
                                            @foreach($productType as $type)
                                                <option value="{{$type->id}}">{{$type->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('product_type_id'))
                                        <div class="alert alert-danger">{{$errors->first('product_type_id')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Product Supplier</label>
                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                            <option selected disabled>Select product Supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('supplier_id'))
                                        <div class="alert alert-danger">{{$errors->first('supplier_id')}}</div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Product Price</label>
                                        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter Product's Price" value="">
                                    </div>
                                    @if($errors->has('product_price'))
                                        <div class="alert alert-danger">{{$errors->first('product_price')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Production Date</label>
                                        <input type="date" name="produced_date" class="form-control" id="produced_date" placeholder="YYYY-MM-DD" value="">
                                    </div>
                                    @if($errors->has('produced_date'))
                                        <div class="alert alert-danger">{{$errors->first('produced_date')}}</div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Expiry Date</label>
                                        <input type="date" name="expire_date" class="form-control" id="expire_date" placeholder="YYYY-MM-DD" value="">
                                    </div>
                                    @if($errors->has('expire_date'))
                                        <div class="alert alert-danger">{{$errors->first('expire_date')}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Product Warranty Date</label>
                                        <input type="date" name="product_warranty" class="form-control" id="product_warranty" placeholder="YYYY-MM-DD" value="">
                                    </div>
                                    @if($errors->has('product_warranty'))
                                        <div class="alert alert-danger">{{$errors->first('product_warranty')}}</div>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="type">Product Sample</label>
                                        <input type="file" name="product_image" class="form-control" id="product_image" placeholder="Upload Product sample" value="">
                                    </div>
                                    @if($errors->has('product_image'))
                                        <div class="alert alert-danger">{{$errors->first('product_image')}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="type">Product Description</label>
                                        <textarea  id="product_desc" class="form-control" name="product_desc" value="" ></textarea>
                                    </div>
                                    @if($errors->has('product_desc'))
                                        <div class="alert alert-danger">{{$errors->first('product_desc')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" id="submit" value=""/>
                            </div>

                   </form>
                    </div>
                    <!-- /.card-body -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
