@extends('template.admin.main')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('css-top')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>
@endsection
@section('body-title', 'Dashboard')
@section('breadcumb-1', 'Admin')
@section('breadcumb-2', 'Dashboard')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5 class="card-title">Upload File Laporan</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tanggal Laporan</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="">File</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="inputGroupFile01" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!-- /.modal -->
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
@if (Session::has('success'))
<script>
    $(document).ready(function() {
        Swal.fire(
        'Selamat!',
        "{{Session::get('success')}}",
        'success'
        );
    });
</script>
@endif
<script>
    $(document).ready(function() {
    });
    $('#inputGroupFile01').on('change',function(e){
        //get the file name
        var fileName = e.target.files[0].name;
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
@endsection