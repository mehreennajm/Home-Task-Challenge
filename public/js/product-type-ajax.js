$(document).ready(function () {
    // fetch all data from database
    get_data()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // get data
    function get_data() {
        $.ajax({
            url: 'get-types',
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
            rows = rows + '<td>' + value.type + '</td>';
            rows = rows + '<td class="actions">';
            rows = rows + '<button class="btn btn-sm btn-success py-0"  id="editProductType" data-id="' + value.id + '" data-type="' + value.type + '" data-toggle="modal" data-target="#modal-id">Edit</button> ';
            rows = rows + '<button class="btn btn-sm btn-danger py-0"  id="deleteProductType" data-id="' + value.id + '" >Delete</button> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });
        $("tbody").html(rows);
    }

    //Insert new data
    $("body").on("click", "#createNew", function (e) {
        e.preventDefault;
        $('#modalHeader').html("Add New Product Type");
        $('#submit').val("Add New");
        $('#modal-id').modal('show');
        $('#product_type_id').val('');
        $('#productTypesData').trigger("reset");
    });

    //Save data into database
    $('body').on('click', '#submit', function (event) {
        event.preventDefault()
        var id = $("#product_type_id").val();
        var type = $("#product_type_name").val();
        $.ajax({
            url: "store-types",
            type: "POST",
            data: {id: id, type: type,},
            dataType: 'json',
            success: function (data) {
                $('#productTypesData').trigger("reset");
                $('#modal-id').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2000
                })
                get_data()
            },
            error: function (data) {
                console.log('Error......');
            }
        });
    });


    //Edit modal window
    $('body').on('click', '#editProductType', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        $.get("update-type/" + id, function (data) {
            console.log(data)
            $('#modalHeader').html("Edit Product Type");
            $('#submit').val("Update");
            $('#modal-id').modal('show');
            $('#product_type_id').val(data.data.id);
            $('#product_type_name').val(data.data.type);
        })
    });

    //Delete product type
    $('body').on('click', '#deleteProductType', function (event) {
        if (!confirm("Do you really want to delete this?")) {
            return false;
        }
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax(
            {
                url: "delete-type/" + id,
                type: 'DELETE',
                data: {id: id},
                success: function (response) {
                    Swal.fire(
                        'Remind!',
                        'Product Type deleted successfully!',
                        'success'
                    )
                    get_data()
                }
            });
        return false;
    });


});
