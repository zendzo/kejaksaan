<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title"><b>Buat Team Penyidik</b></h3>
            </div>
            <!-- /.box-header --> 
        <div class="box-body">
            <form class="form-horizontal"  action="{{ route('user.comment.pengaduan') }}" method="POST">
            {{ csrf_field() }}
    
            <div class="box-body no-padding">
                <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                    </tr>
                    @forelse ($team as $penyidik)
                    <tr>
                        <td>
                            <input class="form-group" type="checkbox" name="team-{{ $penyidik->id }}">
                        </td>
                        <td>{{ $penyidik->fullName }}</td>
                        <td><span class="badge bg-green">{{ $penyidik->role->name }}</span></td>
                        <td>{{ $penyidik->gender->gender }}</td>
                        <td>{{ $penyidik->email }}</td>
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
            <div class="col-md-12">
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-user-plus"></i> Bentuk Team</button>
            </div>
            </form>
        </div>           
        </div>
            <!-- /.box -->
            <!-- form start -->
    </div>