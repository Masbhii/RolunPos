<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit kategori</h5>

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
                <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_kategori">Kode Kategori</label>
                        <input class="form-control form-control-solid" id="kode_kategori" name="kode_kategori" type="text" value="{{$kategori->kode_kategori}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_kategori">Nama kategori</label>
                        <input class="form-control form-control-solid" id="nama_kategori" name="nama_kategori" type="text" value="{{$kategori->nama_kategori}}">
                    </div>

                    <div class="mb-0"><label for="deskripsi_kategori">Deskripsi kategori</label>
                        <textarea class="form-control form-control-solid" id="deskripsi_kategori" name="deskripsi_kategori" rows="3" placeholder="Contoh: Cita Rasa Amerikano">{{$kategori->deskripsi_kategori}}</textarea>
                    </div>   
                    
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/kategori') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>