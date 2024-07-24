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
        $user = Auth::user();
        $instansiId = $user->instansi_id;
        $arsips = ArsipVital::where('instansi_id', $instansiId)->get();

        // Count total users, instansis, and arsip vitals
        $userCount = User::count();
        $instansiCount = Instansi::count();
        $arsipvitalCount = ArsipVital::count();
        
        return view('home', compact('user', 'arsips', 'userCount', 'instansiCount', 'arsipvitalCount'));
    }
}