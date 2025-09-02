<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class EmployeeController extends Controller
{
    public function employeeDashboard()
    {
        $new_contact = Contact::where('status', 'new')->get();
        $reach_contact = Contact::whereIn('status', ["reach-out", 'in-progress'])->get();

        return view('employeeDashboard', ['NewContact' => $new_contact, 'ReachContact' => $reach_contact]);
    }

    public function updateStatus(Request $request, $id)
    {
        $status = $request['status'];
        $person = Contact::find($id);

        $person->status = $status;
        $person->save();
        return redirect()->back();
    }
}
