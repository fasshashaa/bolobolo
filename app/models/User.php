
<?php
// app/models/User.php
require_once '../config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllUsers() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM users WHERE id_user = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }


    public function add($name, $email, $password, $peran) {
        $query = $this->db->prepare("INSERT INTO users (name, email, password, peran) VALUES (:name, :email, :password, :peran)");
        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':peran', $peran);

        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        $query = "UPDATE users SET name = :name, email = :email, password = :password, peran = :peran WHERE id_user = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':peran', $data['peran']);

        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM users WHERE id_user = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
