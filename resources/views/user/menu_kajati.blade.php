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
			<li class="{{ active('user.pengaduan.index') }}">
				<a href="{{ route('user.pengaduan.index') }}"><i class="fa fa-arrow-right"></i>Masuk</a>
			</li>
			<li class="{{ active('user.pengaduan.disetujui') }}">
				<a href="{{ route('user.pengaduan.disetujui') }}"><i class="fa fa-check"></i>Disetujui</a>
			</li>
			<li class="{{ active('user.pengaduan.ditolak') }}">
				<a href="{{ route('user.pengaduan.ditolak') }}"><i class="fa fa-ban fa-fw"></i>Ditolak</a>
			</li>
			<li class="{{ active('user.pengaduan.disetujui.team') }}">
					<a href="{{ route('user.pengaduan.disetujui.team') }}">
						<i class="fa fa-users"></i>Pengaduan & Tim Dibentuk</a>
			</li>
			
			<li class="{{ active(['user.pengaduan.disetujui.report','user.pengaduan.disetujui.report.*']) }}">
					<a href="{{ route('user.pengaduan.disetujui.report') }}"><i class="fa fa-book"></i> Laporan Penydidikan
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu" style="">
						<li class="{{ active('user.pengaduan.disetujui.report') }}"><a href="{{ route('user.pengaduan.disetujui.report') }}">
							<i class="fa fa-arrow-right {{ active('user.pengaduan.disetujui.report') }}"></i> Laporan Masuk</a></li>
						<li class="{{ active('user.pengaduan.disetujui.report.*') }}">
							<a href="#"><i class="fa fa-circle-o text-aqua"></i> Status Laporan
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="{{ active('user.pengaduan.disetujui.report.approved') }}">
									<a href="{{ route('user.pengaduan.disetujui.report.approved') }}"><i class="fa fa-check"></i> Laporan Disetujui</a>
								</li>
								<li class="{{ active('user.pengaduan.disetujui.report.rejected') }}">
									<a href="{{ route('user.pengaduan.disetujui.report.rejected') }}"><i class="fa fa-ban"></i> Laporan Ditolak</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				
		</ul>
		</li>
	</ul>
</li>