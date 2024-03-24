<x-app-layout>
    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
                  <div class="card">

                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Master Data Kategori</h6>
                            
                            <!-- Tombol Tambah Data -->
                            <a href="{{ url('/kategori/create') }}" class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="ti ti-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
                            <!-- Akghir Tombol Tambah Data -->

                        </div>

                    <div class="card-body">
                      <!-- Awal Dari Tabel -->
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Kode kategori</th>
                                            <th>Nama kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>Kode kategori</th>
                                            <th>Nama kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($data as $p)
                                        <tr>
                                            <td>{{ $p->kode_kategori }}</td>
                                            <td>{{ $p->nama_kategori }}</td>
                                            <td>{{ $p->deskripsi }}</td>
                                            <td>{{ $p->kategori }}</td>
                                            <td>
                                                    <a href="{{ route('kategori.edit', $p->id_kategori) }}" class="btn btn-success btn-icon-split btn-sm">
                                                        <span class="icon text-white-50">
                                                            <i class="ti ti-check"></i>
                                                        </span>
                                                        <span class="text">Ubah</span>
                                                    </a>

                                                    <a href="#" onclick="deleteConfirm(this); return false;" data-id="{{ $p->id_kategori }}" class="btn btn-danger btn-icon-split btn-sm">
                                                        <span class="icon text-white-50">
                                                            <i class="ti ti-minus"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    <!-- Akhir Dari Tabel -->
                    </div>
                  </div>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>
    </div>
    


        <script>
            function deleteConfirm(e){
                var tomboldelete = docukategorit.getElekategoritById('btn-delete')  
                id = e.getAttribute('data-id');

                // const str = 'Hello' + id + 'World';
                var url3 = "{{url('kategori/destroy/')}}";
                var url4 = url3.concat("/",id);
                // console.log(url4);

                // console.log(id);
                // var url = "{{url('perusahaan/destroy/"+id+"')}}";
                
                // url = JSON.parse(rul.replace(/"/g,'"'));
                tomboldelete.setAttribute("href", url4); //akan meload kontroller delete

                var pesan = "Data dengan ID <b>"
                var pesan2 = " </b>akan dihapus"
                var res = id;
                docukategorit.getElekategoritById("xid").innerHTML = pesan.concat(res,pesan2);

                var myModal = new bootstrap.Modal(docukategorit.getElekategoritById('deleteModal'), {  keyboard: false });
                
                myModal.show();
            
            }
        </script>

        <!-- Logout Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="docukategorit">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body" id="xid"></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                    
                </div>
                </div>
            </div>
        </div>
</x-app-layout>