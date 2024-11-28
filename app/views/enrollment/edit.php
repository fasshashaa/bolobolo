<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2>Edit Pendaftaran Peserta</h2>
        <form action="/enrollment/update/<?php echo $peserta['id']; ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

            <div class="mb-3">
                <label for="peserta" class="form-label">Nama Peserta :</label>
                <select name="peserta" id="peserta" class="form-select" required>
                    <option value="" disabled>Pilih Peserta</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['name']; ?>" <?= ($user['name'] == $peserta['peserta']) ? 'selected' : ''; ?>>
                            <?= $user['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="kursus" class="form-label">Jenis Kursus :</label>
                <select name="kursus" id="kursus" class="form-select" required>
                    <option value="" disabled>Pilih Kursus</option>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?= $course['judul_kursus']; ?>" <?= ($course['judul_kursus'] == $peserta['kursus']) ? 'selected' : ''; ?>>
                            <?= $course['judul_kursus']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_daftar" class="form-label">Tanggal Daftar :</label>
                <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" value="<?php echo $peserta['tanggal_daftar']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>

        
    </div>
</div>

