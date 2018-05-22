<li class="treeview {{ active(['admin.pembelian.*','admin.pembayaran.pembelian','admin.revisi.pembelian.completed']) }}">
<a href="#">
  <i class="fa fa-truck fa-fw" aria-hidden="true"></i>
    <span>NOTA PEMBELIAN</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.pembelian.index') }}">
    	<a href="{{ route('admin.pembelian.index') }}"><i class="fa fa-shopping-cart"></i>Pembelian</a>
    </li>
    <li class="{{ active('admin.pembayaran.pembelian') }}">
    	<a href="{{ route('admin.pembayaran.pembelian') }}"><i class="fa fa-credit-card"></i>Pembayaran</a>
    </li>
    <li class="{{ active(['admin.revisi.pembelian.completed']) }}">
    	<a href="{{ route('admin.revisi.pembelian.completed') }}"><i class="fa fa-code-fork fa-rotate-180 fa-fw"></i>Revisi</a>
    </li>
  </ul>
</li>