@extends('layouts.master')

@section('jsPlugins')
<script>
  function printPage() {
    window.print();
  }
</script>
@endsection

@section('content')
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             <img style="height: 50px;" src="{{ asset('images/kejati-logo.png') }}" alt="">
             <small class="pull-right">Tanjungpinang : {{ $pengaduan->created_at->format('d-m-Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <b>No: TP/10/12/17</b><br>
          <br>
          <b>Hal :</b> Data Pengaduan<br>
          <b>Lamp :</b> -<br><br>
          <h4><b><u>Data Pelapor</u></b></h4>
          <address>
            <address>
            <strong><p>Nama           : {{ $pengaduan->name }}</p></strong>
            <strong><p>NIK            : {{ $pengaduan->no_ktp }}</p></strong>
            <strong><p>Jenis Kelamin  : </p></strong>
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
            <button onclick="printPage()" href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            @if($pengaduan->status === 1)
                <a href="{{ url('/', $pengaduan->id ) }}" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-ban"></i> Tolak Permohonan
                </a>
                <a href="{{ url('/', $pengaduan->id ) }}" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Terima Permohonan
                </a>
            @endif

          </div>
        </div>
    </section>
@endsection