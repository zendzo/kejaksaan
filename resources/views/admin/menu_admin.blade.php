<li class="treeview {{ active(['admin.role.*']) }}">
<a href="#"><i class="fa fa-viacoin fa-flip-vertical fa-fw"></i><span>&nbsp;Admin Menu</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
</a>
<ul class="treeview-menu">
    <li class="{{ active('admin.role.*') }}">
        <a href="{{ route('admin.role.index') }}"><i class="fa fa-key fa-fw"></i>Peran</a>
    </li>
</ul>
</li>