<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\User;
use App\Helpers\Paginator;
use Auth;
use Hash;
use Validator;
use Carbon\Carbon;

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

    public function home(Request $request)
    {
        $user = Auth::user();
        $date = $request->get('date');

        if ( ! $user->hasStatus()) {
            $statuses = [];
        }
        else {
            if ( ! $date ) {
                $date = $user->getLastStatusDate();
            }
            else {
                $date = new Carbon($date);
            }

            $statuses = $user->statusOfDate($date);
            $allOtherDates = Status::getAllDate($user->id);
            $paginator = new Paginator($allOtherDates, $date, [
                    'url' => $request->path()
                ]);
        }

        return view('user.home', compact('statuses', 'user', 'paginator'));
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
        if ($validator->fails() ) {
            return redirect()->back()->withErrors($validator->errors());
        }

        if ( $request->has('password') && ! $request->has('old_password') ) {
            $request->session()->flash('msg.level', 'danger');
            $request->session()->flash('msg.content', 'Old password is required to set new password');

            return redirect()->back();
        }

        $user = Auth::user();

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

        $user->first_name = $request->input('first_name', $user->first_name);
        $user->last_name = $request->input('last_name', $user->last_name);
        $user->email = $request->input('email', $user->email);
        $user->save();

        $request->session()->flash('msg.level', 'success');
        $request->session()->flash('msg.content', 'Change saved!');

        return redirect()->back();
    }

    public function user(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $date = $request->get('date');

        if ( ! $user) {
            return view('errors.404', ['user' => Auth::user()]);
        }

        if ( ! $user->hasStatus()) {
            $statuses = [];
        }
        else {
            if ( ! $date ) {
                if (Auth::guest()) {
                    $date = $user->getLastPublicStatusDate();
                }
                else {
                    $date = $user->getLastStatusDate();
                }
            }
            else {
                // check for date validity
                $date = new Carbon($date);
            }

            if (Auth::guest()) {
                $statuses = $user->publicStatusOfDate($date);
                $allOtherDates = Status::getAllPublicDate($user->id);
            }
            else {
                $statuses = $user->statusOfDate($date);
                $allOtherDates = Status::getAllDate($user->id);
            }
            // dd($allOtherDates);
            $paginator = new Paginator($allOtherDates, $date, [
                    'url' => $request->path()
                ]);
        }

        return view('user.home-public', compact('statuses', 'user', 'paginator'));
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
