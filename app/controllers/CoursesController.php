<?php

require_once '../app/models/Courses.php';

class CoursesController {
    private $userModel;
    private $courseModel;

    public function __construct() {
        $this->courseModel = new Courses();
    }
    // Menampilkan daftar kursus
    public function index() {
        $kursus = $this->courseModel->getAllCourses();
        require_once '../app/views/courses/index.php';
    }
    // Menampilkan form pembuatan kursus
    public function create() {
        $users = $this->courseModel->getAllCourses(); 
        $instructors = $this->courseModel->getInstructors(); 
        require_once '../app/views/courses/create.php';
    }
    // Menyimpan data kursus baru
    public function store() {
        $judul_kursus = htmlspecialchars($_POST['judul_kursus'] ?? '');
        $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? '');
        $id_instruktur = filter_var($_POST['id_instruktur'] ?? '', FILTER_VALIDATE_INT);
        $durasi = filter_var($_POST['durasi'] ?? '', FILTER_VALIDATE_INT);

        if ($judul_kursus && $deskripsi && $id_instruktur && $durasi) {
            if ($this->courseModel->addCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi)) {
                header('Location: /courses/index');
                exit;
            } else {
                $error = "Gagal menambahkan kursus.";
            }
        } else {
            $error = "Semua kolom wajib diisi!";
        }
        require_once '../app/views/courses/create.php';  
    }
    // Menampilkan form edit kursus
    public function editCourse($courseId) {
        $courseId = intval($courseId); // Pastikan ID valid
        $course = $this->courseModel->getCourseById($courseId); // Data kursus
        $instructors = $this->courseModel->getInstructors(); // Daftar instruktur
        require_once '../app/views/courses/edit.php'; // Tampilkan view
    }
    // Memproses pembaruan kursus
    public function updateCourse($courseId) {
        $id_courses = intval($courseId); // Pastikan ID valid
        $judul_kursus = htmlspecialchars($_POST['judul_kursus'] ?? '');
        $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? '');
        $id_instruktur = filter_var($_POST['id_instruktur'] ?? '');
        $durasi = filter_var($_POST['durasi'] ?? '');

        if ($judul_kursus && $deskripsi && $id_instruktur && $durasi) {
            $updateResult = $this->courseModel->updateCourse($courseId, $judul_kursus, $deskripsi, $id_instruktur, $durasi);
            if ($updateResult) {
                header('Location: /courses/index');
                exit;
            } else {
                echo "Gagal memperbarui kursus.";
            }
        } else {
            echo "Data input tidak valid.";
        }
    }  
    public function deleteCourse($courseId) {
        // Validasi jika courseId ada dan valid
        if ($courseId > 0) {
            // Implementasikan logika untuk menghapus kursus berdasarkan ID
            $courseModel = new Courses();
            if ($courseModel->deleteCourse($courseId)) {
                // Penghapusan berhasil, arahkan ke halaman daftar kursus
                header('Location: /courses/index');
                exit;
            } else {
                // Jika gagal menghapus, tampilkan pesan error
                echo "Gagal menghapus kursus";
            }
        } else {
            echo "ID kursus tidak valid";
        }
    }
}
?>
