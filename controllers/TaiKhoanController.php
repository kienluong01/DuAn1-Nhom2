<?php

class TaiKhoanController
{
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }



    public function formLogin()
    {
        require_once './views/login.php';
        deleteSessionErrors();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($password);
            // die();
            //Xử lý kiểm tra thông tin đăng nhập

            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if ($user == $email) {
                //trường hợp đăng nhập thành công
                //lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header('Location: ' . BASE_URL);
                exit();
            } else {
                //Lỗi thì lưu vào session
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);
                // die;
                $_SESSION['falsh'] = true;  

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }


}

?>