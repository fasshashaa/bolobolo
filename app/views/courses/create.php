<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h2>Tambah Kursus Baru</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="/courses/store" method="POST">
            <div class="mb-3">
                <label for="judul_kursus" class="form-label">Judul Kursus:</label>
                <input type="text" id="judul_kursus" name="judul_kursus" class="form-control" placeholder="Masukkan judul kursus" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi singkat kursus" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="id_instruktur" class="form-label">Instruktur:</label>
                <select name="id_instruktur" id="id_instruktur" class="form-select" required>
                    <option value="">Pilih Instruktur</option>
                    <?php if (!empty($instructors)): ?>
                        <?php foreach ($instructors as $instructor): ?>
                            <option value="<?= htmlspecialchars($instructor['id_user']) ?>">
                                <?= htmlspecialchars($instructor['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="" disabled>Instruktur tidak tersedia</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi (Jam):</label>
                <input type="text" id="durasi" name="durasi" class="form-control" placeholder="Durasi kursus dalam jam" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Kursus</button>
        </form>
    </div>
</div>

