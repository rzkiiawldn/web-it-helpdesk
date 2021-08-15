<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
    <div class="col">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKerusakan"><i class="fas fa-plus"></i> Buat Laporan</a>
    </div>
</div>

<?= $this->session->flashdata('pesan'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Jenis Kerusakan</th>
                        <th>Status</th>
                        <th>Waktu Buat</th>
                        <th>Waktu Selesai</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kerusakan as $rusak) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $rusak['kode']; ?></td>
                            <td><?= $rusak['deskripsi']; ?></td>
                            <td><?= $rusak['jenis_kerusakan']; ?></td>
                            <td>
                                <?php if ($rusak['status_pengerjaan'] == 'Belum Selesai') { ?>
                                    <span class="badge badge-danger"><?= $rusak['status_pengerjaan']; ?></span>
                                <?php } elseif ($rusak['status_pengerjaan'] == 'Sedang ditanggapi') { ?>
                                    <span class="badge badge-warning"><?= $rusak['status_pengerjaan']; ?></span>
                                <?php } else { ?>
                                    <span class="badge badge-success"><?= $rusak['status_pengerjaan']; ?></span>
                                <?php } ?>
                            </td>
                            <td><?= $rusak['waktu_pembuatan']; ?></td>
                            <td><?= $rusak['waktu_selesai']; ?></td>
                            <td><img src="<?= base_url('assets/img/foto_kerusakan/' . $rusak['foto_kerusakan']) ?>" alt="" class="img-fluid" width="90px"></td>
                            <td>
                                <?php if ($rusak['status_pengerjaan'] == 'Belum Selesai') { ?>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editKerusakan<?= $rusak['kode'] ?>">edit</a>
                                <?php } else { ?>
                                    <a class="btn btn-success btn-sm disabled">edit</a>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal tambah user baru -->
<div class="modal fade" id="tambahKerusakan" tabindex="-1" role="dialog" aria-labelledby="tambahKerusakanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKerusakanLabel">Buat Laporan Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('staff/proses') ?>" method="post" enctype="multipart/form-data">
                <div class=" modal-body">
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Kerusakan</label>
                        <input type="text" class="form-control" placeholder="" required value="<?= set_value('deskripsi') ?>" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="form-group">
                        <label for="password">Jenis Kerusakan</label>
                        <select name="jenis_kerusakan" id="level" class="form-control" required>
                            <option value="">-- pilih --</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto_kerusakan">Foto Kerusakan</label>
                        <input type="file" class="form-control" placeholder="" required value="<?= set_value('foto_kerusakan') ?>" name="foto_kerusakan" id="foto_kerusakan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit user -->
<?php foreach ($kerusakan as $rusak) { ?>
    <div class="modal fade" id="editKerusakan<?= $rusak['kode'] ?>" tabindex="-1" role="dialog" aria-labelledby="editKerusakanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKerusakanLabel">Edit Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('staff/proses/' . $rusak['kode']) ?>" method="post" enctype="multipart/form-data">
                    <div class=" modal-body">
                        <input type="hidden" name="kode" value="<?= $rusak['kode'] ?>">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Kerusakan</label>
                            <input type="text" class="form-control" placeholder="" required value="<?= $rusak['deskripsi'] ?>" name="deskripsi" id="deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="password">Jenis Kerusakan</label>
                            <select name="jenis_kerusakan" id="level" class="form-control" required value="<?= $rusak['jenis_kerusakan'] ?>">
                                <?php if ($rusak['jenis_kerusakan'] == 'Low') { ?>
                                    <option value="Low" selected>Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Urgent">Urgent</option>
                                <?php } elseif ($rusak['jenis_kerusakan'] == 'Medium') { ?>
                                    <option value="Low">Low</option>
                                    <option value="Medium" selected>Medium</option>
                                    <option value="Urgent">Urgent</option>
                                <?php } else { ?>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Urgent" selected>Urgent</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label" for="foto">Foto Kerusakan</label>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/foto_kerusakan/' . $rusak['foto_kerusakan']); ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" name="foto_kerusakan" class="custom-file-input">
                                            <label class="custom-file-label" for="custom-file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>