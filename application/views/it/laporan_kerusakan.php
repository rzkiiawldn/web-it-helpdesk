<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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
                        <th width="20%">Aksi</th>
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
                                    <form action="<?= base_url('it/tanggapi/' . $rusak['kode']) ?>" method="post">
                                        <input type="hidden" name="kode" value="<?= $rusak['kode'] ?>">
                                        <input type="hidden" name="status_pengerjaan" value="Sedang ditanggapi">
                                        <button type="button" class="btn btn-outline-success btn-sm disabled">Selesai</button>
                                        <button type="submit" class="btn btn-outline-success btn-sm">Tanggapi</button>
                                    </form>
                                <?php } elseif ($rusak['status_pengerjaan'] == 'Sedang ditanggapi') { ?>
                                    <form action="<?= base_url('it/selesai/' . $rusak['kode']) ?>" method="post">
                                        <input type="hidden" name="kode" value="<?= $rusak['kode'] ?>">
                                        <input type="hidden" name="status_pengerjaan" value="Selesai">
                                        <button type="submit" class="btn btn-outline-success btn-sm">Selesai</button>
                                        <button type="button" class="btn btn-outline-success btn-sm disabled">Tanggapi</button>
                                    </form>
                                <?php } else { ?>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>