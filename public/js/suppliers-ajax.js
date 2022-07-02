$(document).ready(function () {
    // fetch all data from database
    get_suppliers()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // get data
    function get_suppliers() {
        $.ajax({
            url: 'get-suppliers',
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
            rows = rows + '<td>' + value.name + '</td>';
            rows = rows + '<td>' + value.address + '</td>';
            rows = rows + '<td>' + value.phone_number + '</td>';
            rows = rows + '<td>' + value.postal_code + '</td>';
            rows = rows + '<td>' +'<img src="/uploads/suppliers/'+value.company_logo+'"  alt="" style="width: 100px;height: 100px"/>' + '</td>';
            rows = rows + '<td class="actions">';
            rows = rows + '<button class="btn btn-sm btn-success py-0"  id="editSupplier" data-id="' + value.id + '" data-type="' + value.name + '" data-toggle="modal" data-target="#modal-id">Edit</button> ';
            rows = rows + '<button class="btn btn-sm btn-danger py-0"  id="deleteSupplier" data-id="' + value.id + '" >Delete</button> ';
            rows = rows + '</td>';
            rows = rows + '</tr>';
        });
        $("tbody").html(rows);
    }

    //Insert new data
    $("body").on("click", "#createNewSupplier", function (e) {
        e.preventDefault;
        $('#modalHeader').html("Add New Supplier");
        $('#submit').val("Add New");
        $('#modal-id').modal('show');
        $('#supplier_id').val('');
        $('#suppliersData').trigger("reset");
    });

    $("#suppliersData").on('submit',function (e){
        e.preventDefault();
        var data = new FormData(this);
        console.log($('form').serialize())
        $.ajax({
            url: "store-suppliers",
            type: "POST",
            data:data,
            dataType:"Json",
            contentType: false,
            processData: false,
            success: function (data) {
                $('#suppliersData').trigger("reset");
                $('#modal-id').modal('hide');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2000
                })
                get_suppliers();
            },
            error: function (data) {

            }
        });
    })

    //Edit modal window
    $('body').on('click', '#editSupplier', function (event) {
        event.preventDefault();
        var id = $(this).data('id');

        $.get("update-supplier/" + id, function (data) {
            $('#modalHeader').html("Edit Supplier");
            $('#submit').val("Update");
            $('#modal-id').modal('show');
            $('#id').val(data.data.id);
            $('#name').val(data.data.name);
            $('#address').val(data.data.address);
            $('#phone_number').val(data.data.phone_number);
            $('#postal_code').val(data.data.postal_code);
            $('#company_logo').val(data.data.company_logo);
        })
    });

    //Delete product type
    $('body').on('click', '#deleteSupplier', function (event) {
        if (!confirm("Do you really want to delete this?")) {
            return false;
        }
        event.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax(
            {
                url: "delete-supplier/" + id,
                type: 'DELETE',
                data: {id: id},
                success: function (response) {
                    Swal.fire(
                        'Success',
                        'Product Supplier deleted successfully!',
                        'success'
                    )
                    get_suppliers()
                }
            });
        return false;
    });


});
