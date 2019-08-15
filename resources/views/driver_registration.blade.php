@extends('template.main')
@section('title', 'Driver Daftar')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection
@section('body-title', 'Registration')
@section('breadcumb-1', 'Registration')
@section('breadcumb-2', 'Driver')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                
                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="jenisMobil">Jenis Mobil</label>
                    <input type="text" id="jenisMobil" class="form-control" placeholder="Jenis Mobil">
                </div>
                <div class="form-group">
                    <label for="nomorMobil">Nomor Mobil</label>
                    <input type="text" id="nomorMobil" class="form-control" placeholder="Nomor Mobil">
                </div>
                <div class="form-group">
                    <label for="namaSopir">Nama Sopir</label>
                    <input type="text" id="namaSopir" class="form-control" placeholder="nama Sopir">
                </div>
                <div class="form-group">
                    <label for="spvHunter">SPV Hunter</label>
                    <input type="text" id="spvHunter" class="form-control" placeholder="SPV Hunter">
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" id="tujuan" class="form-control" placeholder="Tujuan">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right col-lg-2 col-md-3 col-12">Submit</button>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection