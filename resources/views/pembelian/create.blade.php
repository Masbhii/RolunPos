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
                <form action="{{ route('pembelian.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="tgl_pembelian">Tanggal Pembelian</label>
                        <input class="form-control form-control-solid" id="tgl_pembelian" name="tgl_pembelian" type="text" placeholder="Contoh: PG-001" value="{{$kode_pembelian}}" readonly>
                    <fieldset disabled>
                        <div class="mb-3"><label for="nomor_pembelianlabel">Nomor Pembelian</label>
                        <input class="form-control form-control-solid" id="nomor_pembelian_tampil" name="nomor_pembelian_tampil" type="text" placeholder="Contoh: PB-001" value="{{$nomor_pembelian}}" readonly></div>
                    </fieldset>
                    <input type="hidden" id="nomor_pembelian" name="nomor_pembelian" value="{{$nomor_pembelian}}">

                    <div class="mb-3"><label for="tanggal_pembelian">Tanggal Pembelian</label>
                    <input class="form-control form-control-solid" id="tanggal_pembelian" name="tanggal_pembelian" type="date"  value="{{old('tanggal_pembelian')}}">
                    </div>

                    <div class="mb-3"><label for="kode_barang">Kode Barang</label>
                    <select name="kode_barang" id="kode_barang">
                      @foreach($barang as $b)
                      <option value="{{$b->kode_barang}}">{{$b->nama_barang}}</option>
                      @endforeach
                    </select>
                    </div>

                    <div class="mb-3"><label for="harga">Harga</label>
                      <input class="form-control form-control-solid" id="harga" name="harga" type="text"  value="{{old('harga')}}">
                      </div>

                      <div class="mb-3"><label for="kuantitas">Kuantitas</label>
                        <input class="form-control form-control-solid" id="kuantitas_tampil" name="kuantitas" type="text"  value="{{old('kuantitas')}}">
                        </div>

                      <div class="mb-3"><label for="deskripsi">Deskripsi</label>
                        <input class="form-control form-control-solid" id="Deskripsi" name="deskripsi" type="text"  value="{{old('deskripsi')}}">
                        </div>
        
                    
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/pembelian') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>



</x-app-layout>