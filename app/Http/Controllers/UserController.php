<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['page' => 'users', 'page_item' => 'users_index']);

        $users = User::where('id','<>',1)->paginate();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['page' => 'users', 'page_item' => 'users_create']);

        $roles = Role::get();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:9'
        ]);

        $user = User::create([
                                'name' => $request->name,
                                'email' => $request->email,
                                'password' => Hash::make($request->password),
                            ]);

        //update data roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)->with('info', 'Usuario registrado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        session(['page' => 'users', 'page_item' => 'users_show']);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        session(['page' => 'users', 'page_item' => 'users_edit']);

        $roles = Role::get();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        //update data roles
        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.edit', $user->id)->with('info', 'Datos del usuario actualizado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changePassword(User $user)
    {
        session(['page' => 'users', 'page_item' => 'users_edit']);

        return view('users.change', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function passwordupdate(Request $request, User $user)
    {
        $this->validate(request(), [
            'password' => 'required|min:9|confirmed'
        ]);

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('users.edit', $user->id)->with('info', 'Datos del usuario actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Eliminado correctamente.');
    }
}