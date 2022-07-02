<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="modal-title" id="modalHeader"></h4>
                    <button type="button" class="close close_icon" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form id="productTypesData">
                        <div class="form-group">
                            <input type="hidden" id="product_type_id" name="id" value="">
                            <label for="type">Product Type Name</label>
                            <input type="text" name="type" class="form-control" id="product_type_name" placeholder="Enter Product Type Name" value="">
                        </div>
                        @if($errors->has('product_type'))
                            <div class="alert alert-danger">{{$errors->first('product_type')}}</div>
                        @endif
                        <input type="submit" class="btn btn-success" id="submit" value=""/>
                   </form>
                    </div>
                    <!-- /.card-body -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
