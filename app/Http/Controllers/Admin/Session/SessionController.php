<?php

namespace App\Http\Controllers\Admin\Session;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.session.index')
        ->with('session', Session::first());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = Session::first();
        if ($session) {
          // Update
          $session->session = $request->session;
          if ($session->save()) {
              $request->session()->flash('success', 'Session create successful');
          }
        }else{
          // Create
          $session = new Session();
          $session->session = $request->session;
          if ($session->save()) {
              $request->session()->flash('success', 'Session create successful');
          }
        }
        return redirect()->back();
    }


}
