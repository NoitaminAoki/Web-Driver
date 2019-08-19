@extends('template.main')
@section('title', 'Home Driver')
@section('css-top')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('body-title', 'Home')
@section('breadcumb-1', 'Driver')
@section('breadcumb-2', 'profile')
@section('content')
<section class="content">
    
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Driver Detail</h3>
            
            <div class="card-tools">
                {{Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y")}}
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated budget</span>
                                    <span class="info-box-number text-center text-muted mb-0">2300</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total amount spent</span>
                                    <span class="info-box-number text-center text-muted mb-0">2000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                    <span class="info-box-number text-center text-muted mb-0">20</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
                    <h3 class="text-primary">
                        <i class="fas fa-user"></i> {{Auth::user()->name}}
                    </h3>
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
            </div>
        </div>
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