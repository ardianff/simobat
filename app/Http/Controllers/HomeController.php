<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::count();
        $medicine = Medicine::count();
        return view('pages.home.index', [
            'medicine_count' => $medicine,
            'users_count' => $users,
        ]);
    }
}