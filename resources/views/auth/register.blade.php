@extends('layouts.auth_master')

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
<div class="register-box">
  <div class="login-logo">
    <a href="/"><img src="{{ asset("images/kejati-logo.png") }}" width="200px"></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
      <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <input id="first_name" name="first_name" type="text" class="form-control" value="{{ old('first_name') }}" placeholder="Nama Depan">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <input id="last_name" name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" placeholder="Nama Belakang">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }} ">
        <input id="datepicker" name="birth_date" type="text" class="form-control" value="{{ old('birth_date') }}" placeholder="Tanggal Lahir">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('birth_date'))
            <span class="help-block">
                <strong>{{ $errors->first('birth_date') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">

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

      <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">          
            <select class="form-control" name="role_id" id="gender_id">
              @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
              @endforeach
            </select>

            @if ($errors->has('gender_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender_id') }}</strong>
                </span>
            @endif
      </div>

      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <input id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection