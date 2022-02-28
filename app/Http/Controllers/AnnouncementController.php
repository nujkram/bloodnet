<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Session;
use Carbon\Carbon;

class AnnouncementController extends Controller
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
        $data = app('firebase.firestore')->database()->collection('feed');
        $query = $data->orderBy('createDate', 'DESC');
        $feeds = $query->documents();
        return view('announcement', compact('userid', 'feeds'));
    }

    public function store(Request $request) {
        $userid = Session::get('uid');
        $ref = app('firebase.firestore')->database()->collection('feed')->newDocument();
        $ref->set([
            'title' => $request->title,
            'content' => $request->content,
            'postedBy' => 'Admin Account',
            'createDate' => Carbon::now(),
        ]);

        $data = app('firebase.firestore')->database()->collection('feed');
        $query = $data->orderBy('createDate', 'DESC');
        $feeds = $query->documents();

        $status = 'Announcement created!';
        return view('announcement', compact('userid', 'feeds', 'status'));
    }
}
