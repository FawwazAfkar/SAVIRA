<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instansi;
use App\Models\ArsipVital;

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
        // if else statement to check if user is super admin or not
        if (Auth::user()->role == 'spadmin') {
            $users = User::all();
            $instansis = Instansi::all();
            $arsips = ArsipVital::all();

            // Count total users, instansis, and arsip vitals for super admin
            $userCount = User::count();
            $instansiCount = Instansi::count();
            $arsipvitalCount = ArsipVital::count();

            return view('home', compact('users', 'instansis', 'arsips', 'userCount', 'instansiCount', 'arsipvitalCount'));
        }

        // if user is not super admin, show only their own data
        $user = Auth::user();
        $instansiId = $user->instansi_id;
        $arsips = ArsipVital::where('instansi_id', $instansiId)->get();
        
        return view('home', compact('user', 'arsips'));
    }
    public function daftarUser()
    {
        return view('daftar-user');
    }
    public function daftarInstansi()
    {
        return view('daftar-instansi');
    }
    public function daftarAV()
    {
        return view('daftar-arsip');
    }

}