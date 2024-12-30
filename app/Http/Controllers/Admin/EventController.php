<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    EventType,
    UserEvent,
    EventTraning,
    PaymentHistory,
    User
};
use Illuminate\Support\Facades\{
    Auth,
    Validator,
    Storage,
    Session,
    Redirect
};

class EventController extends Controller
{

    public function create()
    {
        $view = "AdminPanel.create_event";
        $Event = UserEvent::where('type', 2)->get();
        return view('AdminView', compact('view', 'Event'));
    }

    public function viewEventType()
    {
        $view = "AdminPanel.ViewEventType";
        $EventType = EventType::all();
        return view('AdminView', compact('view', 'EventType'));
    }

    public function createEventType()
    {
        $view = "AdminPanel.CreateEventType";
        $EventType = EventType::all();
        return view('AdminView', compact('view', 'EventType'));
    }

    public function eventupdate(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'guest_names' => 'nullable|string',
            'speaker_name' => 'nullable|string',
            'payment_one' => 'nullable|string',
            'payment_two' => 'nullable|string',
            'location' => 'required|string|max:255',
            'event_type' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $event = UserEvent::findOrFail($id);

        // Update fields
        $event->event_name = $request->event_name;
        $event->event_date = $request->event_date;
        $event->guest_names = $request->guest_names;
        $event->payment_one = $request->payment_one;
        $event->payment_two = $request->payment_two;
        $event->speaker_name = $request->speaker_name;
        $event->location = $request->location;
        $event->event_type = $request->event_type;
        $event->description = $request->description;

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('event_images', 'public');
            $event->image = $path;
        }

        $event->save();

        return redirect()->back()->with('success', 'Event updated successfully.');
    }

    public function eventdelete($id)
    {
        $event = UserEvent::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully.');
    }

    public function eventedit($id)
    {
        $view = "AdminPanel.editevent";
        $event = UserEvent::findOrFail($id);
        $EventType = EventType::get();
        return view('AdminView', compact('view', 'event', 'EventType')); // Return an edit view
    }

    public function saveEventType(Request $request)
    {
        // Validation
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'nullable|string|max:255', // You can add a max length for better control
                'description' => 'nullable|string|max:500', // Added max length for description
            ]
        );

        // If validation fails, return a JSON response with errors
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()  // Use ->errors() instead of getMessageBag()
            ], 422);
        }

        // Create a new EventType instance and save the data
        $form = new EventType;
        $form->name = $request->name;
        $form->description = $request->description;
        $form->save();

        return redirect()->route('admin.viewEventType')->with('success', 'Event created successfully.');
    }


    public function destroyEventType($id)
    {
        $eventType = EventType::findOrFail($id);
        $eventType->delete();
        return redirect()->route('admin.viewEventType')->with('success', 'Event Type deleted successfully.');
    }


    public function showcreateevent()
    {
        $view = "AdminPanel.event";
        $EventType = EventType::get();
        return view('AdminView', compact('view', 'EventType'));
    }
    public function upload_event_video()
    {
        $view = "AdminPanel.upload_event_video";
        $eventTypes = EventType::all();

        return view('AdminView', compact('view', 'eventTypes'));
    }

    public function uploadVideo(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|mimes:mp4,mov,avi|max:20480',
                'event_name' => 'required|string',
                'event_type' => 'required|integer',
            ]);

            $videoPath = $request->file('image')->store('assets/Event_traning', 'public');

            $latestOrder = EventTraning::where('event_id', $request->event_type)
                ->orderBy('order_id', 'desc')
                ->first();

            $orderId = $latestOrder ? $latestOrder->order_id + 1 : 1;
            // dd($orderId);
            EventTraning::create([
                'title' => $request->event_name,
                'event_id' => $request->event_type,
                'video_type' => $videoPath,
                'order_id' => $orderId,
            ]);

            return back()->with('success', 'Video uploaded successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error uploading video: ' . $e->getMessage());
        }
    }

    public function create_event(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'guest_names' => 'nullable|string',
            'speaker_name' => 'nullable|string',
            'payment_one' => 'nullable|string',
            'payment_two' => 'nullable|string',
            'location' => 'required|string|max:255',
            'event_type' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image
            $imagePath = $request->file('image')->store('event_images', 'public');

            // Get the file name
            $imageName = basename($imagePath);

            // Store the image file name in the database
            UserEvent::create([
                'user_id' => Auth::id(),
                'event_name' => $request->event_name,
                'event_date' => $request->event_date,
                'guest_names' => $request->guest_names,
                'speaker_name' => $request->speaker_name,
                'location' => $request->location,
                'payment_one' => $request->payment_one,
                'payment_two' => $request->payment_two,
                'type' => 2,
                'status' => 2,
                'event_type' => $request->event_type,
                'description' => $request->description,
                'image_path' => $imageName,  // Store the image name in the database
            ]);
            return redirect()->route('admin.eventcreate')->with('success', 'Event created successfully.');
        }
        return redirect()->route('admin.eventcreate')->with('error', 'Event created successfully.');
    }

    // Payment controller view
    public function publishRequestView()
    {
        $view = "AdminPanel.PublishRequestView";
        $list = UserEvent::where('type', 1)->get();
        return view('AdminView', compact('view', 'list'));
    }

    public function publishEventDelete($id)
    {
        $eventType = UserEvent::findOrFail($id);
        $eventType->delete();
        return redirect()->back()->with('success', 'Event Type deleted successfully.');
    }

    public function publishedEventReview($eventId)
    {
        $view = "AdminPanel.PublishedEventReview";
        $eventDetail = UserEvent::find($eventId);

        return view('AdminView', compact('view', 'eventDetail'));
    }

    public function publishEventStatusUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:2,3',
        ]);
        $userEvent = UserEvent::findOrFail($id);

        $userEvent->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Event status updated successfully.');
    }
}
