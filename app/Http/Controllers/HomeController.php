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
    // Check if user is super admin
    if (Auth::user()->role == 'spadmin') {
        $users = User::all();
        $instansis = Instansi::all();
        $arsips = ArsipVital::all();

        // Count total users, instansis, and arsip vitals for super admin
        $userCount = User::count();
        $instansiCount = Instansi::count();
        $arsipvitalCount = ArsipVital::count();

        return view('home', compact('users', 'instansis', 'arsips', 'userCount', 'instansiCount', 'arsipvitalCount'));
    } else {
        // If user is not super admin, show only their own instansi data
        $user = Auth::user();
        $instansiId = $user->instansi_id;
        $arsips = ArsipVital::where('instansi_id', $instansiId)->get();

        // Only for admins, include additional user data from their instansi
        if ($user->role == 'admin') {
            $users = User::where('instansi_id', $instansiId)->get();
            return view('home', compact('user', 'arsips', 'users'));
        }

        // For normal users, do not include other user data
        return view('home', compact('user', 'arsips'));
    }
}

    public function daftarUser()
    {   
        //if super admin, show all users
        if (Auth::user()->role == 'spadmin') {
            $users = User::all();
            $instansis = Instansi::all();
            return view('daftar-user', compact('users', 'instansis'));
        }
        
        // if just admin, show only users from their own instansi
        $instansiId = Auth::user()->instansi_id;
        $users = User::where('instansi_id', $instansiId)->where('role','user')->get();
        $instansis = Instansi::where('id', $instansiId)->get();
        return view('daftar-user', compact('users','instansis'));
    }

    public function daftarInstansi()
    {
        // only super admin has access to this page
        $instansis = Instansi::all();

        return view('daftar-instansi', compact('instansis'));
    }

    public function daftarAV()
    {
        // if super admin, show all arsip vitals
        if (Auth::user()->role == 'spadmin') {
            $arsips = ArsipVital::all();
            return view('daftar-arsip', compact('arsips'));
        }

        // if not super admin, show only arsip vitals from their own instansi
        $instansiId = Auth::user()->instansi_id;
        $arsips = ArsipVital::where('instansi_id', $instansiId)->get();

        return view('daftar-arsip', compact('arsips'));
    }

}