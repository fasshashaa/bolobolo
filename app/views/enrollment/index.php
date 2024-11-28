<?php include(__DIR__ . '/../../../public/header.php');?>
<?php include(__DIR__ . '/../../../public/sidebar.php');?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2>Daftar Peserta</h2>
        <a href="/enrollment/create" class="btn btn-primary mb-3">Tambah Daftar Peserta</a>
        <a href="/courses/index" class="btn btn-primary mb-3">Info Kursus</a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Jenis Kursus</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $index => $user): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= htmlspecialchars($user['peserta']); ?></td>
                            <td><?= htmlspecialchars($user['kursus']); ?></td>
                            <td><?= htmlspecialchars($user['tanggal_daftar']); ?></td>
                            <td>
                                <a href="/enrollment/edit/<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/enrollment/delete/<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada peserta yang terdaftar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

