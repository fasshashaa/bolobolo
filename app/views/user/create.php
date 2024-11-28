<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2>Tambah Pengguna Baru</h2>
        <form action="/user/store" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nama :</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="peran" class="form-label">Peran (peserta/instruktur):</label>
                <input type="text" name="peran" id="peran" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
</form>
    </div>
</div>

