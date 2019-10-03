<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserLaporanExport;
use App\Exports\UserLaporanViewExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Laporan;
use App\Models\Barang;
use App\Models\SubBarang;
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
        $data['total_laporan'] = Laporan::select(DB::raw('count(*) as jumlah'))->whereDate('added_on', '=', date('Y-m-d'))->orderBy('jumlah', 'DESC')->first()->jumlah;
        $data['latest_laporan'] = Laporan::select(DB::raw('user_id'))->whereDate('added_on', '=', date('Y-m-d'))->groupBy('user_id')->orderBy('added_on', 'DESC')->limit('5')->get()->toArray();
        $data['driver'] = User::orderBy('last_activity', 'DESC')->get();
        
        $data['chartPending'] = [];
        $data['xAxis'] = [];
        $data['pendapatanChart'] = 0;
        $intRow = 0;
        for ($i=6; $i >= 0; $i--) {
            $data['xAxis'][($intRow)] =  Date('Y M d', strtotime('-'.$i.' days'));
            $data['chartPending'][($intRow)] = Laporan::select(DB::raw('count(*) as jumlah'))->whereDate('added_on', '=', Date('Y-m-d', strtotime('-'.$i.' days')))->orderBy('jumlah', 'DESC')->first()->jumlah;
            $data['pendapatanChart'] += $data['chartPending'][($intRow)];
            $intRow += 1;
        }
        // dd($data);
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
        $driver = [];
        foreach ($data['driver'] as $key => $value) {
            $laporan = Laporan::select(DB::raw('count(added_on) as total, DATE_FORMAT(added_on, "%d/%m/%Y") as tanggal'))->groupBy(DB::raw('tanggal'))->where('user_id', $value->id)->get();
            $value->item = $laporan;
            $driver[] = $value;
        }
        return view('admin.driver.driver_index')->with(compact('driver'));
    }
    
    public function driverLaporanPdf(Request $request, $id)
    {
        $data['laporan'] = laporan::where('user_id', $id)->whereDate('created_at', '=', $request->date)->get();
        // dd($data);
        $pdf = PDF::loadView('admin.report.user_report_pdf',$data);
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('laporan-driver.pdf');
    }
    
    public function driverLaporanExcel($id)
    {
        $data['laporan'] = laporan::where('user_id', $id)->get();
        // dd($data);
        $headers = ['Nama Juragan', 'Nama Toko / Outlet', 'Nama Pemilik Toko / Outlet', 'No. Handphone', 'Nama BARANG', 'Qty', 'Satuan', 'Juragan + TTD',
        'KTP+Barcode+ADR (Closeup)', 'Juragan+Cabinet (Full Body)', 'KTP'];
        $rows = [];
        $top_data = [];
        $user = User::find($id);
        foreach ($data['laporan'] as $Result) {
            $ImageJuragan = '<img width="150px" height="100px;" src="img/driver/juragan/' . $Result->photo_juragan_ttd . '" />';
            $ImageBarcode = '<img width="150px" height="100px;" src="img/driver/ktpBarcode/' . $Result->photo_ktp_barcode_adr . '" />';
            $ImageCabinet = '<img width="150px" height="100px;" src="img/driver/juraganCabinet/' . $Result->photo_juragan_cabinet . '" />';
            $ImageKtp = '<img width="150px" height="100px;" src="img/driver/ktp/' . $Result->photo_ktp . '" />';
            
            $barang = Barang::find($Result->barang_id);
            $top_data = [
                'jenis_mobil' => $Result->jenis_mobil,
                'spv_hunter' => $Result->spv_hunter,
                'tujuan' => $Result->tujuan,
                'no_mobil' => $user->no_pol,
                'nama_sopir' => $user->name,
            ];
            $rows[] = [
                $Result->nama_juragan,
                $Result->nama_toko,
                $Result->nama_pemilik_toko,
                $Result->no_handphone,
                $barang->nama_barang,
                $Result->qty_barang,
                $Result->satuan_barang,
                $ImageJuragan,
                $ImageBarcode,
                $ImageCabinet,
                $ImageKtp,
                'sub_item' => SubBarang::where('laporan_id', $Result->id)->get()
            ];
        }
        $data = [
            'headers' => $headers,
            'rows' => $rows,
            'top_data' => $top_data,
        ];
        // return view('admin.report.user_report_excel', $data);
        return Excel::download(new UserLaporanViewExport($id), 'laporan-users.xlsx');
        
    }
}
