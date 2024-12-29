<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;

class PaymentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $request->validate([
            'event_id' => 'required',
            'amount' => 'required|numeric|min:1', // Validate amount
            'transaction_id' => 'required|string', // Validate transaction_id as required and a string
        ]);

        $payment = PaymentHistory::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'event_id' => $request->input('event_id'),
            'type' => $request->input('payment_method'),
            'amount' => $request->input('amount'),
            'transaction_id' => $request->input('transaction_id'),
            'payment_date' => now(),
        ]);

        return redirect()->route('allevents')->with('success', 'Payment Send Request successfully!');
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
