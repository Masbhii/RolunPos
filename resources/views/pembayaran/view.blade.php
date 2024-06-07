<x-app-layout>
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">

                <!-- <div class="col-md-12"> -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h5 class="card-title fw-semibold mb-4">Status Pembayaran</h5>
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
                                                    <th>Tgl Bayar</th>
                                                    <th>Barang</th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tgl Bayar</th>
                                                    <th>Barang</th>
                                                    <th>Bukti Bayar</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach ($statuspembayaran as $p)
                                                <tr>
                                                    <td>{{ $p->no_transaksi }}</td>
                                                    <td>{{ $p->tgl_bayar }}</td>
                                                    <td>{{ $p->list_barang }}</td>
                                                    <td>
                                                        <a data-fancybox="gallery" href="{{url('konfirmasi')}}/{{$p->bukti_bayar}}">
                                                            <img src="{{url('konfirmasi')}}/{{$p->bukti_bayar}}" width="150px" height="150px">
                                                        </a>
                                                        
                                                    </td>
                                                    <td>Rp {{ number_format($p->total_harga) }}</td>
                                                    <td>{{ $p->status }}</td>
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