@extends('..admin/layouts/app',['title' => 'Add Customer Profile'])
@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <h5 class="card-title">Customer Profile Form</h5>
                    <!-- General Form Elements -->
                    <form id="frm-addcustomer">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label" >First Name </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="fname" required>
                            </div>
                        </div>

                        <div class="row mb-3">

                        <label for="inputText" class="col-sm-2 col-form-label">Middle Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mname" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="lname" required>
                        </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Birthday</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" id="bday" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Company Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  id="companyname" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Company Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  id="companyaddress" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">CP Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control"  id="cpnumber" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Email Add</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control"  id="emailaddress" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->
                </div>
                <div class="col-lg-6 table-responsive">
                    <h5 class="card-title">List of Customers</h5>
                    <table id="tblcustomers" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Bday</th>
                                <th>CompanyName</th>
                                <th>CompanyAddress</th>
                                <th>Cpnumber</th>
                                <th>EmailAdd</th>
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
    $('#tblcustomers').DataTable({
        ajax: {
        url: '{{route('addcustomers.getcustomers')}}',
        dataSrc: 'data'
        },
        columns: [
            { data: 'fname' },
            { data: 'mname' },
            { data: 'lname' },
            { data: 'bday' },
            { data: 'companyname' },
            { data: 'companyaddress'},
            { data: 'cpnumber' },
            { data: 'emailadd' },
        ]
    });

    $("#frm-addcustomer").submit(function (event) {
       event.preventDefault();
       var formData = {
         _token: $("input[name=_token]").val(),
         fname:$("#fname").val(),
         mname: $("#mname").val(),
         lname: $("#lname").val(),
         bday: $("#bday").val(),
         companyname: $("#companyname").val(),
         companyaddress:$("#companyaddress").val(),
         cpnumber:$("#cpnumber").val(),
         password:$("#password").val(),
         emailadd:$("#emailaddress").val(),
         profilepic:'NA',//$("#profilepic").val(),
         roleid:$("#roleid").val(),
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
                url: "{{route('addcustomers.store')}}",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                if (data.msg) {
                    $('#tblcustomers').DataTable().ajax.reload();
                    Swal.fire('Saved!', '', 'success')
                    $("#frm-addcustomer").trigger('reset');
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
