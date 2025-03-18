<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the Gallery Dashboard.
     */

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
