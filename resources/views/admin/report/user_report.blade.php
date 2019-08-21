<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <style>
        table {
            border-collapse: collapse;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }
        .table-bordered {
            border: 2px solid black;
        }
        th, td, tr {
            border: 2px solid black;
        }
    </style> --}}
    <title>Report User</title>
</head>
<body>
    <div class="col-12 p-2">
        <table>
            <thead>
                <tr style="border: 2px solid black">
                    <td>Jenis Mobil</td>
                    <td colspan="9">: {{$laporan[count($laporan)-1]->jenis_mobil}}</td>
                </tr>
                <tr style="border: 2px solid black">
                    <td>No. Mobil</td>
                    <td colspan="9">: {{$laporan[count($laporan)-1]->user->no_pol}}</td>
                </tr>
                <tr style="border: 2px solid black">
                    <td>Nama Sopir</td>
                    <td colspan="9">: {{$laporan[count($laporan)-1]->user->name}}</td>
                </tr>
                <tr style="border: 2px solid black">
                    <td>SPV Hunter</td>
                    <td colspan="9">: {{$laporan[count($laporan)-1]->spv_hunter}}</td>
                </tr>
                <tr style="border: 2px solid black">
                    <td>Tujuan</td>
                    <td colspan="9">: {{$laporan[count($laporan)-1]->tujuan}}</td>
                </tr>
                <tr style="border: 2px solid black">
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">nama Juragan</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">Nama Toko / Outlet</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">No.Handphone</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">Nama BARANG</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">Qty</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">Satuan</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">Juragan + TTD</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">KTP+Barcode+ADR (Closeup)</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">Juragan+Cabinet (Full Body)</td>
                    <td style="border: 2px solid black;background-color: #e5e500" align="center">KTP</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                <tr style="border: 2px solid black">
                    <td style="border: 2px solid black;width:20px;" align="center">{{$item->nama_juragan}}</td>
                    <td style="border: 2px solid black;width:20px;" align="center">{{$item->nama_toko}}</td>
                    <td style="border: 2px solid black;width:20px;" align="center">{{$item->nama_pemilik_toko}}</td>
                    <td style="border: 2px solid black;width:20px;" align="center">
                        {{$item->barang->nama_barang}}
                    </td>
                    <td style="border: 2px solid black;width:20px;" align="center">{{$item->qty_barang}}</td>
                    <td style="border: 2px solid black;width:20px;" align="center">{{$item->satuan_barang}}</td>
                    {{-- <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{asset('img/driver/juragan/'.$item->photo_ktp_barcode_adr)}}" alt=""></td>
                    <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{ asset('img/driver/ktpBarcode/'.$item->photo_juragan_ttd) }}" alt=""></td>
                    <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{ asset('img/driver/juraganCabinet/'.$item->photo_juragan_cabinet) }}" alt=""></td>
                    <td rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{ asset('img/driver/ktp/'.$item->photo_ktp) }}" alt=""></td> --}}
                    <td style="border: 2px solid black;width:20px;" rowspan="{{count($item->subBarang())+1}}" align="center">{{asset('img/driver/juragan/'.$item->photo_ktp_barcode_adr)}}</td>
                    <td style="border: 2px solid black;width:20px;" rowspan="{{count($item->subBarang())+1}}" align="center">{{ asset('img/driver/ktpBarcode/'.$item->photo_juragan_ttd) }}</td>
                    <td style="border: 2px solid black;width:20px;" rowspan="{{count($item->subBarang())+1}}" align="center">{{ asset('img/driver/juraganCabinet/'.$item->photo_juragan_cabinet) }}</td>
                    <td style="border: 2px solid black;width:20px;" rowspan="{{count($item->subBarang())+1}}" align="center">{{ asset('img/driver/ktp/'.$item->photo_ktp) }}</td>
                </tr>
                @foreach ($item->subBarang() as $subItem)
                <tr style="border: 2px solid black">
                    <td style="border: 2px solid black;width:20px;" align="center"><br></td>
                    <td style="border: 2px solid black;width:20px;" align="center"><br></td>
                    <td style="border: 2px solid black;width:20px;" align="center"><br></td>
                    <td style="border: 2px solid black;width:20px;" align="center">{{$subItem->nama_sub_barang}}</td>
                    <td style="border: 2px solid black;width:20px;" align="center">{{$subItem->qty}}</td>
                    <td style="border: 2px solid black;width:20px;" align="center" class="text-lowercase">{{$subItem->satuan}}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>