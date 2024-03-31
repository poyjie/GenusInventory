@extends('..customer/layouts/app')
@section('content_customer')
<div class="site-section">
    <div class="container">
        <h5>My Cart</h5>
        <table class="table table-bordered">
            <thead>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </thead>
            <tbody id="output">
                {{-- @foreach($data as $dt)
                <tr>
                    <td>{{$dt->sku}}</td>
                    <td>{{$dt->name}}</td>
                    <td>{{$dt->sellprice}}</td>
                    <td>{{$dt->qty}}</td>
                    <td  class="subtotal" align="right">{{ $dt->total }}</td>
                </tr>  
                @endforeach --}}
            </tbody>
            <tfoot>
                <tr><td colspan="4" align="right">Total</td><td id="prtstotal" align="right"></td></tr>
            </tfoot>
        </table>
        <center><button class="btn btn-success" id="checkout">Checkout</button></center>
    </div>
</div>

<script>
    $(document).ready(function() {
        const $output = $("#output");
        $.get("{{ route('mycart.show') }}", function(data) {
            $output.html(
                data.mycart.map(item => `<tr><td class="sku">${item.sku}</td>
                                        <td class="name">${item.name}</td>
                                        <td class="sellprice">${item.sellprice}</td>
                                        <td class="quantity">${item.qty}</td>
                                        <td class="subtotal" align="right">${item.total}</td></tr>`)
            );
        }).done(function () {
            var temp = 0;
            $("tbody#output").find("tr").each(function() { //get all rows in table
            var subtot = $(this).find('td.subtotal').text().replace(/,/g, ''); 
            temp+= parseFloat(subtot); 
            });
            $("#prtstotal").text("₱ " + temp +".00");
        });
  


        $("button#checkout").click(function() {
            var data = [];
            var sku, name,sellprice,subtotal;
            $("table tbody tr").each(function(index) {
                sku = $(this).find('.sku').text();
                name = $(this).find('.name').text();
                sellprice = $(this).find('.sellprice').text();
                subtotal = $(this).find('.subtotal').text();
                data.push({
                    sku: sku,
                    name: name,
                    sellprice: sellprice,
                    subtotal: subtotal
                });
            });

            console.log(data);
                $.ajax({
                    type: "POST",
                    url: '{{ route('mycart.StoreWeb') }}',
                    data: {
                        '_token': $('meta[name=csrf-token]').attr('content'),
                    },
                    success: function(resultData) { 
                        Swal.fire({
                            position: "bottom-end",
                            icon: "success",
                            title: "Checkout Success!",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    dataType: "text"
                });
            
        });

    });
</script>

@endsection
