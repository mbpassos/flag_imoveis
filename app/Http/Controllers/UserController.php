<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
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
        if (Gate::allows('adminRole')){
            return view('users/index', ['roles' => Role::all()]);
        } else return redirect('/')->with('message', 'Acess denied!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('adminRole')){
            return view('users.create', ['roles' => Role::all()]);
        } else return redirect('/')->with('message', 'Acess denied!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputData = $request->all();
        $user = new User();
        $user->name = $inputData['name'];
        $user->telephone = $inputData['telephone'];
        $user->email = $inputData['email'];
        $user->role_id = $request->get("role");
        $user->save();
        return redirect()->route('users.index')->with('message', 'New User added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User;
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Gate::allows('adminRole')){
            return view('users.view', ['user' => $user]);
        } else return redirect('/')->with('message', 'Acess denied!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::allows('adminRole')){
            return view('users.edit', ['user' => $user, 'roles' => Role::all()]);
        } else return redirect('/')->with('message', 'Acess denied!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $inputData = $request->all();
        $user->name = $inputData['name'];
        $user->telephone = $inputData['telephone'];
        $user->email = $inputData['email'];
        $user->role_id = $request->get("role");
        $user->save();
        return redirect()->route('users.index')->with('message', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::allows('adminRole')){
            User::destroy($user->id);
            return redirect()->route('users.index')->with('message', 'User deleted!');
        } else return redirect('/')->with('message', 'Acess denied!');

    }
}
