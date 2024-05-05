<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $kode_barang }}</h5>

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
                <form action="{{ route('barang.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_barang">Kode Barang</label>
                        <input class="form-control form-control-solid" id="kode_barang" name="kode_barang" type="text" placeholder="Contoh: PR-001" value="{{$kode_barang}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control form-control-solid" id="nama_barang" name="nama_barang" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('nama_barang')}}">
                    </div>

                    <div class="mb-0">
                        <label for="satuan">Satuan</label>
                        <input class="form-control form-control-solid" id="satuan" name="satuan" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('satuan')}}">
                    </div>    
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/barang') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>