<li class="treeview {{ active(['user.pengaduan.*']) }}">
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
                <li class="{{ active('user.pengaduan.disetujui.team') }}">
                    <a href="{{ route('user.pengaduan.disetujui.team') }}"><i class="fa fa-check"></i>Disetujui & Dibentuk Tim</a>
                </li>
            </ul>
        </li>
    </ul>
</li>