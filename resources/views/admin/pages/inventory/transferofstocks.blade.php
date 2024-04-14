@extends('..admin/layouts/app',['title' => 'Transfer Of Stock'])
@section('content')
@php
   $branches = DB::select("SELECT * FROM branch");
   $products = DB::select("SELECT * FROM v_products ");
@endphp
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="card-title">Stock In Form</h5>
                    <!-- General Form Elements -->
                    <form id="frm-stocktranfer">
                        @csrf 
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label" >From Branch</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" name="branchidfrom" id="branchidfrom" style="width: 100%">
                                    <option value="">-CHOOSE-</option>
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
                                    <option value="">-CHOOSE-</option>
                                  {{-- @foreach($products as $product)
                                    <option value="{{ $product->id }}">SKU#: {{ $product->sku }} - {{ $product->name }}</option>
                                  @endforeach --}}
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label" >To Branch</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" name="branchidto" id="branchidto" style="width: 100%">
                                    <option value="">-CHOOSE-</option>
                                    @foreach($branches as $branch)
                                      <option value="{{ $branch->id }}">{{ $branch->branchname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

             

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Transfer Stock In</label>
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
                {{-- <div class="col-lg-8  table-responsive">
                    <h5 class="card-title">Stockin Logs</h5>
                    <table id="tblstockin" class="display table-responsive">
                        <thead>
                            <tr>
                                <th>Branch</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stock In</th>
                                <th>Sell Price</th>
                                <th>Supplier</th>
                                <th>Brand</th>
                                <th>Category</th>
                          
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div> --}}
            </div>

            <br><hr><br>
            <div class="row">
                <div class="col-lg-12 ">
                    <h5 class="card-title">List of Product Total Stocks</h5>
                    <table id="tblstockin" class="display table-responsive">
                        <thead>
                            <tr>
                                <th>Branch</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stock In</th>
                                <th>Sell Price</th>
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
</div>





@endsection

@push('scripts')

<script>

    $('#branchidfrom').on('change', function (e) {
        $("#productid").empty();
        var valueSbranchselectedelected = $('#branchidfrom').find(":selected").text(); 
        // alert(valueSbranchselectedelected);
        $.ajax({
            url: '/admin/transferofstocks/GetProductPerbranch/'+valueSbranchselectedelected,
            type: 'get',
            dataType: 'json',
            success:function(response){
                var len = response['data'].length;
                console.log(response);
                for( var i = 0; i<len; i++){
                    var state_id = response['data'][i]['id'];
                    var state_name = response['data'][i]['name'];

                    $("#productid").append("<option value='"+ state_id +"' >"+ state_name +"</option>");

                }
            }
        });

    });
   
    $('#tbloverallstocks').DataTable({
        autoWidth: true,
        ajax: {
        url: '{{route('stockin.GetAllStocks')}}',
        dataSrc: 'data'
        },
        columns: [
            { data: 'branchname' },
            { data: 'sku' },
            { data: 'name'},
            { data: 'proddesc' },
            { data: 'totalstockin' },
            { data: 'sellprice' },
            { data: 'suppliername' },
            { data: 'brandname' },
            { data: 'categoryname' },

        ]
    });

    $('#tblstockin').DataTable({
        responsive: true,
        ajax: {
        url: '{{route('stockin.GetStocksInRecords')}}',
        dataSrc: 'data'
        },
        columns: [
            { data: 'branchname' },
            { data: 'sku' },
            { data: 'name'},
            { data: 'proddesc' },
            { data: 'totalstockin' },
            { data: 'sellprice' },
            { data: 'suppliername' },
            { data: 'brandname' },
            { data: 'categoryname' },
      
        ]
    });

    $("#frm-stocktranfer").submit(function (event) {
       event.preventDefault();
       var formData = {
         _token: $("input[name=_token]").val(),
         branchidfrom:$("#branchidfrom").val(),
         branchidto:$("#branchidto").val(),
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
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "{{route('transferstockin.store')}}",
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
