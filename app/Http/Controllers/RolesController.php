<?php

namespace App\Http\Controllers;

use App\Models\roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/roles/index',['roles'=>roles::all()]);
    }

    /** Show the form for creating a new resource. */
    public function create()
    {
        return view('admin/roles/create');
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        //validation information
        $validateFile = $request->validate([
            'role_code'=>'required|unique:roles,Role_Code',
            'role_name'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        //create new role
        $role = new roles();
        $role->Role_Code    = $request->role_code;
        $role->Role_Name    = $request->role_name;
        $role->description  = $request->description;
        $role->status       = $request->status;
        //save into database
        $role->save();
        //redirect to list role
        return redirect()->route('roles.index')->with('create','Create role successful');

    }

    /** Display the specified resource. */
    public function show(roles $roles){}

    /** Show the form for editing the specified resource. */
    public function edit($id)
    {
        return view('admin/roles/edit',['role'=>roles::findOrFail($id)]);
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, $id)
    {
        //Validate field again
        $validate = $request->validate([
            'role_code'=>'required',
            'role_name'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);
        //Find role
        $roleFind = roles::findOrFail($id);
        $roleFind->Role_Code    = $request->role_code;
        $roleFind->Role_Name    = $request->role_name;
        $roleFind->description  = $request->description;
        $roleFind->status       = $request->status;
        //Save
        $roleFind->save();
        //Redirect to list roles
        return redirect()->route('roles.index')->with('update', 'Update Role Successful');
    }

    /** Remove the specified resource from storage. */
    public function destroy($id)
    {
        $res = roles::destroy($id);
        return 'Delete Successfully';
    }
}
