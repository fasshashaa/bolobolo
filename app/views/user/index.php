<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<!-- Main content -->
<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2>Daftar Pengguna</h2>
        <a href="/user/create" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <a href="/user/edit/<?= $user['id_user']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/user/delete/<?= $user['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

