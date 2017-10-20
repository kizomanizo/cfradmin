<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;


class RoleController extends Controller
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
        $roles = Role::orderBy('name', 'asc')->get();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirect the creation page
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Authentiacate System administrators only
        $request->user()->authorizeRoles([1]);

        // Validate the user to be stored
        $request->validate([
            'name' => 'required|max:25',
            'description' => 'required|max:100',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->level = $request->level;
        $role->save();
        //list all roles
        return redirect()->route('roles.index');
        // return $role;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show role details
        $role = Role::find($id);
        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles/edit')->with('role', $role);
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

        //Validate role change
        $request->validate([
            'name' => 'required|alpha|max:20',
            'description' => 'required|max:100',
        ]);

        // Save changes
        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->level = $request->level;
        $role->save();
        //list all roles
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // Authentiacate System administrators only
        $request->user()->authorizeRoles([1]);

        // This method soft deletes the role from the database, be CAREFUL with it
        $role = Role::where('id', $id)->delete();
        return redirect()->route('roles.index');
    }

    /**
     * Shows deleted roles for recovery
     * @return [type] [description]
     */
    public function deleted()
    {
        $roles = Role::onlyTrashed()->orderBy('name', 'asc')->get();
        return view('roles.deleted')->with('roles', $roles);
    }

    public function recover(Request $request, $id)
    {
        // Authentiacate System administrators only
        $request->user()->authorizeRoles([1]);

        // restore a soft deleted role
        $role = Role::withTrashed()->find($id);
        $role->restore();
        return redirect()->route('roles.index');
    }
}
