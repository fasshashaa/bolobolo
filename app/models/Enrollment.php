<?php
// app/models/enrollment.php
require_once '../config/database.php';

class Enrollment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // app/models/Enrollment.php

    public function getAllUsers() {
        // Ensure database connection is valid
        if (!$this->db) {
            throw new Exception("Database connection failed");
        }
        $query = $this->db->query("SELECT id_user, name FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCourses() {
        $query = $this->db->query("SELECT id_courses, judul_kursus FROM courses");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllPeserta() {
        $query = $this->db->query("SELECT * FROM enrollments");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM enrollments WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($peserta, $kursus, $tanggal_daftar) {
        $query = $this->db->prepare("INSERT INTO enrollments (peserta, kursus, tanggal_daftar) VALUES (:peserta, :kursus, :tanggal_daftar)");
        $query->bindParam(':peserta', $peserta);
        $query->bindParam(':kursus', $kursus);
        $query->bindParam(':tanggal_daftar', $tanggal_daftar);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        // Validasi data
        if (empty($data['peserta']) || empty($data['kursus']) || empty($data['tanggal_daftar'])) {
            throw new Exception("Peserta, kursus, dan tanggal daftar tidak boleh kosong.");
        }
    
        // Update query
        $query = "UPDATE enrollments SET peserta = :peserta, kursus = :kursus, tanggal_daftar = :tanggal_daftar WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':peserta', $data['peserta'], PDO::PARAM_STR);
        $stmt->bindParam(':kursus', $data['kursus'], PDO::PARAM_STR);
        $stmt->bindParam(':tanggal_daftar', $data['tanggal_daftar'], PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM enrollments WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

