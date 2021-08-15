<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
    <div class="col">
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahUser"><i class="fas fa-user"></i> Tambah Data</a>
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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_user as $user) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['jabatan']; ?></td>
                            <td><?= $user['level']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editUserModal<?= $user['id_user'] ?>">edit</a>
                                <a href="<?= base_url('admin/delete_user/' . $user['id_user']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">hapus</a>
                            </td>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal tambah user baru -->
<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserLabel">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/proses') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" placeholder="" required value="<?= set_value('nama') ?>" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="" required value="<?= set_value('username') ?>" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="" required value="<?= set_value('password') ?>" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" placeholder="" required value="<?= set_value('jabatan') ?>" name="jabatan" id="jabatan">
                    </div>
                    <div class="form-group">
                        <label for="password">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- pilih --</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            <option value="IT">IT</option>
                        </select>
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
<?php foreach ($data_user as $user) { ?>
    <div class="modal fade" id="editUserModal<?= $user['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/proses/' . $user['id_user']) ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" placeholder="" required value="<?= $user['nama'] ?>" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" placeholder="" required value="<?= $user['username'] ?>" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="" required value="<?= $user['password'] ?>" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" placeholder="" required value="<?= $user['jabatan'] ?>" name="jabatan" id="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="password">Level</label>
                            <select name="level" id="level" class="form-control" required value="<?= $user['level'] ?>">
                                <?php if ($user['level'] == 'Admin') { ?>
                                    <option value="Admin" selected>Admin</option>
                                    <option value="Staff">Staff</option>
                                    <option value="IT">IT</option>
                                <?php } elseif ($user['level'] == 'Staff') { ?>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff" selected>Staff</option>
                                    <option value="IT">IT</option>
                                <?php } else { ?>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>
                                    <option value="IT" selected>IT</option>
                                <?php } ?>
                            </select>
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