<!-- loading layout structure into page -->
@extends('layout.layout')
<!-- title section -->
@section ('title', 'Products')

<!-- adding content to display -->
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1>Products Section</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Product List</h3>
                              <button id="createNewProduct" class="btn btn-primary" style="float: right">Create New <i class="fa fa-plus"></i></button>
                           </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Product Type</th>
                                    <th>Produced Date</th>
                                    <th>Expire Date</th>
                                    <th>Product Warranty</th>
                                    <th>Supplier Company</th>
                                    <th>Product Description</th>
                                    <th>Product Sample</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Product Type Modal -->
    @include('pages.products.products-modal')
    <!-- End Product Type Modal -->
@endsection

@section('customScripts')
 <script src="{{asset('js/products-ajax.js')}}"></script>
 <script>
     var table = $("#dataTable").DataTable();
 </script>

@endsection

