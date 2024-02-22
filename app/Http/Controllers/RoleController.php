<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('roles.index', [
            'title' => 'List of Roles',
            'roles' => $roles,
        ]);
    }

    public function create(Request $request){
        $role = new Role([
            'name' => $request->input('name'),
            'created_by' => 'system',
        ]);

        $role->save();
        return redirect('/roles')->with('msg','Role created successfully');
    }

    public function edit($id){
        $role = Role::find($id);
        return view('roles.edit',[
            'title' => 'Edit Role',
            'role' => $role,
        ]);
    }

    public function details($id){
        $role = Role::find($id);
        return view('roles.details',[
            'title' => 'Role Details',
            'role' => $role
        ]);
    }
}
