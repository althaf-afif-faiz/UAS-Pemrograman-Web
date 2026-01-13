<?php
class AuthController extends Controller {
    public function index() {
        $data['title'] = 'Login - Toko HP';
        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $user = $this->model('UserModel')->getUserByUsername($username);

        if($user) {
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            
            if($user['role'] == 'admin') {
                header('Location: ' . BASEURL . '/dashboard');
            } else {
                header('Location: ' . BASEURL . '/home');
            }
        } else {
            header('Location: ' . BASEURL);
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASEURL);
    }
}