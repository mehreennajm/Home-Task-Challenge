$(document).ready(function () {
    // fetch all data from database
    get_products()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // get data
    function get_products() {
        $.ajax({
            url: 'get-products',
            type: 'GET',
            data: {}
        }).done(function (data) {
            table_data_row(data.data)
        });
    }

    function table_data_row(data) {
        var rows = '';
        $.each(data, function (key, value) {
            rows = rows + '<tr>';
            rows = rows + '<td>' + value.id + '</td>';
            rows = rows + '<td>' + value.product_name + '</td>';
            rows = rows + '<td>' + value.product_price + '</td>';
            rows = rows + '<td>' + value.product_type.type	 + '</td>';
            rows = rows + '<td>' + value.produced_date	 + '</td>';
            rows = rows + '<td>' + value.expire_date + '</td>';
            rows = rows + '<td>' + value.product_warranty + '</td>';
            rows = rows + '<td>' + value.supplier.name + '</td>';
            rows = rows + '<td><textarea disabled>' + value.product_desc + '</textarea></td>';
            rows = rows + '<td>' +'<img src="/uploads/products/'+value.product_image+'"  alt="" style="width: 100px;height: 100px"/>' + '</td>';
            rows = rows + '<td class="actions">';
            rows = rows + '<button class="btn btn-sm btn-success py-0"  id="editProduct" data-id="' + value.id + '"  data-toggle="modal" data-target="#modal-id">Edit</button> ';
            rows = rows + '<button class="btn btn-sm btn-danger py-0"  id="deleteProduct" data-id="' + value.id + '" >Delete</button> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });
        $("tbody").html(rows);
    }

    //Insert new data
    $("body").on("click", "#createNewProduct", function (e) {
        e.preventDefault;
        $('#modalHeader').html("Add New Product");
        $('#submit').val("Add New");
        $('#modal-id').modal('show');
        $('#id').val('');
        $('#productsData').trigger("reset");
    });

    $("#productsData").on('submit',function (e){
        e.preventDefault();
        var data = new FormData(this);
        console.log($('form').serialize())
        $.ajax({
            url: "store-products",
            type: "POST",
            data:data,
            dataType:"JSON",
            contentType: false,
            processData: false,
            success: function (data) {
                $('#productsData').trigger("reset");
                $('#modal-id').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2000
                })
                get_products();
            },
            error: function (data) {

            }
        });
    })

    //Edit modal window
    $('body').on('click', '#editProduct', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        console.log(id)
        $.get("update-product/" + id, function (data) {

            $('#modalHeader').html("Edit Product");
            $('#submit').val("Update");
            $('#modal-id').modal('show');
            $('#id').val(data.data.id);
            $('#product_name').val(data.data.product_name);
            $('#product_type_id').val(data.data.product_type_id);
            $('#supplier_id').val(data.data.supplier_id);
            $('#product_price').val(data.data.product_price);
            $('#produced_date').val(data.data.produced_date);
            $('#expire_date').val(data.data.expire_date);
            $('#product_warranty').val(data.data.product_warranty);
            $('#product_desc').val(data.data.product_desc);
            $('#product_image').val(data.data.product_image);
        })
    });

    //Delete product type
    $('body').on('click', '#deleteProduct', function (event) {
        if (!confirm("Do you really want to delete this?")) {
            return false;
        }
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax(
            {
                url: "delete-product/" + id,
                type: 'DELETE',
                data: {id: id},
                success: function (response) {
                    Swal.fire(
                        'Success',
                        'Product deleted successfully!',
                        'success'
                    )
                    get_products()
                }
            });
        return false;
    });


});
