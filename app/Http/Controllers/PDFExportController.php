<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFExportController extends Controller
{
    public function pdproductbarcode()
	{
        $pdf = PDF::loadView('admin.reports.allproducts');
        return $pdf->stream('products.pdf');
	}
}
