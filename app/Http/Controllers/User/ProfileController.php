<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit()
    {
      return view('user.profile.edit')
        ->with('user', User::find(Auth::user()->id));
    }

    public function update(Request $request)
    {
      $user = User::find(Auth::user()->id);
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

      if ($user->save()) {
          $request->session()->flash('success', 'Profile update successful');
      }
      return redirect()->back();
    }
}
