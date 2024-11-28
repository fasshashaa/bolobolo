<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">

        <h2 class="mb-4">Daftar Kursus</h2>
        <div class="mb-3">
            <a href="/courses/create" class="btn btn-primary">Tambah Kursus</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Kursus</th>
                    <th>Deskripsi</th>
                    <th>Instruktur</th>
                    <th>Durasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kursus)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($kursus as $course): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($course['judul_kursus'] ?? 'Judul tidak tersedia') ?></td>
                            <td><?= htmlspecialchars($course['deskripsi'] ?? '') ?></td>
                            <td><?= htmlspecialchars($course['instruktur'] ?? 'Instruktur tidak tersedia') ?></td>
                            <td><?= htmlspecialchars($course['durasi'] ?? 'Durasi tidak tersedia') ?> jam</td>
                            <td>
                                <a href="/courses/edit/<?= htmlspecialchars($course['id_courses'] ?? '') ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/courses/delete/<?= htmlspecialchars($course['id_courses']) ?>" method="POST" style="display:inline;">
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada kursus yang tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

