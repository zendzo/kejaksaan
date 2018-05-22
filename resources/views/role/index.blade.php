@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <img style="height: 50px;" src="{{ asset('AdminLTE/dist/img/BNI.png') }}">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if(!is_null($roles))
                    @foreach($roles as $role)
                     <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                          <a class="btn btn-success bnt-xs" href="{{ route('admin.role.edit',$role->id) }}">
                            <span class="fa fa-edit fa-fw"></span>
                          </a>
                          <form action="{{ route('admin.role.destroy',$role->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger bnt-xs">
                              <span class="fa fa-trash fa-fw"></span>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a class="btn btn-success" href="{{ route('admin.role.create')}}"><span class="fa fa-plus fa-fw"></span>&nbsp;Tambah Baru</a>   
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection