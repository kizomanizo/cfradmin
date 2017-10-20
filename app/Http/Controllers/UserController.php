<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Role_User;

class UserController extends Controller
{
    /**
     * Enable Auth for all methods in this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list all users
        $users = User::orderBy('firstname', 'asc')->paginate(10);
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
        $roles = Role::all('id', 'name');
        //Redirect the creation page
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);
        
        // Validate the user to be stored
        $request->validate([
            'firstname' => 'required|alpha|max:20',
            'secondname' => 'required|alpha|max:20',
            'surname' => 'required|alpha|max:20',
        ]);

        // Set the variables right
        $username = strtolower(($request->surname).(substr($request->firstname, 0, 1)).(substr($request->secondname, 0, 1)));
        $email = $username."@cfr.ac.tz";
        $user = new User;

        // Save the user in the DB
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
        $role_user = new Role_User;
        $role_user->role_id = $request->role;
        $role_user->user_id = $InsertedUser;
        $role_user->save();
        //list all users
        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all('id', 'name');
        return view('users/edit')->with('user', $user)->with('roles', $roles);
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
        // Authenticate System administrators and managers only
        $request->user()->authorizeRoles([1, 2, 3]);

        // Validate the user to be stored
        $request->validate([
            'firstname' => 'required|alpha|max:20',
            'secondname' => 'required|alpha|max:20',
            'surname' => 'required|alpha|max:20',
        ]);

        // Set the variables right
        $username = strtolower(($request->surname).(substr($request->firstname, 0, 1)).(substr($request->secondname, 0, 1)));
        $email = $username."@cfr.ac.tz";
        $user = User::find($id);

        // Update the user with changes
        $user->firstname = $request->firstname;
        $user->secondname = $request->secondname;
        $user->surname = $request->surname;
        $user->email = $email;
        $user->username = $username;
        $user->save();
        $role_user = Role_User::All()->where('user_id', $id);
        $role_user = Role_User::find($role_user);
        Role_User::where('user_id', $user->id)->update(['role_id' => $request->role]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from views.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);

        // Soft delete the user
        $user = User::where('id', $id)->delete();
        $role_user = Role_User::where('user_id', $id)->delete();
        return redirect()->route('users.index');
    }

    /**
     * List all the users with respective actions
     * @return [type] [description]
     */
    public function list()
    {
        $users = User::withTrashed()->orderBy('firstname', 'asc')->paginate(7);
        return view('users.list')->with('users', $users);
    }

    /**
     * Revokes the user access and resets the password
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function suspend(Request $request, $id)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);

        // Suspend the user
        $user = User::find($id);
        $user->status = 2;
        $user->password = '';
        $user->temp_password = '';
        $user->save();
        return redirect()->route('users_list');

    }

    /**
     * Release the user from a suspension
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function release(Request $request, $id)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);

        // Release the user now
        $user = User::find($id);
        $user->status = 0;
        $user->password = bcrypt($user->username);
        $user->temp_password = $user->username;
        $user->save();
        return redirect()->route('users_list');
    }

    /**
     * Deactivate users who will no longer be needed, be CAREFUL with it
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function deactivate(Request $request, $id)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);

        // Delete the user
        $user = User::find($id);
        $user->status = 2;
        $user->password = '';
        $user->temp_password = '';
        $user->save();
        $user = User::where('id', $id)->delete();
        $role_user = Role_User::where('user_id', $id)->delete();
        return redirect()->route('users_list');
    }

    /**
     * Recovering users from soft deletion
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function recover(Request $request, $id)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);

        // restore a soft deleted user
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('users_list');
    }

    public function delete()
    {
        $users = User::withTrashed()->orderBy('firstname', 'asc')->paginate(7);
        return view('users.delete')->with('users', $users);
    }

    /**
     * Completely remove the record from the database UNRECOVERABLE
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function purge(Request $request, $id)
    {
        // Authenticate System administrators only
        $request->user()->authorizeRoles([1]);


        // Purge the user from database
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        return redirect()->route('users_delete');
    }

}
