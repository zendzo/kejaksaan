  <!-- /.tab-pane -->
<div class="tab-pane" id="store">
@if (!empty($user->store))
<form class="form-horizontal"  action="{{ route('user.store.update',$user->store->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('PATCH') }}

              <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <label for="nama" class="col-sm-2 control-label">Nama </label>

                <div class="col-sm-10">
                  <input id="nama" name="nama" type="text" class="form-control" placeholder="Name" value="{{ $user->store->nama }}" required>

                  @if ($errors->has('nama'))
                      <span class="help-block">
                          <strong>{{ $errors->first('nama') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label for="alamat" class="col-sm-2 control-label">Alamat </label>

                <div class="col-sm-10">
                  <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{ $user->store->alamat }}" required>

                  @if ($errors->has('alamat'))
                      <span class="help-block">
                          <strong>{{ $errors->first('alamat') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
                <label for="npwp" class="col-sm-2 control-label">NPWP</label>

                <div class="col-sm-10">
                  <input id="npwp" name="npwp" type="text" class="form-control" placeholder="NPWP" value="{{ $user->store->npwp }}" required>

                  @if ($errors->has('npwp'))
                      <span class="help-block">
                          <strong>{{ $errors->first('npwp') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="status" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-10">
                  <select class="form-control" name="status" id="status">
                    <option value="1">Aktif</option>
                    <option value="0">Inaktif</option>
                  </select>

                  @if ($errors->has('status'))
                      <span class="help-block">
                          <strong>{{ $errors->first('status') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                <label for="status" class="col-sm-2 control-label">Keterangan</label>

                <div class="col-sm-10">
                  <input id="keterangan" name="keterangan" type="text" class="form-control" placeholder="Keterangan" value="{{ $user->store->keterangan }}" required>
                  <input name="user_id" type="text" hidden value="{{ $user->store->user_id }}">

                  @if ($errors->has('keterangan'))
                      <span class="help-block">
                          <strong>{{ $errors->first('keterangan') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              @if (Auth::id() === $user->store->user_id or Auth::user()->role_id === 1)
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
              @endif
</form>
@else
<form class="form-horizontal"  action="{{ route('user.store.store') }}" method="POST">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
  <label for="nama" class="col-sm-2 control-label">Nama </label>

  <div class="col-sm-10">
    <input id="nama" name="nama" type="text" class="form-control" placeholder="Name" required>

    @if ($errors->has('nama'))
        <span class="help-block">
            <strong>{{ $errors->first('nama') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
  <label for="alamat" class="col-sm-2 control-label">Alamat </label>

  <div class="col-sm-10">
    <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Alamat" required>

    @if ($errors->has('alamat'))
        <span class="help-block">
            <strong>{{ $errors->first('alamat') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('npwp') ? ' has-error' : '' }}">
  <label for="npwp" class="col-sm-2 control-label">NPWP</label>

  <div class="col-sm-10">
    <input id="npwp" name="npwp" type="text" class="form-control" placeholder="NPWP" required>

    @if ($errors->has('npwp'))
        <span class="help-block">
            <strong>{{ $errors->first('npwp') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
  <label for="status" class="col-sm-2 control-label">Status</label>

  <div class="col-sm-10">
    <select class="form-control" name="status" id="status">
      <option value="1">Aktif</option>
      <option value="0">Inaktif</option>
    </select>

    @if ($errors->has('status'))
        <span class="help-block">
            <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
  <label for="status" class="col-sm-2 control-label">Keterangan</label>

  <div class="col-sm-10">
    <input id="keterangan" name="keterangan" type="text" class="form-control" placeholder="Keterangan" required>
    <input name="user_id" type="text" hidden value="{{ Auth::id() }}">

    @if ($errors->has('keterangan'))
        <span class="help-block">
            <strong>{{ $errors->first('keterangan') }}</strong>
        </span>
    @endif
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
  </div>
</div>
</form>
@endif
</div>
<!-- /.tab-pane -->