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
                        <label for="nomor_pembelian">Nomor pembelian</label>
                        <input class="form-control form-control-solid" id="nomor_pembelian" name="nomor_pembelian" type="text" placeholder="Contoh: 081234567890" value="{{old('nomor_pembelian')}}">
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