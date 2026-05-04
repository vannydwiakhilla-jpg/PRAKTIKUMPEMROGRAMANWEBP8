<?php
class Auth {
    private $db;

    public function __construct($db){
        $this->db = $db->conn;
    }

    public function index(){
        include __DIR__ . '/../views/auth/login.php';
    }

    public function login(){
        $u = $_POST['username'] ?? '';
        $p = md5($_POST['password'] ?? '');

        $stmt = $this->db->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss",$u,$p);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user){
            $_SESSION['login'] = true;
            redirect_to('dashboard');
        } else {
            $_SESSION['flash_error'] = 'Username atau password salah!';
            redirect_to('auth');
        }
    }

    public function register(){
        include __DIR__ . '/../views/auth/register.php';
    }

    public function proses_register(){
        $u = $_POST['username'] ?? '';
        $p = md5($_POST['password'] ?? '');

        if (!$u || !$p){
            $_SESSION['flash_error'] = 'Isi semua field!';
            redirect_to('register');
        }

        // check unique
        $check = $this->db->prepare("SELECT id FROM users WHERE username=?");
        $check->bind_param("s",$u);
        $check->execute();
        if ($check->get_result()->num_rows > 0){
            $_SESSION['flash_error'] = 'Username sudah digunakan!';
            redirect_to('register');
        }

        $stmt = $this->db->prepare("INSERT INTO users (username,password) VALUES (?,?)");
        $stmt->bind_param("ss",$u,$p);
        $stmt->execute();

        $_SESSION['flash_success'] = 'Register berhasil! Silakan login.';
        redirect_to('dashboard/home');
    }

    public function logout(){
        session_destroy();
        redirect_to('auth');
    }
}
