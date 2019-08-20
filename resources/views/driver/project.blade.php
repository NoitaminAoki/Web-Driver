@extends('template.main')
@section('title', 'Profile')
@section('css-top')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('body-title', 'Driver Profile')
@section('breadcumb-1', 'Driver')
@section('breadcumb-2', 'Profile')
@section('content')
<section class="content">
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header text-white" style="background: url('{{asset("dist/img/photo2.png")}}') center center;">
            <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
            <h5 class="widget-user-desc">{{Auth::user()->no_pol}}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{asset('dist/img/user8-128x128.jpg')}}" alt="User Avatar">
        </div>
        <div class="card-body mt-3" style="display: block">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <p class="text-muted">“Ambillah risiko yang lebih besar dari apa yang dipikirkan orang lain aman. Berilah perhatian lebih dari apa yang orang lain pikir bijak. Bermimpilah lebih dari apa yang orang lain pikir masuk akal” - Claude T. Bissell</p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Nomor Polisi
                            <b class="d-block">{{Auth::user()->no_pol}}</b>
                        </p>
                        <p class="text-sm">Project Leader
                            <b class="d-block">Tony Chicken</b>
                        </p>
                    </div>
                    <h5 class="mt-5 text-muted">Laporan Hari Ini</h5>
                    <div class="text-muted">
                        <p class="text-sm">Jenis Mobil
                            <b class="d-block">{{(!empty($laporan))? $laporan->jenis_mobil : 'Belum ada'}}</b>
                        </p>
                        <p class="text-sm">Tujuan
                            <b class="d-block">{{(!empty($laporan))? $laporan->tujuan : 'Belum ada'}}</b>
                        </p>
                        <p class="text-sm">Nama Juragan
                            <b class="d-block">{{(!empty($laporan))? $laporan->nama_juragan : 'Belum ada'}}</b>
                        </p>
                    </div>
                    <div class="text-center mt-5 mb-3">
                        <a href="{{ route('driver.index') }}" class="btn btn-sm btn-primary">Buat Laporan</a>
                        <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 mt-2">
                    <div class="row">
                        <div class="col-12">
                            <h4 style="border-bottom: 2px solid #828282;" class="py-1">Laporan Terakhir</h4>
                            @if(count($laporan_terakhir) == 0)
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Info!</h5>
                                Belum ada laporan.
                            </div>
                            @endif
                            @foreach ($laporan_terakhir as $item)
                            <div class="post">
                                <div class="user-block">
                                    <img class="" src="../../dist/img/store.png" alt="store image">
                                    {{-- <i class="img-circle img-bordered-sm fa fa-home fa-2x"></i> --}}
                                    <span class="username">
                                        <a href="#" class="text-capitalize" style="font-size: 1.1rem;">{{$item->nama_toko}}</a>
                                    </span>
                                    <span class="description" style="font-size: 1.01rem;">{{$item->created_at->formatLocalized('%d %B %Y')}} - {{$item->created_at->diffForHumans()}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p class="text-capitalize">
                                    <b>Tujuan:</b> {{$item->tujuan}} <br>
                                    <b>Juragan:</b> {{$item->nama_juragan}} <br>
                                    <b>Toko/Outlet:</b> {{$item->nama_toko}} <br>
                                    <b>Pemilik Toko/Outlet:</b> {{$item->nama_pemilik_toko}} <br>
                                    <b>Nomor Handphone:</b> {{$item->no_handphone}}
                                </p>
                                
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
    </div>
    <!-- /.widget-user -->
    <!-- /.card-body -->
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@section('script')
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@if (Session::has('success'))
<script>
    $(document).ready(function() {
        Swal.fire(
        'Selamat!',
        'Laporan anda telah berhasil dibuat!',
        'success'
        );
    });
</script>
@endif
@endsection