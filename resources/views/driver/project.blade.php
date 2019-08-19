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
        <div class="widget-user-header text-white" style="background: url('../dist/img/photo2.png') center center;">
            <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
            <h5 class="widget-user-desc">{{Auth::user()->no_pol}}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="../dist/img/user3-128x128.jpg" alt="User Avatar">
        </div>
        <div class="card-body mt-3" style="display: block">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
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
                                @foreach ($laporan_terakhir as $item)
                                <div class="post">
                                    <div class="user-block">
                                        <img class="" src="../../dist/img/store.png" alt="store image">
                                        {{-- <i class="img-circle img-bordered-sm fa fa-home fa-2x"></i> --}}
                                        <span class="username">
                                            <a href="#">{{$item->nama_toko}}</a>
                                        </span>
                                        <span class="description">{{date_format($item->created_at, 'd-F-Y')}} - {{$item->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
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
    <!-- Default box -->
    {{-- <div class="card col-md-8 col-sm-10 mx-auto">
        <div class="card-header">
            <h3 class="card-title">Driver Detail</h3>
            
            <div class="card-tools">
                {{Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y")}}
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <h3 class="text-primary">
                        <i class="fas fa-user" style="padding-right: 10px;"></i> {{Auth::user()->name}}
                    </h3>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut tempus lacus, at efficitur libero. Donec id tincidunt quam, ac bibendum nunc. Duis id dictum ipsum. Donec auctor risus ultrices, aliquet ligula in, fringilla purus. Sed imperdiet lobortis feugiat. In pretium at velit luctus viverra. Maecenas vel nulla risus. Cras id ex lorem. Nullam maximus nisi eget tristique porttitor. Nam eleifend enim in leo facilisis congue. Quisque ac quam non risus mollis consequat. Phasellus ullamcorper venenatis sodales. Nunc tincidunt ullamcorper arcu quis pharetra. Phasellus a laoreet tortor, et ornare ex.
                    </p>
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
                            @foreach ($laporan_terakhir as $item)
                            <div class="post">
                                <div class="user-block">
                                    <img class="" src="../../dist/img/store.png" alt="store image">
                                    <span class="username">
                                        <a href="#">{{$item->nama_toko}}</a>
                                    </span>
                                    <span class="description">{{date_format($item->created_at, 'd-F-Y')}} - {{$item->created_at->diffForHumans()}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Tujuan:  {{$item->tujuan}} <br>
                                    nama Juragan:  {{$item->nama_juragan}} <br>
                                    Nama Toko/Outlet:  {{$item->nama_toko}} <br>
                                    Nama Pemilik Toko/Outlet:  {{$item->nama_pemilik_toko}} <br>
                                    Nomor Handphone:  {{$item->no_handphone}}
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
        </div> --}}
        <!-- /.card-body -->
    </div>
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