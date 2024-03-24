<x-app-layout>    
    @extends('layouts.app')

    @section('title', 'Pegawai')

    @section('content')
        <h1>Daftar Pegawai</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Nomor Telepon Pegawai</th>
                    <th>Jenis Kelamin Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $pegawai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pegawai->kode_pegawai }}</td>
                    <td>{{ $pegawai->nama_pegawai }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td>{{ $pegawai->nomor_telepon_pegawai }}</td>
                    <td>{{ $pegawai->jenis_kelamin_pegawai }}</td>
                    <td>
                        <form action="{{ route('pegawai.destroy', $pegawai->id_pegawai) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?')">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('pegawai.edit', $pegawai->id_pegawai) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $pegawai->links() }}
    @endsection
<x-app-layout>