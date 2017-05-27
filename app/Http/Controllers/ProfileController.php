<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;
use Auth;
use Hash;
use Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('user');
    }

    public function home()
    {
        $user = Auth::user();
        $statuses = $user->statuses()->orderBy('created_at', 'desc')->get();

        return view('user.home', compact('statuses', 'user'));
    }

    public function me()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'email' => 'required|email',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ( ! $validator->fails() ) {

            $user = Auth::user();
            $user->first_name = $request->input('first_name', $user->first_name);
            $user->last_name = $request->input('last_name', $user->last_name);
            $user->email = $request->input('email', $user->email);

            if ( $request->has('password') && ! $request->has('old_password') ) {
                $request->session()->flash('msg.level', 'danger');
                $request->session()->flash('msg.content', 'Old password is required to set new password');

                return redirect()->back();
            }

            if ( $request->has('password') && $request->has('old_password') ) {
                $old_password = $request->input('old_password');
                if (Hash::check($old_password, $user->password)) {
                    $user->password = Hash::make($request->input('password'));
                }
                else {
                    $request->session()->flash('msg.level', 'danger');
                    $request->session()->flash('msg.content', 'Old password does not match!');

                    return redirect()->back();
                }
            }

            $user->save();
            $request->session()->flash('msg.level', 'success');
            $request->session()->flash('msg.content', 'Change saved!');

            return redirect()->back();
        }
        else {
            return redirect()->back()->withErrors($validator->errors());
        }
    }

    public function user($username)
    {
        $user = User::where('username', $username)->first();
        // dd($user);
        $statuses = $user->publicStatuses()->orderBy('created_at', 'desc')->get();

        return view('user.home-public', compact('statuses', 'user'));
    }

    // public function index($username)
    // {
    //     $user = \App\User::where(['username' => $username])->first();

    //     if( \Auth::guest() ) {
    //         $statuses = Status::where(['user_id' => $user->id, 'type' => Status::Public])->get();
    //     }
    //     else {
    //         $statuses = Status::where(['user_id' => $user->id])->get();
    //     }

    //     return view('user.profile', compact('statuses', 'user'));
    // }

}
