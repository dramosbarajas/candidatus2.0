<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Offer;

class pdf extends Controller
{

    public function generateOfferPDF(Request $request)
    {
        $items = Offer::all();
        view()->share('items',$items);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview');
    }
}
        // reference the Dompdf namespace


