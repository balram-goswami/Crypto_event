<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AllStudentController extends Controller
{
    public function index()
    {
        $view = "AdminPanel.allstudent";
        $users = User::paginate(10);

        return view('AdminView', compact('view', 'users'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        
        $user->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'User status updated successfully.');
    }
}
