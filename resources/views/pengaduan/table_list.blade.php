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
      </tr>
      </thead>

      <tbody>
        @foreach($data as $pengaduan)
         <tr>
          <td>{{ $pengaduan->id }}</td>
          <td>{{ $pengaduan->no_ktp }}</td>
          <td>{{ $pengaduan->name }}</td>
          <td>{{ $pengaduan->gender_id }}</td>
          <td>{{ $pengaduan->birth_date }}</td>
          <td>{{ $pengaduan->phone }}</td>
          <td>{{ $pengaduan->email }}</td>
          <td>{{ $pengaduan->address }}</td>
          <td>{{ $pengaduan->title_pengaduan }}</td>
          <td>{{ $pengaduan->content_pengaduan }}</td>
         </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->