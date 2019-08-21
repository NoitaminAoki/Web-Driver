@extends('template.main')
@section('title', 'Buat Laporan')
@section('css-top')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<style>
    .img-preview {
        display: none;
    }
    #loader-wrapper {
        display: none;
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 1054;
        background: rgba(57, 57, 57, 0.9);
    }
    #loader {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #F6E1B2;
        
        -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }
    
    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #FEC66E;
        
        -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }
    
    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 5px solid transparent;
        border-top-color: #C7763E;
        
        -webkit-animation: spin 1s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 1s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
    }
    
    @-webkit-keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
    @keyframes spin {
        0%   {
            -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);  /* IE 9 */
            transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
        }
        100% {
            -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);  /* IE 9 */
            transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
        }
    }
</style>
@endsection
@section('body-title', 'Buat Laporan')
@section('breadcumb-1', 'Driver')
@section('breadcumb-2', 'Laporan')
@section('loader')
<div id="loader-wrapper">
    <div id="loader"></div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                
                <div class="card-tools">
                    {{Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y")}}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('driver.create.laporan') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputJenisMobil">Jenis Mobil</label>
                            <input type="text" id="inputJenisMobil" name="jenis_mobil" class="form-control" value="{{(!empty($oldLaporan))? $oldLaporan->jenis_mobil : ''}}" placeholder="Jenis Mobil" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNoMobil">No. Mobil</label>
                        <input type="text" id="inputNoMobil" name="no_mobil" class="form-control" value="@auth{{Auth::user()->no_pol}}@endauth" placeholder="Nomor Mobil" disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputNamaDriver">Nama Driver</label>
                        <input type="text" id="inputNamaDriver" name="no_driver" class="form-control" disabled value="@auth{{Auth::user()->name}}@endauth" placeholder="Nama Driver" required>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputSpvHunter">SPV Hunter</label>
                            <input type="text" id="inputSpvHunter" name="spv_hunter" class="form-control" value="{{(!empty($oldLaporan))? $oldLaporan->spv_hunter : ''}}" placeholder="Supervisor Hunter" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputTujuan">Tujuan</label>
                            <input type="text" id="inputTujuan" name="tujuan" class="form-control" value="{{(!empty($oldLaporan))? $oldLaporan->tujuan : ''}}" placeholder="Tujuan" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputJuragan">Nama Juragan</label>
                            <input type="text" id="inputJuragan" name="nama_juragan" class="form-control" value="{{(!empty($oldLaporan))? $oldLaporan->nama_juragan : ''}}" placeholder="Juragan" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputToko">Nama Toko / Outlet</label>
                            <input type="text" id="inputToko" name="nama_toko" class="form-control" placeholder="Toko" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputPemilikToko">Nama Pemilik Toko / Outlet</label>
                            <input type="text" id="inputPemilikToko" name="nama_pemilik_toko" class="form-control" placeholder="Nama Pemilik Toko" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 px-0">
                            <label for="inputNoHandphone">No. Handphone</label>
                            <input type="text" id="inputNoHandphone" name="no_handphone" class="form-control" placeholder="Nomor Handphone" required>
                            <div class="invalid-tooltip">
                                Harap Diisi.
                            </div>
                        </div>
                    </div>
                    <div class="p-2" style="border: 1px dashed #000;">
                        <div class="form-group">
                            <div class="col-12 px-0">
                                <label for="inputNamaBarang">Nama BARANG</label>
                                <select class="form-control select2" style="width: 100%;" name="id_barang" id="inputNamaBarang" placeholder="Nama Barang" required>
                                    @foreach ($list_barang as $item)
                                    <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-tooltip">
                                    Harap Diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Qty / Satuan</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" min="1" id="inputQty" name="qty" class="form-control" placeholder="Quantity" required>
                                    <div class="invalid-tooltip">
                                        Harap Diisi.
                                    </div>
                                </div>
                                <div class="col-6">
                                    <select class="form-control select2" style="width: 100%;" name="satuan" id="inputSatuan" placeholder="Nama Barang" required>
                                        <option value="unit">Unit</option>
                                        <option value="pcs">Pcs</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Harap Diisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Foto Juragan / Outlet dan TTD</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo_juragan_ttd" name="photo_juragan_ttd" required>
                            <label class="custom-file-label" for="photo_juragan_ttd">Choose file</label>
                            <div class="invalid-tooltip">
                                Please fill in an image file.
                            </div>
                        </div>
                        <img src="#" alt="" style="height: 250px;" class="img-preview mt-2 rounded col-12">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Foto KTP, Barcode dan ADR (Closeup)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo_ktp_barcode_adr" name="photo_ktp_barcode_adr" required>
                            <label class="custom-file-label" for="photo_ktp_barcode_adr">Choose file</label>
                            <div class="invalid-tooltip">
                                Please fill in an image file.
                            </div>
                        </div>
                        <img src="#" alt="" style="height: 250px;" class="img-preview mt-2 rounded col-12">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Foto Juragan / Outlet dan (Full Body)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo_juragan_cabinet" name="photo_juragan_cabinet" required>
                            <label class="custom-file-label" for="photo_juragan_cabinet">Choose file</label>
                            <div class="invalid-tooltip">
                                Please fill in an image file.
                            </div>
                        </div>
                        <img src="#" alt="" style="height: 250px;" class="img-preview mt-2 rounded col-12">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Foto KTP</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo_ktp" name="photo_ktp" required>
                            <label class="custom-file-label" for="photo_ktp">Choose file</label>
                            <div class="invalid-tooltip">
                                Please fill in an image file.
                            </div>
                        </div>
                        <img src="#" alt="" style="height: 250px;" class="img-preview mt-2 rounded col-12">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right col-lg-2 col-md-3 col-12">Submit</button>
                    </div>
                </form>
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
        // window.scrollTo(0, 0);
    });
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $('#loader-wrapper').show();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $('input[type="file"]').change(function(e) {
        var filename = e.target.files[0].name;
        $(e.target).next('.custom-file-label').text(filename);
        $(e.target).parent().next('.img-preview').attr('src', window.URL.createObjectURL(e.target.files[0]));
        $(e.target).parent().next('.img-preview').show();
    });
</script>
@endsection