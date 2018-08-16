<div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Tulis Komentar Untuk Pengaduan : {{ $pengaduan->title_pengaduan }}</h3>
        </div>
        <!-- /.box-header --> 
    <div class="box-body">
        <form class="form-horizontal"  action="{{ route('user.comment.pengaduan') }}" method="POST">
        {{ csrf_field() }}

        <div class="box-body no-padding">
            <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Komentar</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                </tr>
                @forelse ($pengaduan->comments as $comment)
                <tr>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->user->fullName }}</td>
                    <td><span class="badge bg-green">{{ $comment->user->role->name }}</span></td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3"><b>Belum Ada Komentar</b></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
<hr>
        <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }} input-group-lg">
            <input name="body" type="text" class="form-control" required>
            <input name="pengaduan_id" type="text" hidden value="{{ $pengaduan->id }}">

            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-send-o"></i> Post</button>
                </span>
        </div>
        </form>
    </div>           
    </div>
        <!-- /.box -->
        <!-- form start -->
</div>