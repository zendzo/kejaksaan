<div class="active tab-pane" id="activity">
  <table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
  <th>Kode Nota</th>
  <th>Tanggal Penjualan</th>
  <th>Tanggal Pengiriman</th>
  <th>Tipe Penjualan</th>
  <th>Dari Gudang</th>
  <th>Layanan Angkutan</th>
  <th>Total</th>
  <th>Pembayaran</th>
  <th>Sisa Pembayaran</th>
</tr>
</thead>

<tbody>
@forelse ($user->penjualan as $sale)
  <tr>
      <td>{{ $sale->kode }}</td>
      <td>{{ $sale->tanggal_so->format('d/m/Y') }}</td>
      <td>{{ $sale->tanggal_kirim->format('d/m/Y') }}</td>
      <td>{{ $sale->type->type }}</td>
      <td>{{ $sale->gudang->nama }}</td>
      {{-- <td>{{ $sale->vendor->nama }}</td> --}}
      <td>{{ $sale->sales->sum('total') }}</td>
      <td>{{ $sale->bayar }}</td>
      <td>{{ $sale->sales->sum('total') - $sale->bayar }}</td>
   </tr>
@empty
  <tr>
    <td colspan="9"><h4 class="text-center">Belum Ada Data</h4></td>
  </tr>
@endforelse
</tbody>
</table>
</div>
