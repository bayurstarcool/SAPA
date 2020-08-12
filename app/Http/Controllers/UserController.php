<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Departement;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departements = Departement::all();
        return view('users.create',compact('roles','departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = new User();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = bcrypt($request->password);
        $u->save();
        if($request->role){
            $u->roles()->sync($request->role);
        }
        if($request->dept){
            $u->departements()->sync($request->dept);
        }
        return redirect()->back()->with(['success'=>true,'message'=>'User added successfully']);
    }

    public function registerCustomer(Request $request)
    {
        $u = new User();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = bcrypt($request->password);
        $u->save();
        if($request->role){
            $u->roles()->sync($request->role);
        }
        if($request->dept){
            $u->departements()->sync($request->dept);
        }
        return redirect()->to('/home');
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
        $roles = Role::all();
        $user = User::findOrFail($id);
        $departements = Departement::all();
        return view('users.edit',compact('roles','user','departements'));
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
        $u = User::findOrFail($id);
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = bcrypt($request->password);
        $u->save();
        if($request->role){
            $u->roles()->sync($request->role);
        }
        if($request->dept){
            $u->departements()->sync($request->dept);
        }
        return redirect()->back()->with(['success'=>true,'message'=>'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
