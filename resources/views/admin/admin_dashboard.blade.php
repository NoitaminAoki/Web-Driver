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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">User Activity</h3>
                
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
        $('.datatables').dataTable();
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
                    $(target+' table').dataTable();
                }
            },
            error: function (xhr, status, dll) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
@endsection