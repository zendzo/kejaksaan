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
<div class="row">
  <!-- left column -->
  <div class="col-md-12">

    <!-- general form elements -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pelapor</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal"  action="{{ route('admin.pengaduan.store') }}" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}

        <div class="box-body">
          <div class="form-group{{ $errors->has('no_ktp') ? ' has-error' : '' }}">
            <label for="no_ktp" class="col-sm-2 control-label">No. KTP</label>

            <div class="col-sm-10">
              <input name="no_ktp" class="form-control" placeholder="NIK KTP" value="{{ old('no_ktp') }}">
              @if ($errors->has('no_ktp'))
                <span class="help-block">
                    <strong>{{ $errors->first('no_ktp') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}">
              @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
            <label for="gender_id" class="col-sm-2 control-label">Jenis Kelamin</label>

            <div class="col-sm-10">
              <select name="gender_id" id="gender_id" class="form-control">
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
            <label for="birth_date" class="col-sm-2 control-label">Tgl. Lahir</label>

            <div class="col-sm-10">
              <input name="birth_date" type="text" class="form-control pull-right" id="datepicker" required="" placeholder="{{ Date('m/d/Y') }}" value="{{ old('birth_date') }}">
              @if ($errors->has('birth_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <label for="phone" class="col-sm-2 control-label">No. Hp</label>

            <div class="col-sm-10">
              <input name="phone" class="form-control" placeholder="0812xxxxxxxx" value="{{ old('phone') }}">
              @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input name="email" class="form-control" placeholder="example@mail.com" value="{{ old('email') }}">
              @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="address" class="col-sm-2 control-label">Alamat</label>

            <div class="col-sm-10">
              <textarea name="address" class="form-control" placeholder="Jl.DI Panjaitan, Tanjungpinang">{{old('address')}}</textarea>
              @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
            </div>
          </div>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!--/.col (left) -->
  <!-- right column -->
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pengaduan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

        <div class="box-body form-horizontal">

          <div class="form-group{{ $errors->has('title_pengaduan') ? ' has-error' : '' }}">
            <label for="title_pengaduan" class="col-sm-2 control-label">Judul Pengaduan</label>

            <div class="col-sm-10">
               <input name="title_pengaduan" class="form-control" placeholder="Judul Pengaduan" value="{{ old('title_pengaduan') }}">
               @if ($errors->has('title_pengaduan'))
                <span class="help-block">
                    <strong>{{ $errors->first('title_pengaduan') }}</strong>
                </span>
            @endif
            </div>
          </div>

        </div>
        <!-- /.box-body -->

    </div>

    <!-- /.box -->
  </div>
  <!--/.col (right) -->
</div>

	<div class="box box-info">
	    <div class="box-header">
	      <h3 class="box-title">Data Pengaduan
	        <small>Detail Data Pengaduan</small>
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
	    <!-- /.box-header -->
	    <div class="box-body pad">
        <div class="form-group{{ $errors->has('content_pengaduan') ? ' has-error' : '' }}">
            <textarea name="content_pengaduan" class="textarea" placeholder="Detail Pengaduan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>          
            @if ($errors->has('content_pengaduan'))
                <span class="help-block">
                    <strong>{{ $errors->first('content_pengaduan') }}</strong>
                </span>
            @endif
          </div>
      </div>
      <div class="box-body form-horizontal">

        <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}">
          <label for="attachment" class="col-sm-2 control-label">File Lampiran</label>

          <div class="col-sm-10">
             <input type="file" name="attachment" class="form-control" placeholder="Judul Pengaduan">
             @if ($errors->has('attachment'))
                <span class="help-block">
                    <strong>{{ $errors->first('attachment') }}</strong>
                </span>
            @endif
          </div>
        </div>

      </div>
	    <!-- box footer -->
        <div class="box-footer form-horizontal">
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        <!-- / .box footer -->
        </form>
	  </div>
@endsection