<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./pluginlogin/vendor/bootstrap/css/bootstrap.min.css">
    <title>Report User</title>
</head>
<body>
    <div class="col-12">
        <table class="table table-bordered table-hover" style="width: 100%" width="100%">
            <thead>
                <tr>
                    <td colspan="3" class="border-0"><b>Jenis Mobil :&nbsp;&nbsp;</b> {{$laporan[count($laporan)-1]->jenis_mobil}}</td>
                    <td colspan="3" class="border-0"><b>No. Mobil :&nbsp;&nbsp;</b> {{$laporan[count($laporan)-1]->user->no_pol}}</td>
                    <td colspan="4" class="border-0"><b>Nama Sopir :&nbsp;&nbsp;</b> {{$laporan[count($laporan)-1]->user->name}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="border-0"><b>SPV Hunter :&nbsp;&nbsp;</b> {{$laporan[count($laporan)-1]->spv_hunter}}</td>
                    <td colspan="7" class="border-0"><b>Tujuan :&nbsp;&nbsp;</b> {{$laporan[count($laporan)-1]->tujuan}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">nama Juragan</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">Nama Toko / Outlet</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">No.Handphone</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">Nama BARANG</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">Qty</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">Satuan</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">Juragan + TTD</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">KTP+Barcode+ADR (Closeup)</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">Juragan+Cabinet (Full Body)</td>
                    <td class="font-weight-bold text-capitalize bg-warning" align="center">KTP</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                <tr>
                    <td align="center">{{$item->nama_juragan}}</td>
                    <td align="center">{{$item->nama_toko}}</td>
                    <td align="center">{{$item->nama_pemilik_toko}}</td>
                    <td align="center">
                        {{$item->barang->nama_barang}}
                    </td>
                    <td align="center">{{$item->qty_barang}}</td>
                    <td align="center">{{$item->satuan_barang}}</td>
                    <td rowspan="{{count($item->subBarang())+1}}" align="center">
                        <img style="width: 200px; height: 150px;" src="./img/driver/juragan/{{$item->photo_ktp_barcode_adr}}" alt=""></td>
                        <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="./img/driver/ktpBarcode/{{$item->photo_juragan_ttd}}" alt=""></td>
                        <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="./img/driver/juraganCabinet/{{$item->photo_juragan_cabinet}}" alt=""></td>
                        <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="./img/driver/ktp/{{$item->photo_ktp}}" alt=""></td>
                    </tr>
                    @foreach ($item->subBarang() as $subItem)
                    <tr>
                        <td align="center"><br></td>
                        <td align="center"><br></td>
                        <td align="center"><br></td>
                        <td align="center">{{$subItem->nama_sub_barang}}</td>
                        <td align="center">{{$subItem->qty}}</td>
                        <td align="center" class="text-lowercase">{{$subItem->satuan}}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </html>