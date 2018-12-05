@extends('layouts.master')

@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="fa fa-text-width"></i>

            <h3 class="box-title">Hasil Pencarian Untuk Kalimat : <b>{{ $pattern }}</b></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            @foreach ($strings as $string)
              <p class="lead text-{{ $string["found"] ? 'light-blue' : 'red' }}">
                {{ $string["id"] }}. {{ $string["result"] }} <a class="btn btn-xs btn-warning" href="{{ route('admin.pengaduan.show',$string["id"]) }}"><i class="fa fa-eye"></i></a>
              </p>
            @endforeach
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
 </div>
@endsection