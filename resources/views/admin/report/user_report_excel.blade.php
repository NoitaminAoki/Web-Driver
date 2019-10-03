<html>
<body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td colspan="3" class="border-0"><b>Jenis Mobil :&nbsp;&nbsp;</b> {{$top_data['jenis_mobil']}}</td>
                <td colspan="3" class="border-0"><b>No. Mobil :&nbsp;&nbsp;</b> {{$top_data['no_mobil']}}</td>
                <td colspan="5" class="border-0"><b>Nama Sopir :&nbsp;&nbsp;</b> {{$top_data['nama_sopir']}}</td>
            </tr>
            <tr>
                <td colspan="3" class="border-0"><b>SPV Hunter :&nbsp;&nbsp;</b> {{$top_data['spv_hunter']}}</td>
                <td colspan="8" class="border-0"><b>Tujuan :&nbsp;&nbsp;</b> {{$top_data['tujuan']}}</td>
            </tr>
            <tr>
                @foreach($headers as $header)
                <th style="border: 2px solid black;background-color: #e5e500;">{{$header}}</th>
                @endforeach
            </tr>
        </thead>
        @foreach ($rows as $row => $val)
        <tr>
            @foreach(Arr::except($val, ['sub_item']) as $key => $value)
            @if($key <= 6)
            <td align="center" style="width: 20px;">{!! $value !!}</td>
            @else
            <td rowspan="{{count($val['sub_item'])+1}}" align="center">{!! $value !!}</td>
            @endif
            @endforeach
        </tr>
        @foreach($val['sub_item'] as $sub_item)
        <tr>
            <td align="center"><br></td>
            <td align="center"><br></td>
            <td align="center"><br></td>
            <td align="center"><br></td>
            <td align="center">{{$sub_item->nama_sub_barang}}</td>
            <td align="center">{{$sub_item->qty}}</td>
            <td align="center" class="text-lowercase">{{$sub_item->satuan}}</td>
        </tr>
        @endforeach
        @endforeach
    </table>
</body>
</html>