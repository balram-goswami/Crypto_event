<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    UserEvent,
    Admin,
    EventType,
    User,
    EventLead,
    PaymentHistory
};

class DashboardController extends Controller
{
    public function index()
    {
        $view = "UserPanel.dashboard";
        $currentUser = getUser(auth()->id());
        $otherEvents = UserEvent::where('type', 1)
            ->where('status', 2)
            ->where('user_id', '!=', auth()->id())
            ->get();
            $PaymentHistory = PaymentHistory::where('user_id', auth()->id())
            ->get();

        return view('UserView', compact('view', 'currentUser', 'otherEvents', 'PaymentHistory'));
    }

    public function allevents()
    {
        $view = "UserPanel/userevents/AllEvents";
        $currentUser = getUser(auth()->id());
        $adminEvents = UserEvent::where('type', 2)->where('status', 2)->get();
        $otherEvents = UserEvent::where('type', 1)
            ->where('status', 2)
            ->where('user_id', '!=', auth()->id())
            ->get();
        $userEvents = UserEvent::where('user_id', auth()->id())
            ->where('type', 1)
            ->where('status', 2)
            ->get();
          
        $PaymentHistory = PaymentHistory::where('user_id', auth()->id())
            ->get();

            return view('UserView', compact('view', 'adminEvents', 'userEvents', 'currentUser', 'PaymentHistory', 'otherEvents'));
    }

    public function shareEvent($id)
    {
        $eventDetail = UserEvent::where('id', $id)->get()->first();

        return view('ViewShareEvent', compact('eventDetail'));
    }

    public function eventLeads(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'description' => 'nullable|string',
        ]);

        // Create a new EventLead record
        $eventLead = EventLead::create($validatedData);

        // Set a flash message in the session
        session()->flash('success', 'Submit successful!');

        // Redirect back with success message
        return redirect()->back();
    }
}
