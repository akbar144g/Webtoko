<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashData('success')): ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<!-- Table with stripped rows -->
<table class="table table-striped datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nominal (Rp)</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($diskon as $index => $d): ?>
            <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= $d['tanggal'] ?></td>
                <td><?= number_format($d['nominal'], 0, ',', '.') ?></td>
                <td>
                    <!-- Tombol Ubah -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#editModal-<?= $d['id'] ?>">
                        Ubah
                    </button>

                    <!-- Tombol Hapus (pakai POST) -->
                    <form action="<?= base_url('diskon/delete/' . $d['id']) ?>" method="post" class="d-inline"
                        onsubmit="return confirm('Yakin hapus data ini?')">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal Begin -->
            <div class="modal fade" id="editModal-<?= $d['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Data Diskon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('diskon/update/' . $d['id']) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="tanggal-<?= $d['id'] ?>">Tanggal</label>
                                    <input type="text" name="tanggal" class="form-control" id="tanggal-<?= $d['id'] ?>"
                                        value="<?= $d['tanggal'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nominal-<?= $d['id'] ?>">Nominal</label>
                                    <input type="text" name="nominal" class="form-control" id="nominal-<?= $d['id'] ?>"
                                        value="<?= $d['nominal'] ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Modal End -->
        <?php endforeach ?>
    </tbody>
</table>

<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Diskon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('diskon/store') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="YYYY-MM-DD"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" name="nominal" class="form-control" id="nominal" placeholder="Contoh: 100000"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Modal End -->

<?= $this->endSection() ?>