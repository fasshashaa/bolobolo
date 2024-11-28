<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2 class="mb-4">Pendaftaran Peserta</h2>
        <form action="/enrollment/store" method="POST" class="form-container">

            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

            <div class="mb-3">
                <label for="peserta" class="form-label">Nama Peserta:</label>
                <select name="peserta" id="peserta" class="form-select" required>
                    <option value="" disabled selected>Pilih Peserta</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['name'] ?>"><?= $user['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="kursus" class="form-label">Jenis Kursus:</label>
                <select name="kursus" id="kursus" class="form-select" required>
                    <option value="" disabled selected>Pilih Kursus</option>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?= $course['judul_kursus'] ?>"><?= $course['judul_kursus'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_daftar" class="form-label">Tanggal Daftar:</label>
                <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

