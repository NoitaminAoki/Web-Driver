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

    public function userGetActivity()
    {
        $data['driver'] = user::all();
        return response()->json(['code' => 200, 'content' => view('admin.ajax.user_activity', $data)->render()]);
    }
}
