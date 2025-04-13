<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $payment = Payment::with('dummy.document.ajuanType')->get();
        } else if (Auth::user()->hasRole('user')) {
            $payment = Payment::with('dummy.document.ajuanType')->where('user_id', Auth::user()->id)->get();
        }

        return view('pages.payment.index', compact('payment'));
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
            'metode' => 'required',
            'proof' => 'required|mimes:png,jpg|max:2048',
        ]);

        if($request->hasFile('proof')){
            $file = $request->file('proof');
            $fileName = Auth::user()->name.'_'. 'proof' .'.' . $file->getClientOriginalExtension();
            $pathProof = $file->storeAs('/proof-img', $fileName,['disks' => 'save_upload']);

            $payment = Payment::find($id);
            $payment->payment_method = $request->metode;
            $payment->payment_status = 'waiting';
            $payment->payment_date = now();
            $payment->path_proof = $pathProof;
            $payment->save();
        } else {
            return redirect()->back()->with(['error' => 'File Error']);
        }


        return redirect()->route('user.payment.index')->with('success', 'Payment updated successfully. Waiting from Validate');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully.');
    }

    public function validatePayment($id)
    {
        $payment = Payment::find($id);
        $payment->payment_status = 'success';
        $payment->save();

        return redirect()->route('admin.payment.index')->with('success', 'Payment validated successfully.');
    }
}
