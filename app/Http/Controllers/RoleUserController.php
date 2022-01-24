<?php

namespace App\Http\Controllers;

use App\Models\Role_User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userRole = $request->user_role;
        foreach ($userRole as $role){
            $us = new Role_User();
            $us->User_ID = $request->user_id;
            $us->Role_ID = $role;
            $us->status  = 1;
            $us->save();
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role_User  $role_User
     * @return \Illuminate\Http\Response
     */
    public function show(Role_User $role_User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role_User  $role_User
     * @return \Illuminate\Http\Response
     */
    public function edit(Role_User $role_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role_User  $role_User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role_User $role_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role_User  $role_User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role_User $role_User)
    {
        //
    }
}
