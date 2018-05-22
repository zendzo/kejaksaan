<li class="treeview {{ active(['admin.pengguna.*','admin.product.*','admin.product-type.*','admin.supplier.*','admin.warehouse.*','admin.truck.*','admin.vendor.*','admin.store.*']) }}">
<a href="#">
  <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
    <span>MASTER DATA</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu">
    <li class="{{ active('admin.pengguna.*') }}">
    	<a href="{{ route('admin.pengguna.index') }}"><i class="fa fa-user fa-fw"></i>Pelanggan (Pengguna)</a>
    </li>
    <li class="{{ active('admin.store.*') }}">
        <a href="{{ route('admin.store.index') }}"><i class="fa fa-umbrella fa-fw"></i>Toko</a>
    </li>
    <li class="{{ active('admin.supplier.*') }}">
    	<a href="{{ route('admin.supplier.index') }}"><i class="fa fa-building-o fa-fw"></i>Supplier</a>
    </li>
		<li class="treeview {{ active(['admin.product.*','admin.product-type.*']) }}">
			<a href="#">
				<i class="fa fa-cubes fa-fw"></i>&nbsp;Produk<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
		<ul class="treeview-menu {{ active(['admin.pengguna.*','admin.product-type.*']) }}">
			<li class="{{ active('admin.product.*') }}">
				<a href="{{ route('admin.product.index') }}"><i class="fa fa-cubes fa-fw"></i>Produk</a>
			</li>
			<li class="{{ active('admin.product-type.*') }}">
				<a href="{{ route('admin.product-type.index') }}"><i class="fa fa-cube fa-fw"></i>Tipe Produk</a>
			</li>
		</ul>
		</li>
    <li class="{{ active('admin.warehouse.*') }}">
    	<a href="{{ route('admin.warehouse.index') }}"><i class="fa fa-hospital-o"></i>Gudang</a>
    </li>
    {{-- <li class="{{ active('admin.truck.*') }}">
    	<a href="{{ route('admin.truck.index') }}"><i class="fa fa-truck fa-flip-horizontal fa-fw"></i>Truck</a>
    </li> --}}

    {{-- <li class="treeview {{ active(['admin.vendor.*']) }}">
			<a href="#">
				<i class="fa fa-vine"></i>&nbsp;Vendor<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
		<ul class="treeview-menu">
			<li class="{{ active('admin.vendor.*') }}">
				<a href="{{ route('admin.vendor.index') }}"><i class="fa fa-ge fa-fw"></i>Angkutan</a>
			</li>
		</ul>
	</li> --}}
  </ul>
</li>