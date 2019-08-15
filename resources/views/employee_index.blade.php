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
                    <label for="inputName">Project Name</label>
                    <input type="text" id="inputName" class="form-control" value="AdminLTE">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Project Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                </div>
                <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select class="form-control select2" style="width: 100%;">
                        <option selected="" disabled="">Select one</option>
                        <option>On Hold</option>
                        <option>Canceled</option>
                        <option selected="">Success</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="">Picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_img" name="profile_img" required autofocus>
                        <label class="custom-file-label" for="profile_img">Choose file</label>
                        <div class="invalid-tooltip">
                            Please fill in an image file.
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="">Picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_img" name="profile_img" required autofocus>
                        <label class="custom-file-label" for="profile_img">Choose file</label>
                        <div class="invalid-tooltip">
                            Please fill in an image file.
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="">Picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_img" name="profile_img" required autofocus>
                        <label class="custom-file-label" for="profile_img">Choose file</label>
                        <div class="invalid-tooltip">
                            Please fill in an image file.
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="">Picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_img" name="profile_img" required autofocus>
                        <label class="custom-file-label" for="profile_img">Choose file</label>
                        <div class="invalid-tooltip">
                            Please fill in an image file.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputClientCompany">Client Company</label>
                    <input type="text" id="inputClientCompany" class="form-control" value="Deveint Inc">
                </div>
                <div class="form-group">
                    <label for="inputProjectLeader">Project Leader</label>
                    <input type="text" id="inputProjectLeader" class="form-control" value="Tony Chicken">
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