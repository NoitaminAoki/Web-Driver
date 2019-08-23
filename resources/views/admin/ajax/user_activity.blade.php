<table class="table table-bordered table-hover datatables">
    <thead>
        <tr>
            <th>Nomor Polisi</th>
            <th>Nama Driver</th>
            <th>Status</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($driver as $item)
        <tr>
            <td><a href="pages/examples/invoice.html">{{$item->no_pol}}</a></td>
            <td>{{$item->name}}</td>
            @if ($item->isOnline())
            <td><span class="badge badge-success">&bull; Online</span></td>
            @else
            <td><span class="badge text-secondary">&bull; Offline ({{\Carbon\Carbon::parse($item->last_activity)->diffForHumans()}})</span></td>
            @endif
            <td><small>{{\Carbon\Carbon::parse($item->last_activity)->format('Y-m-d H:i:s')}}</small></td>
        </tr>
        @endforeach
    </tbody>
</table>