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
                                    <th>Tanggal Registrasi</th>
                                    <th>List Laporan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($driver as $item)
                                <tr>
                                    <td><a href="pages/examples/invoice.html">{{$item->no_pol}}</a></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y')}}</td>
                                    <td>
                                        <ul>
                                            @php
                                            $int_row = 0;
                                            @endphp
                                            @foreach ($item->item as $subitem)
                                            @php
                                                $int_row += $subitem->total;
                                            @endphp
                                            <li>{{$subitem->tanggal.': '.$subitem->total}}</li>
                                            @endforeach
                                            <li>{{'Total: '.$int_row}}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm btn-print" data-id="{{$item->id}}" data-toggle="modal" data-target="#modal-print"><i class="fa fa-print"></i> Print</button>
                                    </td>
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
</section>
<div class="modal fade" id="modal-print">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Print</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:void(0)" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <input class="form-control" type="date" name="date" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Print</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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
<script>
    $(document).ready(function() {
        $('.datatables').dataTable({
            "order": [[ 2, "asc" ]]
        });
    });
    $('.btn-print').on('click', function () {
        var id = $(this).data('id');
        var route = '{{ route("admin.driver.laporan.pdf") }}/'+id;
        $('#modal-print').find('form').attr('action', route);
    })
</script>
@endsection