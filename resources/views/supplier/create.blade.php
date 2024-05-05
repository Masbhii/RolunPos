<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $kode_supplier }}</h5>

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
                <form action="{{ route('supplier.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="supplier_barang">Kode Supplier</label>
                        <input class="form-control form-control-solid" id="kode_supplier" name="kode_supplier" type="text" placeholder="Contoh: PR-001" value="{{$kode_supplier}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input class="form-control form-control-solid" id="nama_perusahaan" name="nama_perusahaan" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('nama_perusahaan')}}">
                    </div>

                    <div class="mb-0">
                        <label for="alamat">Alamat</label>
                        <input class="form-control form-control-solid" id="alamat" name="alamat" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('alamat')}}">
                    </div> 
                    
                    <div class="mb-0">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input class="form-control form-control-solid" id="nomor_telepon" name="nomor_telepon" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('nomor_telepon')}}">
                    </div>

                    <div class="mb-0">
                        <label for="kategori_produk">Nama Produk</label>
                        <input class="form-control form-control-solid" id="kategori_produk" name="kategori_produk" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('kategori_produk')}}">
                    </div>
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/supplier') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>