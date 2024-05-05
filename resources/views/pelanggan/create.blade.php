<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Pembelian') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pembelian.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kode_pembelian" class="col-md-4 col-form-label text-md-right">{{ __('Kode Pembelian') }}</label>

                            <div class="col-md-6">
                                <input id="kode_pembelian" type="text" class="form-control @error('kode_pembelian') is-invalid @enderror" name="kode_pembelian" value="{{ $kode_pembelian }}" required readonly>

                                @error('kode_pembelian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_pembelian" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pembelian') }}</label>

                            <div class="col-md-6">
                                <input id="nama_pembelian" type="text" class="form-control @error('nama_pembelian') is-invalid @enderror" name="nama_pembelian" value="{{ old('nama_pembelian') }}" required autocomplete="nama_pembelian" autofocus>

                                @error('nama_pembelian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomor_telepon_pembelian" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon Pembelian') }}</label>

                            <div class="col-md-6">
                                <input id="nomor_telepon_pembelian" type="text" class="form-control @error('nomor_telepon_pembelian') is-invalid @enderror" name="nomor_telepon_pembelian" value="{{ old('nomor_telepon_pembelian') }}" required autocomplete="nomor_telepon_pembelian" autofocus>

                                @error('nomor_telepon_pembelian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin_pembelian" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin Pembelian') }}</label>

                            <div class="col-md-6">
                                <select id="jenis_kelamin_pembelian" class="form-control @error('jenis_kelamin_pembelian') is-invalid @enderror" name="jenis_kelamin_pembelian" required autocomplete="jenis_kelamin_pembelian">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                              </select>

                                @error('jenis_kelamin_pembelian')
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