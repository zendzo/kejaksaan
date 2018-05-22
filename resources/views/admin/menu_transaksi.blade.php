<li class="treeview {{ active(['admin.transaksi.*','admin.proses.transaksi.*']) }}">
<a href="#">
  <i class="fa fa-barcode fa-fw" aria-hidden="true"></i>
    <span>TRANSAKSI</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
		<li class="treeview {{ active(['admin.transaksi.pembelian','admin/proses-transaksi-pembelian/*']) }}">
				<a href="#">
					<i class="fa fa-circle-o text-aqua"></i>&nbsp;Pembelian<span class="pull-right-container"><i class="fa fa-mail-forward fa-rotate-90 fa-fw"></i></span>
				</a>
			<ul class="treeview-menu ">
				<li class="{{ active(['admin.proses.transaksi.pembelian']) }}">
					<a href="{{ route('admin.transaksi.pembelian') }}">
					<i class="fa fa-arrow-circle-left"></i>Transaksi</a>
				</li>
			</ul>
		</li>
		<li class="treeview {{ active(['admin.transaksi.penjualan','admin/proses-transaksi-penjualan/*']) }}">
				<a href="#">
					<i class="fa fa-circle-o text-yellow"></i>&nbsp;Penjualan<span class="pull-right-container"><i class="fa fa-mail-reply fa-rotate-90 fa-fw"></i></span>
				</a>
			<ul class="treeview-menu ">
				<li class="{{ active(['admin.proses.transaksi.penjualan']) }}">
					<a href="{{ route('admin.transaksi.penjualan') }}">
					<i class="fa fa-arrow-circle-right"></i>Transaksi</a>
				</li>
			</ul>
		</li>
  </ul>
</li>