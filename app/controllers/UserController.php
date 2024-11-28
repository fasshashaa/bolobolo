<?php
// app/controllers/UserController.php
require_once '../app/models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once '../app/views/user/index.php';

    }

    public function create() {
        require_once '../app/views/user/create.php';
    }

    public function store() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $peran = $_POST['peran'];
        $this->userModel->add($name, $email, $password, $peran);
        header('Location: /user/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $user = $this->userModel->find($id); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/user/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->userModel->update($id, $data);
        if ($updated) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->userModel->delete($id);
        if ($deleted) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}