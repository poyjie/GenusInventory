@extends('..admin/layouts/app',['title' => 'Product Management'])
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="col-lg-6">
            <h5 class="card-title">Add Product Form</h5>
            <!-- General Form Elements -->
            <form>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Select</label>
                    <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">SKU </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                </div>
                </div>

                <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                </div>
                </div>


                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Stock In:</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" min="0">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Minimum Stock:</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" min="0">
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
