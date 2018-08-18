<li class="treeview {{ active(['user.pegawai.*','user.pengaduan.*']) }}">
<a href="#">
  <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
    <span>MASTER DATA</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
    <li class="treeview {{ active(['user.pengaduan.*']) }}">
			<a href="#">
				<i class="fa fa-book"></i>&nbsp;Data Pengaduan<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
		<ul class="treeview-menu {{ active(['user.pengaduan.*']) }}">
			<li class="{{ active('user.pengaduan.disetujui') }}">
				<a href="{{ route('user.pengaduan.disetujui') }}"><i class="fa fa-check"></i>Disetujui</a>
			</li>
		</ul>
		</li>  </ul>
</li>