<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DriverController extends Controller
{
    public function index()
    {
        return view('driver.home');
    }
}
