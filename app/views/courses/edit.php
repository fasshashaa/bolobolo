<?php include(__DIR__ . '/../../../public/header.php');
 ?>
<?php include(__DIR__ . '/../../../public/sidebar.php');
 ?>

<div id="page-content-wrapper">
    <div class="container mt-4">
        <h1 class="mb-4">Edit Kursus</h1>

        <?php if (empty($course)): ?>
            <div class="alert alert-danger">Data kursus tidak ditemukan. Silakan kembali ke halaman sebelumnya.</div>
        <?php else: ?>
            <form action="/courses/update/<?= htmlspecialchars($course['id_courses']) ?>" method="POST">
                <fieldset class="mb-4">
                    <legend>Informasi Kursus</legend>

                    <div class="mb-3">
                        <label for="judul_kursus" class="form-label">Judul Kursus</label>
                        <input type="text" name="judul_kursus" id="judul_kursus" class="form-control"
                            value="<?= htmlspecialchars($course['judul_kursus']) ?>" placeholder="Masukkan judul kursus" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"
                            placeholder="Masukkan deskripsi kursus" required><?= htmlspecialchars($course['deskripsi']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="id_instruktur" class="form-label">Instruktur</label>
                        <select name="id_instruktur" id="id_instruktur" class="form-select" required>
                            <option value="">Pilih Instruktur</option>
                            <?php if (!empty($instructors)): ?>
                                <?php foreach ($instructors as $instructor): ?>
                                    <option value="<?= htmlspecialchars($instructor['id_user']) ?>"
                                        <?= $course['id_instruktur'] == $instructor['id_user'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($instructor['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" disabled>Instruktur tidak tersedia</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi (Jam)</label>
                        <input type="number" name="durasi" id="durasi" class="form-control"
                            value="<?= htmlspecialchars($course['durasi']) ?>" placeholder="Masukkan durasi kursus (dalam jam)" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </fieldset>
            </form>
        <?php endif; ?>
    </div>
</div>

