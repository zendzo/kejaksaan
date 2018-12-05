@extends('layouts.master')


@section('jsPlugins')
<script src="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>

<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}">
<!-- bootstrap datepicker -->
<script src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<script>
	  $(function () {
	    $(".textarea").wysihtml5();

      $('#datepicker').datepicker({
        format: 'dd/mm/yyyy'
      });

	  });
</script>
@endsection

@section('cssPlugins')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}">
@endsection

@section('content')
	<div class="box box-info">
      <form class="form-horizontal"  action="{{ route('search.string') }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf
	    <div class="box-header">
	      <h3 class="box-title">Cari Data Pengaduan
	        <small>Metode Pencarian String Matching</small>
	      </h3>
	      <!-- tools box -->
	      <div class="pull-right box-tools">
	        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	          <i class="fa fa-minus"></i></button>
	        <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
	          <i class="fa fa-times"></i></button>
	      </div>
	      <!-- /. tools -->
	    </div>
      <div class="box-body form-horizontal">

        <div class="form-group">
          <label for="attachment" class="col-sm-2 control-label">Pola Kata</label>

          <div class="col-sm-10">
             <input type="text" id="string" name="string" class="form-control" placeholder="Judul Pengaduan">
          </div>
        </div>

      </div>
	    <!-- box footer -->
        <div class="box-footer form-horizontal">
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
          </div>
        </div>
        <!-- / .box footer -->
        </form>
	  </div>
@endsection