<li class="treeview  {{ active(['admin.penjualan.*','admin.pembayaran.penjualan','admin.revisi.penjualan.completed']) }}">
<a href="#">
  <i class="fa fa-cart-arrow-down fa-fw" aria-hidden="true"></i>
    <span>NOTA PENJUALAN</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.penjualan.index') }}">
    	<a href="{{ route('admin.penjualan.index') }}"><i class="fa fa-shopping-cart"></i>Penjualan</a>
    </li>
    <li class="{{ active('admin.pembayaran.penjualan') }}">
    	<a href="{{ route('admin.pembayaran.penjualan') }}"><i class="fa fa-credit-card"></i>Pembayaran</a>
    </li>
    <li class="{{ active(['admin.revisi.penjualan.completed']) }}">
    	<a href="{{ route('admin.revisi.penjualan.completed') }}"><i class="fa fa-code-fork fa-rotate-180 fa-fw"></i>Revisi</a>
    </li>
  </ul>
</li>