<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages.payment.index');
    }

    public function create()
    {
        return view('pages.payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $payment = new Payment();
        $payment->name = $request->name;
        $payment->price = $request->price;
        $payment->description = $request->description;
        $payment->save();

        return redirect()->route('payment.index')->with('success', 'Payment created successfully.');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);

        return view('pages.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $payment = Payment::find($id);
        $payment->name = $request->name;
        $payment->price = $request->price;
        $payment->description = $request->description;
        $payment->save();

        return redirect()->route('payment.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully.');
    }   
}
