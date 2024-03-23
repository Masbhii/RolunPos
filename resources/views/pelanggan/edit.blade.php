<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Pelanggan</h5>

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
                <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_pelanggan">Kode Perusahaan</label>
                        <input class="form-control form-control-solid" id="kode_pelanggan" name="kode_pelanggan" type="text" value="{{$pelanggan->kode_pelanggan}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input class="form-control form-control-solid" id="nama_pelanggan" name="nama_pelanggan" type="text" value="{{$pelanggan->nama_pelanggan}}">
                    </div>

                    <div class="mb-3">
                        <label for="nomor_telepon_pelanggan">Nomor Telepon Pelanggan</label>
                        <input class="form-control form-control-solid" id="nomor_telepon_pelanggan" name="nomor_telepon_pelanggan" type="text" value="{{$nomor_telepon_pelanggan->nomor_telepon_pelanggan}}">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin_pelanggan">Jenis Kelamin Pelanggan</label>
                        <select class="form-select form-select-solid" id="jenis_kelamin_pelanggan" name="jenis_kelamin_pelanggan">
                            <option value="" disabled selected>PILIH JENIS KELAMIN</option>
                            <option {{ $pelanggan->Jenis Kelamin Pelanggan === "Laki-Laki" ? "selected" : "" }} value="Laki-Laki">Laki-Laki</option>
                            <option {{ $pelanggan->Jenis Kelamin Pelanggan === "Perempuan" ? "selected" : "" }} value="Perempuan">Perempuan</option>
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