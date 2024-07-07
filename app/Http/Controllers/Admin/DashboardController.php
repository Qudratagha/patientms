<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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
        $totalPatients = Patients::count();

        // Return the view with totalPatients variable
//        return view('dashboard', compact('totalPatients'));
        return view('admin/dashboard', compact('totalPatients'));
    }
}
