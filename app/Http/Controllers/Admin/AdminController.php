<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserLaporanExport;
use App\Exports\UserLaporanViewExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Laporan;
use App\user;
use View;
use Excel;

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

    public function reportUser($id)
    {
        $data['laporan'] = laporan::where('user_id', $id)->get();
        // return view('admin.report.user_report')->with($data);
        return Excel::download(new UserLaporanViewExport($id), 'laporan-users.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
