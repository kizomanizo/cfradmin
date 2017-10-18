<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Access;
use App\Access_User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list all users
        $users = User::All();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Collect user access names and IDs
        $accesses = Access::all('id', 'access_name');
        //Redirect the creation page
        return view('users.create')->with('accesses', $accesses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the user to be stored
        $request->validate([
            'firstname' => 'required|alpha|max:20',
            'secondname' => 'required|alpha|max:20',
            'surname' => 'required|alpha|max:20',
        ]);

        $username = strtolower(($request->surname).(substr($request->firstname, 0, 1)).(substr($request->secondname, 0, 1)));
        $email = $username."@cfr.ac.tz";
        $user = new User;
        $user->firstname = $request->firstname;
        $user->secondname = $request->secondname;
        $user->surname = $request->surname;
        $user->email = $email;
        $user->username = $username;
        $user->temp_password = $username;
        $user->password = bcrypt($username);
        $user->status = 0;
        $user->save();
        $InsertedUser = $user->id;
        $access_user = new Access_User;
        $access_user->access_id = $request->access;
        $access_user->user_id = $InsertedUser;
        $access_user->save();
        return $user->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
