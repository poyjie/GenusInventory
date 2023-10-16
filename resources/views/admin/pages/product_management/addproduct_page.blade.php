@extends('..admin/layouts/app',['title' => 'Product Management'])
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <h5 class="card-title">Add Product Form</h5>
                    <!-- General Form Elements -->
                    <form id="frm-addproduct">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select</label>
                            <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" id="category">
                                <option selected>Category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label" >Name </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodname">
                            </div>
                        </div>

                        <div class="row mb-3">

                        <label for="inputText" class="col-sm-2 col-form-label">SKU </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sku">
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="prodnum">
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Price:</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" min="0" id="price">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Stock In:</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" min="0" id="stockin">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Minimum Stock:</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" min="0"  id="minstock">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" multiple>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>
                        </div>

                    </form><!-- End General Form Elements -->
                </div>
                <div class="col-lg-6">
                    <h5 class="card-title">List of Product</h5>
                    <table id="tblproducts" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Min Stock</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>





@endsection

@push('scripts')

<script>
    $('#tblproducts').DataTable({
        ajax: {
        url: '{{route('addproducts.getproducts')}}',
        dataSrc: 'data'
        },
        columns: [
            { data: 'category' },
            { data: 'sku' },
            { data: 'number' },
            { data: 'name' },
            { data: 'stock' },
            { data: 'min_stock' },
            { data: 'price' },
        ]
    });

    $("#frm-addproduct").submit(function (event) {
       event.preventDefault();
       var formData = {
         _token: $("input[name=_token]").val(),
         category:$("#category").val(),
         sku: $("#sku").val(),
         number: $("#prodnum").val(),
         name: $("#prodname").val(),
         stock: $("#stockin").val(),
         min_stock:$("#minstock").val(),
         price:$("#price").val(),
       };


       Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "{{route('addproducts.store')}}",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                if (data.msg) {
                    $('#tblproducts').DataTable().ajax.reload();
                    Swal.fire('Saved!', '', 'success')
                    $("#frm-addproduct").trigger('reset');
                }
            });

        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
        })



       console.log(formData);


     });
</script>

@endpush
