<!DOCTYPE html>
<html>
<head>
    <title>Data Diskon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">🧾 Data Diskon</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($diskon)): ?>
                    <?php foreach ($diskon as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td>Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data diskon.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

    <a href="/diskon/create" class="btn btn-success">+ Tambah Diskon</a>
</div>

</body>
</html>
