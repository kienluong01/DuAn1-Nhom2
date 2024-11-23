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
        require_once('./views/login.php');
        deleteSessionErrors();
        exit();
    }
    public function postLogin()
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
                $_SESSION['thongBaoDN'] = 'Đăng nhập thành công';
                $_SESSION['user_client'] = $user;
                header('Location: ' . BASE_URL . '?act=/' );
                exit();
            } else {
                //Lỗi thì lưu vào session
                $_SESSION['errors'] = $user;
                // var_dump($_SESSION['error']);
                // die;
                $_SESSION['falsh'] = true;  

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function formDangKy()
    {
        require_once('./views/register.php');
        deleteSessionErrors();
        exit();
    }

    public function dangKy()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy ra dữ liệu
        $ho_ten = $_POST['ho_ten'] ?? '';
        $email = $_POST['email'] ?? '';
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $mat_khau = $_POST['mat_khau'] ?? '';

        $chuc_vu = 2;

        $_SESSION['old_data'] = array(
            'ho_ten' => $_POST['ho_ten'],       
            'email' => $_POST['email'],
            'so_dien_thoai' => $_POST['so_dien_thoai'],
            'mat_khau' => $_POST['mat_khau'],
        );

        // Tạo mảng chứa lỗi
        $errors = [];
        if (empty($ho_ten)) {
            $errors['ho_ten'] = 'Họ tên không được để trống';
        }
        if (empty($email)) {
            $errors['email'] = 'Email không được để trống';
        }
        if (empty($so_dien_thoai)) {
            $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
        }
        if (empty($mat_khau)) {
            $errors['mat_khau'] = 'Mật khẩu không được để trống';
        }

        $_SESSION['errors'] = $errors;

        if (empty($errors)) {
            $tai_khoan = $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $so_dien_thoai, $mat_khau, $chuc_vu);
            $_SESSION['thongBao'] = 'Đăng ký thành công. Vui lòng đăng nhập để mua hàng và bình luận';
            
            // Thêm đoạn JavaScript để hiển thị thông báo
            $_SESSION['alert'] = 'success'; 

            header("Location: " . BASE_URL . '?act=form-dang-ki');
            exit();
        } else {
            $_SESSION['flash'] = true;
            $_SESSION['thongBao'] = 'Đăng ký thất bại';

            // Thêm đoạn JavaScript để hiển thị thông báo lỗi
            $_SESSION['alert'] = 'error'; 

            header("Location: " . BASE_URL . '?act=form-dang-ki');
            exit();
        }
    }
}
public function logout()
{
    
    if (isset($_SESSION['user_client'])) {
        $_SESSION['thongBao'] = 'Đăng xuất thành công';
        unset($_SESSION['user_client']);
        header('Location:' . BASE_URL);
    }
}
public function quenMatKhau()
    {
        $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';
        $thongTin = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
        // var_dump($thongTin);die();
        require_once './views/QuenMatKhau.php';
        deleteSessionErrors();
    }

    public function layMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl

            $email = $_POST['email'] ?? '';

            $checkEmail = $this->modelTaiKhoan->checkEmail($email);
            // var_dump($checkEmail);die();

            // var_dump($checkEmail['mat_khau']);die();

            if (is_array($checkEmail)) {
                //     $_SESSION['user_id'] = $checkUser[0]['id'];
                $_SESSION['layMk'] = 'Mật khẩu của bạn là: ' . $checkEmail[0]['mat_khau'];

                header('Location:' . BASE_URL . '?act=quen-mat-khau');
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['layMk'] = 'Email không tồn tại';

                header('Location:' . BASE_URL . '?act=quen-mat-khau');
            }
        }
    }
    public function suaTaiKhoan()
    {
        $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';  
    $thongTin = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
   
    // var_dump($tai_khoan_id);die;
        require_once './views/SuaTTTK.php';
        deleteSessionErrors();
    }
    public function suaThongTinCaNhan()
    {
        // xử lý form nhập
        //var_dump($_POST);
        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ho_ten = $_POST['ho_ten'] ?? '';

            // Truy vấn 

            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $_SESSION['ho_ten'] = $ho_ten ?? '';
            $_SESSION['email'] = $email ?? '';


            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['errors'] = $errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateTaiKhoan($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $dia_chi);

                if ($status) {
                    $_SESSION['successTt'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location: " . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }
    public function suaMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];


            $user  = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);

            //  var_dump($user['mat_khau']);
            //  var_dump($old_pass);
            $errors = [];
            if ($old_pass !== $user['mat_khau']) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Mật khẩu cũ không được để trống';
            }

            if (empty($new_pass)) {
                $errors['new_pass'] = 'Mật khẩu mới không được để trống';
            }

            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không được để trống';
            }
            $_SESSION['errors'] = $errors;
            if (!$errors) {
                // $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->updateMatKhau($user['id'], $new_pass);
                // var_dump($status);die();
                if ($status) {
                    $_SESSION['successMk'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;

                    header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
                }
            } else {
                // Lỗi thì lưu lỗi vào session
                //    $_SESSION['errors'] = $user;
                //    var_dump($_SESSION['errors']);die();

                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }

    public function suaAnhTaiKhoan()
    {
        // xử lý form nhập
        //var_dump($_POST);
        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $tai_khoan_id = $_POST['tai_khoan_id'];


            $thongTinCu = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
            // var_dump($thongTinCu);die();
            $anh_cu = $thongTinCu['anh_dai_dien'];
            // var_dump($anh_cu);die();

            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;



            // Logic sửa ảnh
            if (isset($anh_dai_dien)) {
                // upload file ảnh mới lên
                $new_file = uploadFile($anh_dai_dien, './uploads');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $anh_cu;
            }

            // Nếu k có lỗi thì thêm anh
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateAnhDaiDien($tai_khoan_id, $new_file);
                // var_dump($status);die();

                if ($status) {
                    $_SESSION['successAnh'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');

                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');

                exit();
            }
        }
    }


}

?>