<?php

namespace App\Http\Controllers\Admin\User;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')
            ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'sort_name' => 'required|min:1|max:10|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:30|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->sort_name = strtoupper($request->sort_name);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_teacher = $request->is_teacher ? 1 : 0;
        $user->is_active = $request->is_active ? 1 : 0;
        $user->is_admin = $request->is_admin ? 1 : 0;

        if ($user->save()) {
            $request->session()->flash('success', 'User create successful');
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit')
            ->with('user', $user);
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
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'sort_name' => 'required|min:1|max:10|unique:users,sort_name,' . $user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->sort_name = strtoupper($request->sort_name);
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->is_teacher = $request->is_teacher ? 1 : 0;
        $user->is_active = $request->is_active ? 1 : 0;
        $user->is_admin = $request->is_admin ? 1 : 0;

        if ($user->save()) {
            $request->session()->flash('success', 'User update successful');
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if($user->id == Auth::user()->id){
            $request->session()->flash('info', 'You cannot delete yourself');
            return redirect()->back();
        }
        $user->delete();
        $request->session()->flash('success', 'User delete successfull');
        return redirect()->route('users.index');
    }
}
