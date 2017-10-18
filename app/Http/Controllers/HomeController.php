<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('static.dashboard');
    }

    public function dashboard()
    {
        return view('static.dashboard');
    }

    public function change()
    {
        $user = Auth::user();
        return view('auth.change')->with('user', $user);
    }

    public function password_change(Request $request, $user)
    {
        // The validation of the form
        $this->validate($request, [
        'password' => 'required|min:4|max:50|confirmed',
        'password_confirmation' => 'required|min:4'
        ]);

        $user = User::find($user);
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->temp_password = '';
        $user->created_at = $request->created_at;
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();

        return view('static.dashboard');
    }
}
