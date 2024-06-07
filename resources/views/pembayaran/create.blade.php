<x-app-layout>
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Konfirmasi Pembayaran</h5>

                <!-- Display Error jika ada error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Akhir Display Error -->

                <!-- dapatkan nomor transaksi dan total tagihan -->
                <?php 
                        $no_transaksi = '';
                        $totaltagihan = 0;
                        foreach($keranjang as $k):
                            $no_transaksi = $k->no_transaksi ;
                            $totaltagihan = $totaltagihan + $k->total ;
                        endforeach;
                ?>

                <!-- Awal Dari Input Form -->
                <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="no_transaksi" name="no_transaksi" value="{{$no_transaksi}}">
                        <input type="hidden" id="tipeproses" name="tipeproses" value="tunai">
                        <fieldset disabled>
                            <div class="mb-3"><label for="kodeperusahaanlabel">No Transaksi</label>
                            <input class="form-control form-control-solid" id="kode" name="kode" type="text" value="{{$no_transaksi}}" readonly></div>
                        </fieldset>
                        <div class="mb-3"><label for="namaperusahaanlabel">Isi Keranjang <b>({{rupiah($totaltagihan)}})</b></label>
                            <ul class="list-group">
                            @foreach ($keranjang as $k)
                                <li class="list-group-item">
                                    <b>{{$k->nama_barang}}</b> <br>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img width="150px" height="150px" id="x-2" src="{{url('barang')}}/{{$k->foto}}" zn_id="79" title alt="ok">
                                        </div>
                                        <div class="col-sm-10" align="left">
                                            <table>
                                                <tr>
                                                    <td>
                                                    Harga per item
                                                    </td>
                                                    <td>=</td>
                                                    <td style="text-align:right">{{rupiah($k->harga)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    Jumlah Barang
                                                    </td>
                                                    <td>=</td>
                                                    <td style="text-align:right">{{number_format($k->jml_barang)}}</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                     <hr>
                                                    </td>
                                                    
                                                </tr>
                                                <tr> 
                                                    <td>
                                                    Total Harga  
                                                    </td>
                                                    <td>=</td>
                                                    <td style="text-align:right">
                                                        {{rupiah($k->total)}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="nomerlabel" class="col-sm-4 col-form-label">Bukti Bayar</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control @error('bukti_bayar') is-invalid @enderror" id="bukti_bayar" name="bukti_bayar" value="{{ old('bukti_bayar') }}">
                                @error('bukti_bayar')
                                    <div>{{ $message }}</div>
                                @enderror
                                
                            </div>
                        </div>    

                        <div class="mb-3 row">
                            <label for="nomerlabel" class="col-sm-4 col-form-label">Tanggal Bayar</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" name="tgl_bayar" value="{{ old('tgl_bayar') }}">
                                @error('tgl_bayar')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>  

                        <br>
                        <!-- untuk tombol simpan -->
                        
                        <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Bayar">

                        <!-- untuk tombol batal simpan -->
                        <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/pembayaran/viewkeranjang') }}" role="button">Batal</a>
                        
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>