<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdftest(Request $req){return pdf\contclaimlist::generate($req);}
}
