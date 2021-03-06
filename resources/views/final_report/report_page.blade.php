<section class="invoice text-left">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-2">
            <img class="img img-responsive" src="{{ asset('images/kejati-logo.png') }}">
            </div>
            <div class="col-xs-8">
            <h2 class="page-header">
                <div class="text-center">
                    <h5 style="margin-bottom: 1px;"><b>RAHASIA</b></h5>
                    <h3 style="margin-top: 1px; margin-bottom: 1px;">KEJAKSAAN TINGGI KEPULAUAN RIAU</h3>
                <h4 style="margin-top: 1px; margin-bottom: 1px;">Jl. Sei Timun No. 1 Senggarang  Telp/Fax. (0771) 313062</h4>
                <h4 style="margin-top: 3px;">TANJUNGPINANG</h4>
                </div>
            </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-12 invoice-info">
            <small class="pull-right">Tanjungpinang : {{ $pengaduan->created_at->format('d-m-Y') }}</small>
            </div>
            <div class="col-sm-4 invoice-col">
            <b>No: TP/10/12/17</b><br>
            <br>
            <b>Hal :</b> Data Pengaduan<br>
            <b>Lamp :</b>
            <a target="_blank" data-toggle="tooltip" title="Download Lampiran : {{ $pengaduan->attachment }}" href="{{ asset($pengaduan->attachment) }}">
                    {{ $pengaduan->title_pengaduan }}
            </a><br><br>
            <h4><b><u>Data Pelapor</u></b></h4>
            <address>
                <address>
                <strong><p>Nama           : {{ $pengaduan->name }}</p></strong>
                <strong><p>NIK            : {{ $pengaduan->no_ktp }}</p></strong>
                <strong><p>Jenis Kelamin  : {{ $pengaduan->gender->gender}}</p></strong>
                <strong><p>Tanggal Lahir  : {{ $pengaduan->birth_date }} </p></strong>
                <strong><p>No. Handphone  : {{ $pengaduan->phone }}</p></strong>
                <strong><p>Email          : {{ $pengaduan->email }}</p></strong>
                <strong><p>Alamat         : {{ $pengaduan->address }}</p></strong>
                <br>
            </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
            
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-10">
            <h4><b><u>Data Pengaduan</u></b></h4><br>
        
            <h4><b>Judul Pengaduan : {{ $pengaduan->title_pengaduan }}</b></h4>
        
            {!! $pengaduan->content_pengaduan !!}
            
            <hr>
            <h4><b><u>Data Laporan Penyidikan</u></b></h4>
            <h5><b><i>Data Pembuat Laporan Penyidikan</i></b></h5>
            <address>
                <address>
                <strong><p>Nama           : {{ $pengaduan->report->user->fullName }}</p></strong>
                <strong><p>Jenis Kelamin  : {{ $pengaduan->report->user->gender->gender}}</p></strong>
                <strong><p>Email          : {{ $pengaduan->report->user->email }}</p></strong>
                <strong><p>Jabatan        : {{ $pengaduan->report->user->role->name }}</p></strong>
                <strong><p>Lampiran       : <a target="_blank" data-toggle="tooltip" title="Download Lampiran : {{ $pengaduan->attachment }}" href="{{ asset($pengaduan->report->attachment) }}">
                        {{ $pengaduan->title_pengaduan }}
                </a></p></strong>
                <br>
            </address>

            {!! $pengaduan->report->body !!}

            <hr>
            <h5><b>Kejaksaan Tinggi Tanjungpinang</b></h5>
            
            <br>
            <br>
            {{-- <h5><u><b>{{ env('PIMPINAN') }}</b></u></h5> --}}
            <h5><b>PIMPINAN</b></h5>     
        
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- this row will not appear when printing -->
            <div class="row no-print">
            <div class="col-xs-12">
                <button data-dismiss="modal" class="btn btn-default"><i class="fa fa-close"></i> Close</button>
                @if (Auth::user()->role_id == 2)
                    @if($pengaduan->report->status === 1)
                        <a href="{{ url('/user/tolak-laporan', $pengaduan->report->id ) }}" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-ban">
                            </i> Tolak Laporan
                        </a>
                        <a href="{{ url('/user/setujui-laporan', $pengaduan->report->id ) }}" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-check">
                            </i> Terima Laporan
                        </a>
                    @endif
                @endif

                @if($pengaduan->report->status === 2)
                    <a href="#" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-check">
                        </i> Laporan Diterima
                    </a>
                @endif

                @if($pengaduan->report->status === 3)
                    <a href="#" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-ban">
                        </i> Laporan Ditolak
                    </a>
                @endif
            </div>
        </section>