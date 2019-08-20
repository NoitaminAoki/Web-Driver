<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\user;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['driver'] = user::all();
        return view('admin.admin_dashboard')->with($data);
    }
}
