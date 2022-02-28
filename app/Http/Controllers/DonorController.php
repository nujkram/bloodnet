<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Session;

class DonorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $userid = Session::get('uid');
        $data = app('firebase.firestore')->database()->collection('users');
        $query = $data->where('status', '=', '');
        $users = $query->documents();
        return view('donors', compact('userid', 'users'));
    }

    public function accept($id) {
        $data = app('firebase.firestore')->database()->collection('users')->document($id);
        $user = $data->snapshot();

        app('firebase.firestore')->database()->collection('users')->document($id)->update([
            ['path' => 'status', 'value' => 'accepted']
        ]);

        return redirect('donors')->with('status', 'Donor ' . ucwords($user['firstname']) . ' ' . ucwords($user['lastname']) . ' successfully accepted!');
    }

    public function reject($id) {
        $data = app('firebase.firestore')->database()->collection('users')->document($id);
        $user = $data->snapshot();

        app('firebase.firestore')->database()->collection('users')->document($id)->update([
            ['path' => 'status', 'value' => 'rejected']
        ]);

        return redirect('donors')->with('status', 'Donor ' . ucwords($user['firstname']) . ' ' . ucwords($user['lastname']) . ' has been rejected!')->with('type', 'danger');
    }
}
