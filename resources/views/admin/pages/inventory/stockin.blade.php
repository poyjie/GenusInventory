@extends('..admin/layouts/app',['title' => 'Stock In'])
@section('content')
@php
   $branches = DB::select("SELECT * FROM branch");
   $products = DB::select("SELECT * FROM v_products");

@endphp
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="card-title">Stock In Form</h5>
                    <!-- General Form Elements -->
                    <form id="frm-stockin">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label" >Branch</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" name="branchid" id="branchid" style="width: 100%">
                                    @foreach($branches as $branch)
                                      <option value="{{ $branch->id }}">{{ $branch->branchname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label for="inputText" class="col-sm-2 col-form-label" >Product</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" name="productid"  id="productid"  style="width: 100%">
                                  @foreach($products as $product)
                                    <option value="{{ $product->id }}">SKU#: {{ $product->sku }} - {{ $product->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">

                        <label for="inputText" class="col-sm-2 col-form-label">Stock In</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" min="0" id="stockin" required>
                        </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->
                </div>
                <div class="col-lg-8">
                    <h5 class="card-title">Stockin Logs</h5>
                    <table id="tblstockin" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Branch</th>
                                <th>Supplier</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stock In</th>
                                <th>Sell Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <br><hr><br>
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="card-title">List of Product Total Stocks</h5>
                    <table id="tbloverallstocks" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Branch</th>
                                <th>Supplier</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stock Total</th>
                                <th>Sell Price</th>
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
    $('.js-example-basic-single').select2();

    $('#tbloverallstocks').DataTable({
        ajax: {
        url: '{{route('stockin.GetAllStocks')}}',
        dataSrc: 'data'
        },
        columns: [
            { data: 'branchname' },
            { data: 'suppliername' },
            { data: 'brandname' },
            { data: 'categoryname' },
            { data: 'sku' },
            { data: 'name'},
            { data: 'proddesc' },
            { data: 'totalstockin' },
            { data: 'sellprice' },
        ]
    });

    $('#tblstockin').DataTable({
        ajax: {
        url: '{{route('stockin.GetStocksInRecords')}}',
        dataSrc: 'data'
        },
        columns: [
            { data: 'branchname' },
            { data: 'suppliername' },
            { data: 'brandname' },
            { data: 'categoryname' },
            { data: 'sku' },
            { data: 'name'},
            { data: 'proddesc' },
            { data: 'totalstockin' },
            { data: 'sellprice' },
        ]
    });

    $("#frm-stockin").submit(function (event) {
       event.preventDefault();
       var formData = {
         _token: $("input[name=_token]").val(),
         branchid:$("#branchid").val(),
         productid: $("#productid").val(),
         stockin: $("#stockin").val(),
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
                url: "{{route('stockin.store')}}",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                if (data.msg) {
                    $('#tblstockin').DataTable().ajax.reload();
                    $('#tbloverallstocks').DataTable().ajax.reload();
                    Swal.fire('Saved!', '', 'success')
                    $("#frm-stockin").trigger('reset');
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
