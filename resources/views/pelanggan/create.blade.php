<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>

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
                <form action="{{ route('pelanggan.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_pelanggan">Kode Pelanggan</label>
                        <input class="form-control form-control-solid" id="kode_pelanggan" name="kode_pelanggan" type="text" placeholder="Contoh: PR-001" value="{{$kode_pelanggan}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input class="form-control form-control-solid" id="nama_pelanggan" name="nama_pelanggan" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('nama_pelanggan')}}">
                    </div>

                    <div class="mb-3">
                        <label for="nomor_telepon_pelanggan">No Telepon Pelanggan</label>
                        <input class="form-control form-control-solid" id="nama_pelanggan" name="nama_pelanggan" type="text" placeholder="Contoh: Steak Wagyu" value="{{old('nama_pelanggan')}}">
                    </div>


                    <div class="mb-3">
                        <label for="jenis_kelamin_pelanggan">Jenis Kelaman Pelanggan</label>
                        <select class="form-select form-select-solid" id="jenis_kelamin_pelanggan" name="jenis_kelamin_pelanggan">
                            <option value="" disabled selected>PILIH JENIS KELAMIN</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/pelanggan') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>