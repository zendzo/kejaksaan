<div class="col-md-12">
        <form class="form-horizontal"  action="{{ route('user.inv-report.store') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
    <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Data Laporan Penyidikan
                <small>Detail Laporan Penyidikan : {{ $pengaduan->title_pengaduan }}</small>
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

            @if (Auth::user()->role_id != 4)
               <div class="box-body pad">
                  <input type="text" hidden name="pengaduan_id" value="{{ $pengaduan->id }}">
                  <textarea name="body" class="textarea" placeholder="Detail Laporan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>          
               </div>

                <div class="box-body form-horizontal">
                  <div class="form-group">
                     <label for="attachment" class="col-sm-2 control-label">File Lampiran</label>

                     <div class="col-sm-10">
                        <input type="file" name="attachment" class="form-control" placeholder="Judul Pengaduan">
                     </div>
                  </div>
               </div>
            @endif

            <div class="box-footer form-horizontal">
               <table class="table table-bordered">
                    <tbody>
                        <tr>
                        <th class="text-center bg-yellow" colspan="5">Laporan Penyidikan : {{ $pengaduan->title_pengaduan }}</th>
                        </tr>
                        <tr>
                           <th>#</th>
                            <th>Tanggal Upload</th>
                            <th class="text-center">Pembuat Laporan Penyidikan</th>
                            <th>Deskripsi Laporan</th>
                            <th>Lampiran</th>
                        </tr>
                        @forelse ($pengaduan->invReport as $key => $report)
                        <tr>
                           <td>{{ $key+=1 }}</td>
                            <td>{{ $report->created_at->format('d/m/Y') }}</td>
                            <td><a href="{{ url('/user/profile', $report->user->id) }}">{{ $report->user->fullName }}</a></td>
                            <td>{{ $report->body }}</td>
                            @isset($report->attachment)
                                <td><a href="{{ asset($report->attachment) }}">Download Lapmiran</a></td>
                            @endisset

                            @empty($report->attachment)
                                <td>Lampiran Tidak Tersedia</td>
                            @endempty
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5"><b>Belum Ada Laporan Penyidikan</b></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if (Auth::user()->role_id != 4)
                    <button type="submit" class="btn btn-primary">Simpan</button>
                @endif
            </div>
            <!-- / .box footer -->
            </form>
        </div>
</div>