<li class="treeview {{ active(['admin.pegawai.*']) }}">
<a href="#">
  <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
    <span>MASTER DATA</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.pegawai.*') }}">
    	<a href="{{ route('admin.pegawai.index') }}"><i class="fa fa-user fa-fw"></i>Data (Pegawai)</a>
    </li>
  </ul>
</li>