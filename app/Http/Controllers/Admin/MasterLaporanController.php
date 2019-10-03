<?php

namespace App\Http\Controllers\Admin;

use App\Models\LaporanMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Date;
use Auth;

class MasterLaporanController extends Controller
{
    private $admin;
    
    public function __construct() 
    {
        $this->middleware(function ($request, $next) {
            $this->admin = Auth::guard('admin')->user();
            
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        $get_month = Date('n');
        $get_year = Date('Y');
        if($request->input('date') != null) {
            $get_date = $request->input('date');
        }
        $d=cal_days_in_month(CAL_GREGORIAN,$get_month,$get_year);
        // dd("There was $d days in $get_month $get_year");
        $data['laporan'] = LaporanMaster::all();
        return view('admin.master.master_laporan_index')->with($data);
    }
    
    public function upload()
    {
        return view('admin.master.master_laporan_upload');
    }
    
    public function uploadStore(Request $request)
    {
        // dd($request);
        $file = $request->file('file');
        $filename = $request->date.'_'.Date('YmdHis').$file->getClientOriginalExtension();
        $table = new LaporanMaster;
        $table->tgl_laporan = $request->date;
        $table->nama_file = $filename;
        $table->name_uploader = $this->admin->name;
        $table->save();
        $file->move('file/laporan/master/', $filename);
        $request->session()->flash('success', "Success upload file ($request->date)");
        return redirect(url('admin/master/laporan'));
    }
}
