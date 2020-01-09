<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice');
    }

    public function createInvoice() {
        return view('create-invoice');
    }

    public function store(Request $request)
    {
        $invoice = Invoice::create(array(
            'description'        => $request->description,
            'amount' => $request->amount,
            'date'        => $request->type
        ));
        return redirect('invoice');
    }
}
