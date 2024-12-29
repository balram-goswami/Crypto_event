<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{EventTraning, PaymentHistory, User};

class TrainingEventController extends Controller
{
    public function index($id)
    {
        $view = "Event_traning.index";
        $EventTraning = EventTraning::where('event_id', $id)->get();
        $PaymentHistory = PaymentHistory::where('user_id', auth()->id())
            ->where('event_id', $id)
            ->where('status', 2)
            ->first();
        $userDetails = User::where('id', $PaymentHistory->user_id)->get()->first();

        if (!$PaymentHistory) {
            return redirect()->back()->with('msg', 'Please buy the event.');
        }
        $ids = $id;

        return view('TraningView', compact('EventTraning', 'view', 'userDetails', 'id'));
    }

    public function markComplete(Request $request, $id)
    {
        $request->validate([
            'event_status' => 'required|integer',
        ]);

        $event = PaymentHistory::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail(); 

        $event->update([
            'event_status' => $request->event_status, 
        ]);

        return redirect()->back()->with('success', 'Event updated successfully.');
    }
}
