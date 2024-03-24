<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Pegawai</h5>

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
                <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_pegawai">Kode Pegawai</label>
                        <input class="form-control form-control-solid" id="kode_pegawai" name="kode_pegawai" type="text" placeholder="Contoh: PG-001" value="{{$pegawai->kode_pegawai}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input class="form-control form-control-solid" id="nama_pegawai" name="nama_pegawai" type="text" placeholder="Contoh: John Doe" value="{{$pegawai->nama_pegawai}}">
                    </div>

                    <div class="mb-3">
                        <label for="jabatan">Jabatan</label>
                        <input class="form-control form-control-solid" id="jabatan" name="jabatan" type="text" placeholder="Contoh: Kepala Kebun" value="{{$pegawai->jabatan}}">
                    </div>

                    <div class="mb-3">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input class="form-control form-control-solid" id="nomor_telepon" name="nomor_telepon" type="text" placeholder="Contoh: 081234567890" value="{{$pegawai->nomor_telepon}}">
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select form-select-solid" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="" disabled {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == '' ? 'selected' : '' }}>PILIH JENIS KELAMIN</option>
                            <option value="Pria" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Wanita" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                    </div>
                    
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/pegawai') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
<x-app-layout>