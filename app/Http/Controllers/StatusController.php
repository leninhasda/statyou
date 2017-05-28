<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
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

    public function create()
    {
        $this->validate(request(), [
            'content' => 'required|max:140',
            'type' => 'required|boolean|max:1'
        ]);

        $user = \Auth::user();

        $data = [
            'user_id' => $user->id,
            'content' => request('content'),
            'type' => request('type'),
        ];

        Status::create($data);

        return redirect()->route('home');
    }
}
