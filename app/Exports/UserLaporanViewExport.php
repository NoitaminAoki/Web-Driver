<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

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
        return view('admin.report.user_report', $data);
    }
}
