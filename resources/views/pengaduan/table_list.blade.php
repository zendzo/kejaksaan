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
          <td>
            @if($pengaduan->attachment)
          <a target="_blank" data-toggle="tooltip" title="Download Lampiran : {{ $pengaduan->attachment }}" href="{{ asset($pengaduan->attachment) }}">
                {{ $pengaduan->title_pengaduan }}
              </a>
            @else
              {{ $pengaduan->title_pengaduan }}
            @endif
          </td>
          <td>{!! str_limit($pengaduan->content_pengaduan,100) !!}</td>
          <td>
            @if ($pengaduan->status === 1)
              <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#pengaduanModal-{{$pengaduan->id}}">baru</button>
            @endif
            @if ($pengaduan->status === 2)
              <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#pengaduanModal-{{$pengaduan->id}}">disetujui</button>
            @endif
            @if ($pengaduan->status === 3)
              <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#pengaduanModal-{{$pengaduan->id}}">ditolak</button>
            @endif
            <!-- Modal show pengaduan document -->
            <div class="modal fade" id="pengaduanModal-{{$pengaduan->id}}" tabindex="-1" role="dialog" aria-labelledby="pengaduanModal-{{$pengaduan->id}}">
              @include('pengaduan.page_pengaduan')
            </div>
          </td>

          {{-- if user role_id == 1 show edit destory and detail --}}
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
              </td>
            @endif

            {{-- if users role_id == 2 show comment and approval button--}}
            @if(Auth::user()->role_id !== 1 && Auth::user()->role_id === 2 )
              <td width="10%" class="text-center">
                <a class="btn btn-xs btn-info" href="{{ route('user.pengaduan.show',$pengaduan->id) }}">
                  <span class="fa fa-info fa-fw"></span>
                </a>

                @include('comment.comment_button')

                @if(Request::segment(2) === 'pengaduan-disetujui-team')
                  @include('team.team_button')
                @endif

                @if(Request::segment(2) === 'pengaduan-disetujui-report' or Request::segment(2) === 'pengaduan-disetujui-report-disetujui' or Request::segment(2) === 'pengaduan-disetujui-report-ditolak')
                  @include('final_report.report_button')
                @endif

              </td>
            @endif

          {{-- if user role_id == 3 show comment and team maker modal --}}
          @if(Auth::user()->role_id !== 1 && Auth::user()->role_id === 3)
            <td class="text-center">
              <a class="btn btn-xs btn-info" href="{{ route('user.pengaduan.show',$pengaduan->id) }}">
                  <span class="fa fa-info fa-fw"></span>
              </a>

              @include('team.team_button')
              
              @include('comment.comment_button')
            </td>
          @endif

          {{-- if user role_id == 4 show comment and team maker modal --}}
          @if(Auth::user()->role_id !== 1 && Auth::user()->role_id === 4)
            <td class="text-center">
              <a class="btn btn-xs btn-info" href="{{ route('user.pengaduan.show',$pengaduan->id) }}">
                  <span class="fa fa-info fa-fw"></span>
              </a>

              @include('team.team_button')
              
              @include('comment.comment_button')

              @include('final_report.report_button')
              
            </td>
          @endif

          {{-- if user role_id == 5 show comment and investigation report modal --}}
          @if(Auth::user()->role_id !== 1 && Auth::user()->role_id === 5)
            <td class="text-center">
              <a class="btn btn-xs btn-info" href="{{ route('user.pengaduan.show',$pengaduan->id) }}">
                  <span class="fa fa-info fa-fw"></span>
              </a>
              
              @include('comment.comment_button')

              @include('final_report.report_button')
              
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