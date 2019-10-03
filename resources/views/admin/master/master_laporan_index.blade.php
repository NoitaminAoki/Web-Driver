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
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <form action="" method="get">
                                <label for="startDate">Date :</label>
                                <br>
                                <input name="date" id="startDate" class="date-picker" value="{{Date('F Y')}}" readonly/>
                                <button class="btn btn-primary btn-sm">Show</button>
                            </form>
                        </div>
                        @for ($i = 1; $i < 31; $i++)
                        @php
                        $random = rand(0,1);
                        @endphp
                        @if ($random)
                        <div class="col-md-2 border bg-success" style="min-height: 40px;">{{$i}} <i class="fas fa-check"></i></div>
                        @else
                        <div class="col-md-2 border bg-danger" style="min-height: 40px;">{{$i}} <i class="fas fa-times"></i></div>
                        @endif
                        @endfor
                    </div>
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
        $('.date-picker').datepicker(
        {
            dateFormat: "MM yy",
            monthNamesShort: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
            monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onClose: function(dateText, inst) {
                
                
                function isDonePressed(){
                    return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                }
                
                if (isDonePressed()){
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');
                    
                    $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
                }
            },
            beforeShow : function(input, inst) {
                
                inst.dpDiv.addClass('month_year_datepicker')
                
                if ((datestr = $(this).val()).length > 0) {
                    year = datestr.substring(datestr.length-4, datestr.length);
                    month = datestr.substring(0, 2);
                    $(this).datepicker('option', 'defaultDate', new Date(year, month-1, 1));
                    $(this).datepicker('setDate', new Date(year, month-1, 1));
                    $(".ui-datepicker-calendar").hide();
                }
            }
        })
    });
</script>
@endsection