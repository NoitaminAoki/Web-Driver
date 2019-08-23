<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserLaporanExport;
use App\Exports\UserLaporanViewExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Laporan;
use App\User;
use View;
use Excel;
use PDF;
use DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['laporan'] = laporan::where('user_id', 1)->get();
        $data['driver_total'] = User::count();
        $data['driver_kontrak'] = User::where('status', 'Kontrak')->count();
        $data['driver_panggilan'] = $data['driver_total']-$data['driver_kontrak'];
        $data['jumlah_laporan'] = Laporan::select(DB::raw('user_id, count(*) as jumlah'))->whereDate('added_on', '=', date('Y-m-d'))->groupBy('user_id')->orderBy('jumlah', 'DESC')->limit('5')->get();
        $data['latest_laporan'] = Laporan::select(DB::raw('user_id'))->whereDate('added_on', '=', date('Y-m-d'))->groupBy('user_id')->orderBy('added_on', 'DESC')->limit('5')->get()->toArray();
        $data['driver'] = User::orderBy('last_activity', 'DESC')->get();
        return view('admin.admin_dashboard')->with($data);
    }
    
    public function userGetActivity()
    {
        $data['driver'] = User::orderBy('last_activity', 'DESC')->get();
        return response()->json(['code' => 200, 'content' => view('admin.ajax.user_activity', $data)->render()]);
    }
    
    public function reportUser($id)
    {
        $data['laporan'] = laporan::where('user_id', $id)->get();
        // return view('admin.report.user_report_pdf')->with($data);
        
        $pdf = PDF::loadView('admin.report.user_report_pdf',$data);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('laporan-driver.pdf');
        // return Excel::download(new UserLaporanViewExport($id), 'laporan-users.xlsx');
    }
    
    public function driverIndex($status)
    {
        if($status == "all") {
            $data['driver'] = User::all();
        }
        else if($status == "panggilan") {
            $data['driver'] = User::where('status', 'Panggilan')->get();
        }
        else if($status == "kontrak") {
            $data['driver'] = User::where('status', 'Kontrak')->get();
        } else {
            abort(404);
        }
        return view('admin.driver.driver_index')->with($data);
    }
    
    public function driverLaporanPdf(Request $request, $id)
    {
        $data['laporan'] = laporan::where('user_id', $id)->whereDate('created_at', '=', $request->date)->get();
        // dd($data);
        $pdf = PDF::loadView('admin.report.user_report_pdf',$data);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('laporan-driver.pdf');
    }
}
