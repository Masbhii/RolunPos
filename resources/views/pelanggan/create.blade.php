<x-app-layout>
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Data Pelanggan</h5>

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
                    <fieldset disabled>
                        <div class="mb-3"><label for="kodepelangganlabel">Kode Pelanggan</label>
                        <input class="form-control form-control-solid" id="kode_pelanggan_tampil" name="kode_pelanggan_tampil" type="text" placeholder="Contoh: PL-001" value="{{$kode_pelanggan}}" readonly></div>
                    </fieldset>
                    <input type="hidden" id="kode_pelanggan" name="kode_pelanggan" value="{{$kode_pelanggan}}">

                    <div class="mb-3"><label for="namapelangganlabel">Nama Pelanggan</label>
                    <input class="form-control form-control-solid" id="nama_pelanggan" name="nama_pelanggan" type="text" placeholder="Contoh: Nama Pelanggan 1" value="{{old('nama_pelanggan')}}">
                    </div>
                    
                    <div class="mb-3"><label for="notlppelangganlabel">No Telepon Pelanggan</label>
                    <input class="form-control form-control-solid" id="no_tlp_pelanggan" name="no_tlp_pelanggan" type="text" placeholder="Contoh: 08xxxxxxxxxx" value="{{old('no_tlp_pelanggan')}}">
                    </div>
        
                    <div class="mb-0"><label for="alamatpelangganlabel">Alamat Pelanggan</label>
                        <input class="form-control form-control-solid" id="alamat_pelanggan" name="alamat_pelanggan" type="text" placeholder="Contoh: Jl PGA 18">{{old('alamat_pelanggan')}}
                    </div>

                    <div class="form-group"><label for="jeniskelaminpelangganlabel">Jenis Kelamin Pelanggan</label>
                        <br>
                        <label class="radio-inline">
                        <input type="radio" id="jenis_kelamin_pelanggan" name="jenis_kelamin_pelanggan" value="Perempuan"> Perempuan</label>
                        
                        <label class="radio-inline">
                        <input type="radio" id="jenis_kelamin_pelanggan" name="jenis_kelamin_pelanggan" value="Laki-laki"> Laki-laki</label>
                    </div>
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <button class="col-sm-1 btn btn-success btn-sm" value="Simpan">Simpan</button>

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/pelanggan') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
		
		
		
        
</x-app-layout>