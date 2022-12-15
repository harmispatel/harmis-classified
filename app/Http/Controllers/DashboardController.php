<?php

namespace App\Http\Controllers;

use App\Models\{PermissionRole, Propertie, User};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return /view/dashboard.
     */
    public function index()
    {
        $totalProperty = Propertie::count();
        $rentProperty = Propertie::where('property_type', 1)->count();
        $sellProperty = Propertie::where('property_type', 2)->count();
        $totaluser = User::where('id', '!=', 1 )->count();

        return view('dashboard', compact('totalProperty', 'rentProperty','sellProperty','totaluser'));
    }
}
