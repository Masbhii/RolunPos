<x-app-layout>
<div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Pembelian</h5>

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

                <!-- Awal Dari Input Form -->
                <form action="{{ route('pembelian.update', $pembelian->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id_pembelian" name="id_pembelian" value="{{$pembelian->id}}">
                    <fieldset disabled>
                      <div class="mb-3"><label for="nomor_pembelianlabel">Nomor Pembelian</label>
                      <input class="form-control form-control-solid" id="nomor_pembelian_tampil" name="nomor_pembelian_tampil" type="text" placeholder="Contoh: PB-001" value="{{$pembelian->nomor_pembelian}}" readonly></div>
                  </fieldset>
                  <input type="hidden" id="nomor_pembelian" name="nomor_pembelian" value="{{$pembelian->nomor_pembelian}}">

                  <div class="mb-3"><label for="tanggal_pembelian">Tanggal Pembelian</label>
                  <input class="form-control form-control-solid" id="tanggal_pembelian" name="tanggal_pembelian" type="date"  value="{{$pembelian->tanggal_pembelian}}">
                  </div>

                  <div class="mb-3"><label for="id_barang">Kode Bahan Baku</label>
                  <select name="id_barang" id="id_barang">
                    @foreach($barang as $b)
                    <option value="{{$b->id}}">{{$b->nama_barang}}</option>
                    @endforeach
                  </select>
                  </div>

                  <div class="mb-3"><label for="harga">Harga</label>
                    <input class="form-control form-control-solid" id="harga" name="harga" type="text"  value="{{$pembelian->harga}}">
                    </div>

                    <div class="mb-3"><label for="kuantitas">Kuantitas</label>
                      <input class="form-control form-control-solid" id="kuantitas" name="kuantitas" type="text"  value="{{$pembelian->kuantitas}}">
                      </div>
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Ubah">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/perusahaan') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>