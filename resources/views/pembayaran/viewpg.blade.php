<x-app-layout>
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">

                <!-- <div class="col-md-12"> -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h5 class="card-title fw-semibold mb-4">Status Pembayaran Payment Gateway</h5>
                </div>
                
                <!-- Awal Status -->
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                        <div class="card-body p-12">
                                <!-- Awal Dari Tabel -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tgl Transaksi</th>
                                                    <th>Tgl Expired</th>
                                                    <th>Tgl Bayar</th>
                                                    <th>Total Harga</th>
                                                    <th>Kode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tgl Transaksi</th>
                                                    <th>Tgl Expired</th>
                                                    <th>Tgl Bayar</th>
                                                    <th>Total Harga</th>
                                                    <th>Kode</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($statuspembayaran as $p)
                                                    <tr>
                                                        <td>{{ $p->no_transaksi }}</td>
                                                        <td>{{ $p->tgl_transaksi }}</td>
                                                        <td>{{ $p->tgl_expired }}</td>
                                                        <td>{{ $p->settlement_time }}</td>
                                                        <td style="text-align:right">{{ rupiah($p->total_harga) }}</td>
                                                        <td>{{ $p->status_code }}</td>
                                                        <td>{{ $p->transaction_status }}</td>
                                                        
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                </div>
                                <!-- Akhir Dari Tabel -->
                        </div>
                        </div>
                    </div>
                <!-- Akhir Status -->

              </div>
            </div>
          </div>
        </div>
</x-app-layout>