<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->role == 'owner') {
            // jika user adalah owner akan menuju ke halaman dashboard
            return redirect('order');
        } elseif (Auth::user()->role == 'admin') {
            // jika user adalah admin akan menuju ke halaman dashboard
            return redirect('order');
        }
    }
}
