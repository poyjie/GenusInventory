@php
use \Milon\Barcode\DNS1D;
$d = new DNS1D();
$d->setStorPath(__DIR__.'/cache/');

    $products = DB::select("SELECT * FROM v_products ");


@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        td {
  text-align: center;
}
    </style>
</head>
<body>
    <h5>All Product Barcode</h5>
    <table border="1" style="width: 100%">
        <thead>
            <th>Product Name</th>
            <th>Sku</th>
            <th>Barcode</th>
        </thead>
        <tbody >
            @foreach ($products  as $dt)
                <tr>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->sku }}</td>
                    <td>
                       @php 
     
                            echo DNS1D::getBarcodeHTML($dt->sku, 'CODABAR',3,33,'black');
                        @endphp

                    </td>
                </tr>
                <br><br>
            @endforeach
          
        </tbody>
    </table>
</body>
</html>
