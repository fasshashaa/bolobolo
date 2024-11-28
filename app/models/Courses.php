<?php
require_once '../config/database.php';

class Courses {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    /**
     * Mendapatkan semua data kursus.
     *
     * @return array
     */
    public function getAllCourses() {
        try {
            $query = "
                SELECT 
                    courses.id_courses,
                    courses.judul_kursus,
                    courses.deskripsi,
                    users.name AS instruktur,
                    courses.durasi
                FROM 
                    courses
                INNER JOIN 
                    users
                ON 
                    courses.id_instruktur = users.id_user
            ";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching courses: " . $e->getMessage());
        }
    }

    /**
     * Menambahkan kursus baru.
     *
     * @param string $judul_kursus
     * @param string $deskripsi
     * @param int $id_instruktur
     * @param int $durasi
     * @return bool
     */
    public function addCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi) {
        try {
            $query = "INSERT INTO courses (judul_kursus, deskripsi, id_instruktur, durasi) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$judul_kursus, $deskripsi, $id_instruktur, $durasi]);
        } catch (PDOException $e) {
            die("Error adding course: " . $e->getMessage());
        }
    }

    /**
     * Memperbarui data kursus berdasarkan ID.
     *
     * @param int $id
     * @param string $judul_kursus
     * @param string $deskripsi
     * @param int $id_instruktur
     * @param int $durasi
     * @return bool
     */
    public function updateCourse($id, $judul_kursus, $deskripsi, $id_instruktur, $durasi) {
        try {
            $query = "
                UPDATE courses 
                SET judul_kursus = ?, deskripsi = ?, id_instruktur = ?, durasi = ?
                WHERE id_courses = ?
            ";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$judul_kursus, $deskripsi, $id_instruktur, $durasi, $id]);
        } catch (PDOException $e) {
            die("Error updating course: " . $e->getMessage());
        }
    }

    /**
     * Menghapus kursus berdasarkan ID.
     *
     * @param int $id_courses
     * @return bool
     */
    public function deleteCourse($courseId) {
        // Logika untuk menghapus kursus dari database
        $query = "DELETE FROM courses WHERE id_courses = :id_courses";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_courses', $courseId);
        return $stmt->execute();
    }

    /**
     * Mendapatkan data kursus berdasarkan ID.
     
     * @param int $courseId
     * @return array|null
     */
    public function getCourseById($courseId) {
        try {
            // Validasi ID
            if (!is_numeric($courseId)) {
                throw new InvalidArgumentException("Invalid course ID.");
            }

            $query = "
                SELECT 
                    courses.id_courses,
                    courses.judul_kursus,
                    courses.deskripsi,
                    courses.id_instruktur,
                    courses.durasi
                FROM 
                    courses
                WHERE 
                    id_courses = ?
            ";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$courseId]);
            $course = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$course) {
                throw new Exception("Course not found with ID: $courseId");
            }

            return $course;
        } catch (PDOException $e) {
            die("Error fetching course by ID: " . $e->getMessage());
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getInstructors() {
        $query = "SELECT id_user, name FROM users WHERE peran = 'instruktur'";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
