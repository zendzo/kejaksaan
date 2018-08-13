<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">{{ $page_title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <td>Id</td>
        <td>ID. KTP</td>
        <td>Nama Leng.</td>
        <td>Jens. Kelamin</td>
        <td>Tgl. Lahir</td>
        <td>No. Handphone</td>
        <td>Email</td>
        <td>Alamat</td>
        <td>Judul Pengaduan</td>
        <td>Isi Pengduan</td>
        <td>Status</td>
        <td>Action</td>
      </tr>
      </thead>

      <tbody>
        @foreach($data as $pengaduan)
         <tr>
          <td>{{ $pengaduan->id }}</td>
          <td>{{ $pengaduan->no_ktp }}</td>
          <td>{{ $pengaduan->name }}</td>
          <td>{{ $pengaduan->gender->gender }}</td>
          <td>{{ $pengaduan->birth_date }}</td>
          <td>{{ $pengaduan->phone }}</td>
          <td>{{ $pengaduan->email }}</td>
          <td>{{ $pengaduan->address }}</td>
          <td>{{ $pengaduan->title_pengaduan }}</td>
          <td>{!! str_limit($pengaduan->content_pengaduan,100) !!}</td>
          <td>
            @if ($pengaduan->status === 1)
              <button class="btn btn-xs btn-info">baru</button>
            @endif
            @if ($pengaduan->status === 2)
              <button class="btn btn-xs btn-success">disetujui</button>
            @endif
            @if ($pengaduan->status === 3)
              <button class="btn btn-xs btn-danger">ditolak</button>
            @endif
          </td>
            @if(Auth::user()->role_id === 1 )
                <td width="10%" class="text-center">
                <a class="btn btn-xs btn-info" href="{{ route('admin.pengaduan.show',$pengaduan->id) }}">
                  <span class="fa fa-info fa-fw"></span>
                </a>
                <a class="btn btn-xs btn-primary" href="{{ route('admin.pengaduan.edit',$pengaduan->id) }}">
                  <span class="fa fa-pencil fa-fw"></span>
                </a>
                @if(Auth::user()->role_id === 1)
                  <form method="POST" action="{{ route('admin.pengaduan.destroy',$pengaduan->id) }}" accept-charset="UTF-8" style="display:inline">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-xs btn-danger">
                    <span class="fa fa-close fa-fw"></span>
                  </button>
                </form>
                @endif
            @endif

            @if(Auth::user()->role_id !== 1 )
                <td width="10%" class="text-center">
                  <a class="btn btn-xs btn-info" href="{{ route('user.pengaduan.show',$pengaduan->id) }}">
                    <span class="fa fa-info fa-fw"></span>
                  </a>
                </td>
            @endif
         </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->