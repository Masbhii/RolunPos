<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Pembelian</h5>

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
                        <label for="kode_pembelian">Kode Pembelian</label>
                        <input class="form-control form-control-solid" id="kode_pembelian" name="kode_pembelian" type="text" placeholder="Contoh: PG-001" value="{{$kode_pembelian}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pembelian">Nama Pembelian</label>
                        <input class="form-control form-control-solid" id="nama_pembelian" name="nama_pembelian" type="text" placeholder="Contoh: John Doe" value="{{old('nama_pembelian')}}">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_pembelian">Tanggal Pembelian</label>
                        <input class="form-control form-control-solid" id="tgl_pembelian" name="tgl_pembelian" type="text" placeholder="Contoh: Kepala Kebun" value="{{old('tgl_pembelian')}}">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <input class="form-control form-control-solid" id="keterangan" name="keterangan" type="text" placeholder="Contoh: 081234567890" value="{{old('keterangan')}}">
                    </div>

                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input class="form-control form-control-solid" id="status" name="status" type="text" placeholder="Contoh: 081234567890" value="{{old('status')}}">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_jatuh_tempo">Tanggal Jatuh Tempo</label>
                        <input class="form-control form-control-solid" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo" type="text" placeholder="Contoh: 081234567890" value="{{old('tgl_jatuh_tempo')}}">
                    </div>

                    <div class="mb-3">
                        <label for="kuantitas">Kuantitas</label>
                        <input class="form-control form-control-solid" id="kuantitas" name="kuantitas" type="text" placeholder="Contoh: 081234567890" value="{{old('kuantitas')}}">
                    </div>

                    <div class="mb-3">
                        <label for="harga">Harga</label>
                        <input class="form-control form-control-solid" id="harga" name="harga" type="text" placeholder="Contoh: 081234567890" value="{{old('harga')}}">
                    </div>

                    <div class="mb-3">
                        <label for="harga">id_barang</label>
                        <input class="form-control form-control-solid" id="harga" name="harga" type="text" placeholder="Contoh: 081234567890" value="{{old('harga')}}">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select form-select-solid" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="" disabled selected>PILIH JENIS KELAMIN</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
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