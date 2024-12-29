<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class PaymentHisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = "AdminPanel.payment_his";
        $PaymentPending = PaymentHistory::with('user', 'UserEvent')->where('status', 1)->paginate(10);
        $PaymentComplete = PaymentHistory::with('user', 'UserEvent')->where('status', 2)->paginate(10);
       
        return view('AdminView', compact('view', 'PaymentPending', 'PaymentComplete'));
    }

    public function accept($id)
    {
        $payment = PaymentHistory::findOrFail($id);

        $payment->status = 2; // Example: 1 for accepted
        $payment->save();

        return redirect()->back()->with('success', 'Payment accepted successfully!');
    }

    public function reject($id)
    {
        $payment = PaymentHistory::findOrFail($id);
        $payment->status = 3; // Example: 0 for rejected
        $payment->save();

        return redirect()->back()->with('success', 'Payment rejected successfully!');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
