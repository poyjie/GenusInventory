@extends('..admin/layouts/app',['title' => 'Product Management'])
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="col-lg-6">
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
    </div>
</div>





@endsection

@push('scripts')

<script>
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

       console.log(formData);

       $.ajax({
         type: "POST",
         url: "{{route('addproducts.store')}}",
         data: formData,
         dataType: "json",
         encode: true,
       }).done(function (data) {
         if (data.msg) {
           alert(data.msg)

         }
       });
     });
</script>

@endpush
