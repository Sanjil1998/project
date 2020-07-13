<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['index'],
            ]);
    }

    public function index(){
        return redirect('/login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function users(){
        return view('admin.users');
    }
    public function profile(){
        return view('admin.profile');
    }
}
