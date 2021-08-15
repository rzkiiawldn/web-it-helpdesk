<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
    <div class="col">
        <a href="" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Cetak data</a>
    </div>
</div>

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
                            <td><?= $rusak['foto_kerusakan']; ?></td>
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