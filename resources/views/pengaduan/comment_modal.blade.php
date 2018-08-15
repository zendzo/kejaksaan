<div class="row">
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
                        </tr>
                        @forelse ($pengaduan->comments as $comment)
                        <tr>
                            <td>{{ $comment->body }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td><b>Belum Ada Komentar</b></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
<hr>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <div class="col-sm-12">
                        <textarea name="body" class="form-control" required=""></textarea>
                        <input name="pengaduan_id" type="text" hidden value="{{ $pengaduan->id }}">

                    @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
                </form>
            </div>           
            </div>
            <!-- /.box -->
            <!-- form start -->
    </div>
</div>