@extends('layouts.master')

@section('cssPlugins')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}">
@endsection

@section('jsPlugins')

<!-- bootstrap datepicker -->
<script src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<script>
  $('#datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
</script>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <!-- /.box-header --> 
          <div class="box-body">
            <form class="form-horizontal"  action="{{ route('admin.pegawai.store') }}" method="POST">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-sm-2 control-label">Nama Depan</label>

                <div class="col-sm-10">
                  <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Nama Depan" value="{{ old('first_name') }}">

                  @if ($errors->has('first_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-sm-2 control-label">Nama Belakang</label>

                <div class="col-sm-10">
                 <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Nama  Belakang" value="{{ old('last_name') }}">

                  @if ($errors->has('last_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                 <input id="email" name="email" type="text" class="form-control" placeholder="email" value="{{ old('email') }}">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }} ">
                <label for="email" class="col-sm-2 control-label">Tgl. Lahir</label>

                <div class="col-sm-10">
                  <input id="datepicker" name="birth_date" type="text" class="form-control" value="{{ old('birth_date') }}" placeholder="Tanggal Lahir">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>

                  @if ($errors->has('birth_date'))
                      <span class="help-block">
                          <strong>{{ $errors->first('birth_date') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">Jenis Kelamin</label>
                  
                  <div class="col-sm-10">
                    <select class="form-control" name="gender_id" id="gender_id">
                      <option value="1">Laki-Laki</option>  
                      <option value="2">Perempuan</option>
                    </select>

                    @if ($errors->has('gender_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender_id') }}</strong>
                        </span>
                    @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-sm-2 control-label">Phone</label>

                <div class="col-sm-10">
                 <input id="phone" name="phone" type="text" class="form-control" placeholder="phone" value="{{ old('phone') }}">

                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">password</label>

                <div class="col-sm-10">
                 <input id="password" name="password" type="password" class="form-control" placeholder="password">

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password-confirmation" class="col-sm-2 control-label">password</label>

                <div class="col-sm-10">
                 <input id="password-confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Retype password">

                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                </div>
              </div>
            </form>
          </div>           
          </div>
          <!-- /.box -->
          <!-- form start -->

  </div>
</div>
@endsection