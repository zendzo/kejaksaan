<li class="treeview {{ active(['admin.pegawai.*','admin.pengaduan.*','search.*']) }}">
<a href="#">
  <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
    <span>MASTER DATA</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.pegawai.*') }}">
    	<a href="{{ route('admin.pegawai.index') }}"><i class="fa fa-user fa-fw"></i>Data (Pegawai)</a>
    </li>
    <li class="treeview {{ active(['admin.pengaduan.*','search.*']) }}">
			<a href="#">
				<i class="fa fa-book"></i>&nbsp;Data Pengaduan<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
		<ul class="treeview-menu {{ active(['admin.pengaduan.*','search.*']) }}">
			<li class="{{ active('admin.pengaduan.create') }}">
				<a href="{{ route('admin.pengaduan.create') }}"><i class="fa  fa-clipboard"></i>Input Pengaduan</a>
			</li>
			<li class="{{ active('search.*') }}">
					<a href="{{ route('search.index') }}"><i class="fa  fa-search"></i>Cari Pengaduan</a>
				</li>
			<li class="{{ active('admin.pengaduan.index') }}">
				<a href="{{ route('admin.pengaduan.index') }}"><i class="fa fa-arrow-right"></i>Masuk</a>
			</li>
			<li class="{{ active('admin.pengaduan.disetujui') }}">
				<a href="{{ route('admin.pengaduan.disetujui') }}"><i class="fa fa-check"></i>Disetujui</a>
			</li>
			<li class="{{ active('admin.pengaduan.ditolak') }}">
				<a href="{{ route('admin.pengaduan.ditolak') }}"><i class="fa fa-ban fa-fw"></i>Ditolak</a>
			</li>
		</ul>
		</li>  </ul>
</li>