<x-app-layout>
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Menu</h5>

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
                <form action="{{ route('menu.update', $menu->id_menu) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_menu">Kode Perusahaan</label>
                        <input class="form-control form-control-solid" id="kode_menu" name="kode_menu" type="text" value="{{$menu->kode_menu}}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_menu">Nama Menu</label>
                        <input class="form-control form-control-solid" id="nama_menu" name="nama_menu" type="text" value="{{$menu->nama_menu}}">
                    </div>

                    <div class="mb-0"><label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control form-control-solid" id="deskripsi" name="deskripsi" rows="3" placeholder="Contoh: Cita Rasa Amerikano">{{$menu->deskripsi}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga">Harga</label>
                        <input class="form-control form-control-solid" id="harga" name="harga" type="text" placeholder="Contoh: 10000" value="{{$menu->harga}}">
                    </div>

                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <select class="form-select form-select-solid" id="kategori" name="kategori">
                            <option value="" disabled selected>PILIH KATEGORI</option>
                            <option {{ $menu->kategori === "makanan" ? "selected" : "" }} value="makanan">Makanan</option>
                            <option {{ $menu->kategori === "minuman" ? "selected" : "" }} value="minuman">Minuman</option>
                            <option {{ $menu->kategori === "dessert" ? "selected" : "" }} value="dessert">Dessert</option>
                        </select>
                    </div>
                    
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Simpan">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/menu') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
      </div>
</x-app-layout>