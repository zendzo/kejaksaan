<div class="col-md-12">
        <form class="form-horizontal"  action="{{ route('user.report.store') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
    <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Data Laporan
                <small>Detail Laporan Pengaduan</small>
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
            <!-- box footer -->
            <div class="box-footer form-horizontal">
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- / .box footer -->
            </form>
        </div>
</div>