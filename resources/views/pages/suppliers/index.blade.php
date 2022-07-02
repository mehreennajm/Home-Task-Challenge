<!-- loading layout structure into page -->
@extends('layout.layout')
<!-- title section -->
@section ('title', 'Suppliers')

<!-- adding content to display -->
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1>Suppliers Section</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Suppliers</li>
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
                              <h3 class="card-title">Suppliers List</h3>
                              <button id="createNewSupplier" class="btn btn-primary" style="float: right">Create New <i class="fa fa-plus"></i></button>
                           </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact #</th>
                                    <th>Postal Code</th>
                                    <th>Company Logo</th>
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
    @include('pages.suppliers.suppliers-modal')
    <!-- End Product Type Modal -->
@endsection

@section('customScripts')
 <script src="{{asset('js/suppliers-ajax.js')}}"></script>
 <script>
     var table = $("#datatable").DataTable();
 </script>

@endsection

