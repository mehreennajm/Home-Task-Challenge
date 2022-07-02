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
                        <form method="post" id="suppliersData" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" value="">
                            <label for="type">Supplier Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Supplier Name" value="">
                        </div>
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{$errors->first('name')}}</div>
                        @endif

                        <div class="form-group">
                            <label for="type">Supplier Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter Supplier Address" value="">
                        </div>
                        @if($errors->has('address'))
                            <div class="alert alert-danger">{{$errors->first('address')}}</div>
                        @endif

                        <div class="form-group">
                            <label for="type">Contact Number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Enter Supplier Name" value="">
                        </div>
                        @if($errors->has('phone_number'))
                            <div class="alert alert-danger">{{$errors->first('phone_number')}}</div>
                        @endif

                        <div class="form-group">
                            <label for="type">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="Enter Supplier Name" value="">
                        </div>
                        @if($errors->has('postal_code'))
                            <div class="alert alert-danger">{{$errors->first('postal_code')}}</div>
                        @endif

                        <div class="form-group">
                            <label for="type">Company Logo</label>
                            <input type="file" name="company_logo" class="form-control" id="company_logo" placeholder="Upload Supplier's Logo" value="">
                        </div>
                        @if($errors->has('company_logo'))
                            <div class="alert alert-danger">{{$errors->first('company_logo')}}</div>
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
