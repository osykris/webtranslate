@extends('layouts.app')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Data Kelola Web</h1>
        <div class="section-header-button">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Data  <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th>Kata</th>
                                        <th>Terminology</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                         <th>Deskripsi Indonesia</th>
                                         <th>Link Marker</th>
                                         <th>Kategori</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($katas as $kata)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>{{ $kata->kata }}</td>
                                        <td>{{ $kata->terminology }}</td>
                                        <td><img src="{{ asset('img/'.$kata->gambar) }}" alt="" height="100"></td>
                                        <td>{{ $kata->deskripsi }}</td>
                                        <td>{{ $kata->deskripsi_indo }}</td>
                                        <td>{{ $kata->link }}</td>
                                        <td>{{ $kata->kategori }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-white me-2" style="color: #009dfb;" onclick="edit('{{ $kata->id }}')" id="edit-data"><i class="fas fa-edit me-2"></i></button>
                                            <button class="btn btn-sm btn-white me-2" style="color: #E70B0B" onclick="hapus_data('{{ $kata->id }}')"><i class='fas fa-times'></i></button>
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
</section>

<!-- Modal Tambah Data -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                <div class="form-group">
                        <label for="kata">Kata</label>
                        <input type="text" class="form-control" placeholder="Masukkan Kata" name="kata" id="kata" required>
                    </div>
                    <div class="form-group">
                        <label for="terminology">Terminology</label>
                        <input type="text" class="form-control" placeholder="Masukkan Terminology" name="terminology" id="terminology" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi" name="deskripsi" id="deskripsi" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_indo">Deskripsi Indonesia</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi Indonesia" name="deskripsi_indo" id="deskripsi_indo" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" placeholder="Masukkan Link" name="link" id="link" required>
                    </div>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="kategori" id="kategori">
                            <option selected disabled>Pilih Kategori</option>
                            <option value="AU">AU</option>
                            <option value="AD">AD</option>
                            <option value="AL">AL</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar" id="gambar" accept=".jpeg,.jpg,.png" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-sampah">Tutup</button>
                <button type="button" class="btn btn-primary" id="add-data">+ Tambah Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Data -->
<div class="modal fade" id="ModalDataUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-data-update">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label for="kata_edit">Kata</label>
                        <input type="text" class="form-control" placeholder="Masukkan Kata" name="kata_edit" id="kata_edit">
                    </div>
                    <div class="form-group">
                        <label for="terminology_edit">Terminology</label>
                        <input type="text" class="form-control" placeholder="Masukkan Terminology" name="terminology_edit" id="terminology_edit">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_edit">Deskripsi</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi" name="deskripsi_edit" id="deskripsi_edit">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_indo_edit">Deskripsi Indonesia</label>
                        <input type="text" class="form-control" placeholder="Masukkan Deskripsi Indonesia" name="deskripsi_indo_edit" id="deskripsi_indo_edit" >
                    </div>
                    <div class="form-group">
                        <label for="link_edit">Link</label>
                        <input type="text" class="form-control" placeholder="Masukkan Link" name="link_edit" id="link_edit" >
                    </div>
                    <div class="form-group">
                        <label for="gambar_edit">Gambar</label>
                        <input type="file" class="form-control" placeholder="Masukkan Gambar" name="gambar_edit" id="gambar_edit" accept=".jpeg,.jpg,.png">
                    </div>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="kategori_edit" id="kategori_edit">
                            <option selected disabled>Pilih Kategori</option>
                            <option value="AU">AU</option>
                            <option value="AD">AD</option>
                            <option value="AL">AL</option>
                          </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-data-edit">Tutup</button>
                <button type="button" class="btn btn-primary" id="update-data">Update Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
<div class="modal fade" id="ModalHapusKata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-body-del">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btn-hapus-kata">Hapus Data</button>
            </div>
        </div>
    </div>
</div>
@endsection
