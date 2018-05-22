<li class="treeview {{ active(['admin.konfirmasi.pembelian']) }}">
<a href="#">
  <i class="fa fa-smile-o fa-fw" aria-hidden="true"></i>
    <span>PELANGGAN</span>
  <i class="fa fa-angle-left pull-right"></i>
</a>
  <ul class="treeview-menu ">
    <li class="{{ active(['admin.konfirmasi.pembelian']) }}"><a href="{{ route('admin.konfirmasi.pembelian') }}"><i class="fa fa-check"></i>Konfirmasi Pesanan</a></li>
    {{-- <li><a href="#"><i class="fa fa-credit-card"></i>Konfirmasi Pembayaran</a></li> --}}
    {{-- <li><a href="#"><i class="fa fa-thumbs-o-up"></i>Persetujuan</a></li> --}}
  </ul>
</li>