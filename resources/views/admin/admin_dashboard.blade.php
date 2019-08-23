@extends('template.admin.main')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('css-top')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('body-title', 'Dashboard')
@section('breadcumb-1', 'Admin')
@section('breadcumb-2', 'Dashboard')
@section('content')
<section class="content">
    {{-- <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">nama Juragan</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">Nama Toko / Outlet</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">No.Handphone</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">Nama BARANG</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">Qty</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">Satuan</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">Juragan + TTD</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">KTP+Barcode+ADR (Closeup)</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">Juragan+Cabinet (Full Body)</td>
                                <td class="font-weight-bold text-capitalize bg-warning border-dark" align="center">KTP</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                            <tr>
                                <td class="border-dark" align="center">{{$item->nama_juragan}}</td>
                                <td class="border-dark" align="center">{{$item->nama_toko}}</td>
                                <td class="border-dark" align="center">{{$item->nama_pemilik_toko}}</td>
                                <td class="border-dark" align="center">
                                    {{$item->barang->nama_barang}}
                                </td>
                                <td class="border-dark" align="center">{{$item->qty_barang}}</td>
                                <td class="border-dark" align="center">{{$item->satuan_barang}}</td>
                                <td class="border-dark" rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{asset('img/driver/juragan/'.$item->photo_ktp_barcode_adr)}}" alt=""></td>
                                <td class="border-dark" rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{ asset('img/driver/ktpBarcode/'.$item->photo_juragan_ttd) }}" alt=""></td>
                                <td class="border-dark" rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{ asset('img/driver/juraganCabinet/'.$item->photo_juragan_cabinet) }}" alt=""></td>
                                <td class="border-dark" rowspan="{{count($item->subBarang())+1}}" align="center"><img style="width: 200px; height: 150px;" src="{{ asset('img/driver/ktp/'.$item->photo_ktp) }}" alt=""></td>
                            </tr>
                            @foreach ($item->subBarang() as $subItem)
                            <tr>
                                <td class="border-dark" align="center"><br></td>
                                <td class="border-dark" align="center"><br></td>
                                <td class="border-dark" align="center"><br></td>
                                <td class="border-dark" align="center">{{$subItem->nama_sub_barang}}</td>
                                <td class="border-dark" align="center">{{$subItem->qty}}</td>
                                <td class="border-dark" align="center" class="text-lowercase">{{$subItem->satuan}}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-4 py-0">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Driver</h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{number_format($driver_total, 0)}}</h5>
                                    <span class="description-text">TOTAL</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{number_format($driver_kontrak, 0)}}</h5>
                                    <span class="description-text">KONTRAK</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">{{number_format($driver_panggilan, 0)}}</h5>
                                    <span class="description-text">PANGGILAN</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Laporan Driver</h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            @if(count($jumlah_laporan) == 0)
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Info!</h5>
                                Belum ada laporan hari ini.
                            </div>
                            @endif
                            @foreach ($jumlah_laporan as $item)
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle" src="../../dist/img/avatar5.png" alt="store image">
                                    {{-- <i class="img-circle img-bordered-sm fa fa-home fa-2x"></i> --}}
                                    <span class="username">
                                        <a href="#" class="text-capitalize text-dark">{{$item->user->name}}</a>
                                    </span>
                                    <span class="description" style="font-size: 0.9rem;"><b>Jumlah Laporan : </b>{{$item->jumlah}}</span>
                                </div>
                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-search mr-1"></i> Lihat</a>
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 py-0">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Driver Activity</h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="get-user-activity" data-target="#parentUserActivity">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive" id="parentUserActivity">
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
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-right">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-left">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- HandleBar -->
{{-- <script src="{{ asset('plugins/handlebar/handlebars-v4.1.2.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('.datatables').dataTable({
            "order": [[ 3, "desc" ]]
        });
        setInterval(function() {
            updateUserActivity('#parentUserActivity');
        }, 60000);
    });
    
    $('[data-widget="get-user-activity"]').on('click', function () {
        var target = $(this).data('target');
        updateUserActivity(target); 
    });
    
    function updateUserActivity(target) {
        $.ajax({
            url: "{{route('admin.user.get.activity')}}",
            method: 'GET',
            success: function (result) {
                if(result.code === 200) {
                    $(target).html(result.content);
                    $(target+' table').dataTable({
                        "order": [[ 3, "desc" ]]
                    });
                }
            },
            error: function (xhr, status, dll) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
@endsection