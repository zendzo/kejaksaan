<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
            <h3 class="box-title"><b>Buat Team Penyidik</b></h3>
            </div>
            <!-- /.box-header --> 
        <div class="box-body">
            <form class="form-horizontal"  action="{{ route('user.team.pengaduan') }}" method="POST">
            {{ csrf_field() }}

            <div class="box-body no-padding">
                    <table class="table table-bordered">
                    <tbody>
                        <tr>
                        <th class="text-center bg-red" colspan="5">
                            Nama Penyidik Terdaftar Untuk {{ $pengaduan->title_pengaduan }}
                        </th>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                        </tr>
                        @forelse ($pengaduan->team as $penyidik)
                        <tr>
                            <td>{{ $penyidik->fullName }}</td>
                            <td><span class="badge bg-green">{{ $penyidik->role->name }}</span></td>
                            <td>{{ $penyidik->gender->gender }}</td>
                            <td>{{ $penyidik->email }}</td>
                        </tr>
                        @empty
                            <tr>
                            <td colspan="4"><b>Belum Ada Penyidik Untuk {{ $pengaduan->title_pengaduan}}</b></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
    <hr>
    
            <div class="box-body no-padding">
                <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="text-center bg-yellow" colspan="5">Nama Penyidik Dalam Sistem</th>
                    </tr>
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
                            <input class="form-group" type="checkbox" value="{{ $penyidik->id }}" name="team[]">
                        </td>
                        <td>{{ $penyidik->fullName }}</td>
                        <td><span class="badge bg-green">{{ $penyidik->role->name }}</span></td>
                        <td>{{ $penyidik->gender->gender }}</td>
                        <td>{{ $penyidik->email }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5"><b>Belum Ada Penyidik Dalam Sistem</b></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
            <hr>
            <div class="col-md-12">
                <input hidden name="pengaduan_id" type="text" value="{{ $pengaduan->id }}">
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-user-plus"></i> Bentuk Team</button>
            </div>
            </form>
        </div>           
        </div>
            <!-- /.box -->
            <!-- form start -->
    </div>