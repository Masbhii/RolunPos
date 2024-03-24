<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Pelanggan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pelanggan.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kode_pelanggan" class="col-md-4 col-form-label text-md-right">{{ __('Kode Pelanggan') }}</label>

                            <div class="col-md-6">
                                <input id="kode_pelanggan" type="text" class="form-control @error('kode_pelanggan') is-invalid @enderror" name="kode_pelanggan" value="{{ old('kode_pelanggan') }}" required autocomplete="kode_pelanggan" autofocus>

                                @error('kode_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_pelanggan" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pelanggan') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pelanggan" type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required autocomplete="nama_pelanggan" autofocus>

                                @error('nama_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomor_telepon_pelanggan" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon Pelanggan') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_telepon_pelanggan" type="text" class="form-control @error('nomor_telepon_pelanggan') is-invalid @enderror" name="nomor_telepon_pelanggan" value="{{ old('nomor_telepon_pelanggan') }}" required autocomplete="nomor_telepon_pelanggan" autofocus>

                                @error('nomor_telepon_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin_pelanggan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin Pelanggan') }}</label>

                            <div class="col-md-6">
                                <select id="jenis_kelamin_pelanggan" class="form-control @error('jenis_kelamin_pelanggan') is-invalid @enderror" name="jenis_kelamin_pelanggan" required autocomplete="jenis_kelamin_pelanggan">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                              </select>

                                @error('jenis_kelamin_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>