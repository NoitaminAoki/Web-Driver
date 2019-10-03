<?php

namespace App\Exports;

use App\Models\Laporan;
use App\User;
use App\Models\Barang;
use App\Models\SubBarang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserLaporanViewExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id) {
        $this->id = $id;
    }
    public function view(): View
    {
        $data['laporan'] = laporan::where('user_id', $this->id)->get();
        // dd($data);
        $headers = ['Nama Juragan', 'Nama Toko / Outlet', 'Nama Pemilik Toko / Outlet', 'No. Handphone', 'Nama BARANG', 'Qty', 'Satuan', 'Juragan + TTD',
        'KTP+Barcode+ADR (Closeup)', 'Juragan+Cabinet (Full Body)', 'KTP'];
        $rows = [];
        $top_data = [];
        $user = User::find($this->id);
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
        return view('admin.report.user_report_excel', $data);
    }
}
