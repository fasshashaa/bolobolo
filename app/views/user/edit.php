<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2>Edit Pengguna</h2>
        <form action="/user/update/<?php echo htmlspecialchars($user['id_user']); ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Nama :</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (Opsional) :</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="peran" class="form-label">Peran (instruktur/peserta):</label>
                <input type="text" id="peran" name="peran" class="form-control" value="<?php echo htmlspecialchars($user['peran']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>

