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
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-info">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Jumlah Laporan</h3>
                    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="penghasilan-chart" height="200"></canvas>
                </div>
            </div>
        </div>
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
                        <h3 class="card-title">Laporan Driver ({{$total_laporan}})</h3>
                        
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
<!-- Chart -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
    $(function () {
        'use strict'
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode      = 'index'
        var intersect = true
        var $penghasilanChart = $('#penghasilan-chart')
        var penghasilanChart  = new Chart($penghasilanChart, {
            type   : 'bar',
            data   : {
                labels  : {!! json_encode($xAxis) !!},
                datasets: [
                {
                    backgroundColor: '#28a745',
                    borderColor    : '#28a745',
                    label: '#Jumlah laporan',
                    data           : @json($chartPending)
                }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips           : {
                    mode     : mode,
                    intersect: intersect
                },
                hover              : {
                    mode     : mode,
                    intersect: intersect
                },
                legend             : {
                    display: false
                },
                scales             : {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display      : true,
                            lineWidth    : '4px',
                            color        : 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks    : $.extend({
                            beginAtZero: true,
                            // Include a dollar sign in the ticks
                            callback: function (value, index, values) {
                                // if (value >= 1000000) {
                                    //     value /= 1000000
                                    //     value += 'JT'
                                    // }
                                    return value
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display  : true,
                            gridLines: {
                                display: false
                            },
                            ticks    : ticksStyle
                        }]
                    }
                }
            })
        });
    </script>
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