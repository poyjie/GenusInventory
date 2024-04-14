@extends('..admin/layouts/app',['title' => 'Product Management'])
@section('content')
@php
   $suppliers = DB::select("SELECT * FROM suppliers");
   $brands = DB::select("SELECT * FROM brand");
   $categories = DB::select("SELECT * FROM category");
@endphp
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <h5 class="card-title" s>Add Product Form</h5>
                <div class="col-lg-5">
                    <!-- General Form Elements -->
                    <form id="frm-addproduct">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="supplierid" required>
                                    <option selected>-CHOOSE-</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->suppliername }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="brandid" required>
                                    <option selected>-CHOOSE-</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brandname }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="categoryid" required>
                                    <option selected>-CHOOSE-</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">SKU </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sku" disabled value="--System Generated--">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label" >Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prodname" required>
                            </div>
                        </div>

                        <div class="row mb-3 " >
                            <label for="inputText" class="col-sm-4 col-form-label" >Description </label>
                            <div class="col-12">
                                <textarea name="proddesc" id="proddesc"  class="form-control" cols="100" rows="2" required></textarea>
                            </div>
                        </div>


                </div>
                <div class="col-lg-6">
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Base Price:</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" min="0" step=".01" id="baseprice" required>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Sell Price:</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" min="0" step=".01" id="sellprice">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Minimum Stock:</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" min="0"  id="minstock" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                        <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" multiple>
                        </div>
                    </div>
                    <br><br><br>    <br><br><br>    <br>
                    <div class="row mb-12 float-right">
                        <div class="col-sm-12 float-right">
                            <button type="submit" class="btn btn-primary float-right">Submit Form</button>
                        </div>
                    </div>

                    </form><!-- End General Form Elements -->
                </div>
            </div>
            <hr>
            <div class="row">
                <h5 class="card-title">List of Product</h5>
                <table id="tblproducts" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Base Price</th>
                            <th>Sell Price</th>
                            <th>Min Stock</th>
                            <th>Supplier</th>
                            <th>Brand</th>
                            <th>Category</th>
                        
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
    </div>
</div>



@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>


<script>
    $('.form-select').select2();
 
    $('#tblproducts').DataTable({
        ajax: {
        url: '{{route('addproducts.getproducts')}}',
        dataSrc: 'data'
        },
        columns: [
            {
                "render": function (data, type, JsonResultRow, meta) {
                    return '<svg class="barcode" jsbarcode-value="'+ JsonResultRow['sku'] + '" jsbarcode-textmargin="0" jsbarcode-fontoptions="bold"> </svg>'
                }
            },
            { data: 'sku' },
            { data: 'name' },
            { data: 'proddesc' },
            { data: 'baseprice' },
            { data: 'sellprice' },
            { data: 'min_stock' },
            { data: 'suppliername' },
            { data: 'brandname' },
            { data: 'categoryname' },
          
        ],
        "initComplete": function(settings, json) {
            JsBarcode(".barcode").init();
        }
    });

    $("#frm-addproduct").submit(function (event) {
       event.preventDefault();

       var formData = {
         _token: $("input[name=_token]").val(),
         supplierid:$("#supplierid").val(),
         brandid:$("#brandid").val(),
         categoryid:$("#categoryid").val(),
         sku: $("#sku").val(),
         name: $("#prodname").val(),
         proddesc:$("#proddesc").val(),
         baseprice:$("#baseprice").val(),
         sellprice:$("#sellprice").val(),
         min_stock:$("#minstock").val(),
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
       JsBarcode(".barcode").init();
     });
 

</script>

@endpush
