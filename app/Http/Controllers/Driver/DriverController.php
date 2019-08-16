<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Laporan;
use App\Models\Barang;
use App\Models\ListSubBarang;
use App\Models\SubBarang;
use Date;
use Str;
use Illuminate\Support\Carbon;

class DriverController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data['list_barang'] = Barang::all();
        $data['oldLaporan'] = Laporan::where('user_id', $user_id)->whereDate('added_on', '=', date('Y-m-d'))->orderBy('id', 'DESC')->first();
        // dd($data);
        return view('driver.home')->with($data);
    }
    
    public function createLaporan(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'jenis_mobil' => ['required'],
            'spv_hunter' => ['required'],
            'tujuan' => ['required'],
            'nama_juragan' => ['required'],
            'nama_toko' => ['required'],
            'nama_pemilik_toko' => ['required'],
            'no_handphone' => ['required'],
            'id_barang' => ['required'],
            'qty' => ['required'],
            'satuan' => ['required'],
        ]);
        $file_photo_juragan_ttd = $request->file('photo_juragan_ttd');
        $file_photo_ktp_barcode_adr = $request->file('photo_ktp_barcode_adr');
        $file_photo_juragan_cabinet = $request->file('photo_juragan_cabinet');
        $file_photo_ktp = $request->file('photo_ktp');
        $filename_photo_juragan_ttd = date('Y_m_d_His').'_'.$user_id.".".$file_photo_juragan_ttd->getClientOriginalExtension();
        $filename_photo_ktp_barcode_adr = date('Y_m_d_His').'_'.$user_id.".".$file_photo_ktp_barcode_adr->getClientOriginalExtension();
        $filename_photo_juragan_cabinet = date('Y_m_d_His').'_'.$user_id.".".$file_photo_juragan_cabinet->getClientOriginalExtension();
        $filename_photo_ktp = date('Y_m_d_His').'_'.$user_id.".".$file_photo_ktp->getClientOriginalExtension();
        $table = new Laporan;
        $table->user_id = $user_id;
        $table->barang_id = $request->id_barang;
        $table->jenis_mobil = $request->jenis_mobil;
        $table->spv_hunter = $request->spv_hunter;
        $table->tujuan = $request->tujuan;
        $table->nama_juragan = $request->nama_juragan;
        $table->nama_toko = $request->nama_toko;
        $table->nama_pemilik_toko = $request->nama_pemilik_toko;
        $table->no_handphone = $request->no_handphone;
        $table->qty_barang = $request->qty;
        $table->satuan_barang = $request->satuan;
        $table->photo_juragan_ttd = $filename_photo_juragan_ttd;
        $table->photo_ktp_barcode_adr = $filename_photo_ktp_barcode_adr;
        $table->photo_juragan_cabinet = $filename_photo_juragan_cabinet;
        $table->photo_ktp = $filename_photo_ktp;
        $table->save();

        $file_photo_juragan_ttd->move('img/driver/juragan/', $filename_photo_juragan_ttd);
        $file_photo_ktp_barcode_adr->move('img/driver/ktpBarcode/', $filename_photo_ktp_barcode_adr);
        $file_photo_juragan_cabinet->move('img/driver/juraganCabinet/', $filename_photo_juragan_cabinet);
        $file_photo_ktp->move('img/driver/ktp/', $filename_photo_ktp);

        $barang = Barang::find($request->id_barang);
        if($barang->nama_barang == 'BD206') {
            $sub = new SubBarang;
            $sub->barang_id = $barang->id;
            $sub->nama_sub_barang = "Bracket Highlighter";
            $sub->qty = 1;
            $sub->satuan = 'PCS';
            $sub->save();
            $sub = new SubBarang;
            $sub->barang_id = $barang->id;
            $sub->nama_sub_barang = "Insertion Highlighter";
            $sub->qty = 1;
            $sub->satuan = 'PCS';
            $sub->save();
        } else if($barang->nama_barang == 'GWK') {
            $sub = new SubBarang;
            $sub->barang_id = $barang->id;
            $sub->nama_sub_barang = "Coolpack";
            $sub->qty = 1;
            $sub->satuan = 'PCS';
            $sub->save();
        }
        $request->session()->flash('success_message', "Success adding");
        return redirect()->route('driver.index');

    }
}
    