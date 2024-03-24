<x-app-layout>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Data Coa</h5>

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
                <form action="{{ route('coa.update', $coa->id_akun) }}" method="post">
                    @csrf
                    @method('PUT')
                    <fieldset disabled>
                        <div class="mb-3"><label for="kodeakunlabel">Kode Akun</label>
                        <input class="form-control form-control-solid" id="kode_akun_tampil" name="kode_akun_tampil" type="text" placeholder="Contoh: PR-001" value="{{$coa->kode_akun}}" readonly></div>
                    </fieldset>
                    <input type="hidden" id="kode_akun" name="kode_akun" value="{{$coa->kode_akun}}">

                    <div class="mb-3"><label for="namaakunlabel">Nama Akun</label>
                    <input class="form-control form-control-solid" id="nama_akun" name="nama_akun" type="text" placeholder="Contoh: Toko Mukena Sejuk Menenangkan" value="{{$coa->nama_akun}}">
                    </div>
                    
        
                    <div class="mb-0"><label for="headerakunlabel">Header Akun</label>
                        <textarea class="form-control form-control-solid" id="header_akun" name="header_akun" rows="3" placeholder="Cth: Jl Pelajar Pejuan 45">{{$coa->header_akun}}</textarea>
                    </div>
                    <br>
                    <!-- untuk tombol simpan -->
                    
                    <input class="col-sm-1 btn btn-success btn-sm" type="submit" value="Ubah">

                    <!-- untuk tombol batal simpan -->
                    <a class="col-sm-1 btn btn-dark  btn-sm" href="{{ url('/coa') }}" role="button">Batal</a>
                    
                </form>
                <!-- Akhir Dari Input Form -->
            
          </div>
        </div>
</x-app-layout>