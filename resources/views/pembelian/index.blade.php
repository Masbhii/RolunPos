<x-app-layout>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Pembelian List</div>

                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal Pembelian</th>
                                        <th>No Pembelian</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Tgl Jatuh Tempo</th>
                                        <th>Kuantitas</th>
                                        <th>Harga</th>
                                        <th>ID Barang</th>
                                        <th>ID Pegawai</th>
                                        <th>ID Supplier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pembelians as $pembelian)
                                        <tr>
                                            <td>{{ $pembelian->tgl_pembelian }}</td>
                                            <td>{{ $pembelian->no_pembelian }}</td>
                                            <td>{{ $pembelian->keterangan }}</td>
                                            <td>{{ $pembelian->status }}</td>
                                            <td>{{ $pembelian->tgl_jatuh_tempo }}</td>
                                            <td>{{ $pembelian->kuantitas }}</td>
                                            <td>{{ $pembelian->harga }}</td>
                                            <td>{{ $pembelian->id_barang }}</td>
                                            <td>{{ $pembelian->id_pegawai }}</td>
                                            <td>{{ $pembelian->id_supplier }}</td>
                                            <td>
                                                <a href="{{ route('pembelians.edit', $pembelian->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('pembelians.destroy', $pembelian->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>