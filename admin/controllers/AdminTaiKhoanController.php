<?php

class AdminTaiKhoanController{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan(); 
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once './views/taikhoan/quantri/listQuanTri.php';
        
    }

    public function formAddQuanTri(){
        require_once './views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }


    public function postAddQuanTri()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
          
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            $_SESSION['errors'] = $errors;

            // Nếu k có lỗi thì thêm danh mục
            if (empty($errors)) {
                // Đặt pass mặc định

                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
                // var_dump($email); die();

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // trả lỗi
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }
    public function formEditQuanTri()
    {
        $quan_tri_id = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($quan_tri_id);

        require_once "./views/taikhoan/quantri/editQuanTri.php";
        deleteSessionErrors();
    }


    public function postEditQuanTri(){

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            // Truy vấn 

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
          // Đặt giá trị mặc định cho các trường
            $trang_thai_id =  $_POST['trang_thai_id'] ?? '';
          
            // Tạo 1 mảng trống để chứa dl
            $errors =[];
            if(empty($ho_ten)){
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if(empty($email)){
                $errors['email'] = 'Email không được để trống';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

           $_SESSION['errors'] =$errors;

            if(empty($errors)){
              $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id,$ho_ten,$email,$so_dien_thoai,$trang_thai);
              //  var_dump($san_pham_id);die;
                header("Location: ". BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            }else{
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: ". BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri='.$quan_tri_id);
                exit();
            }
        }   
    }

    public function resertPassword(){
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailtaiKhoan($tai_khoan_id);
        $password = password_hash('123@123ab',PASSWORD_BCRYPT);
       $status = $this->modelTaiKhoan->resertPassword($tai_khoan_id, $password);
       if($status && $tai_khoan['chuc_vu_id'] == 1){
        header("Location: ". BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
       }elseif($status && $tai_khoan['chuc_vu_id'] == 2){
        header("Location: ". BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
       }
       
       else{
        var_dump('lỗi khi resert tài khoản');die;
       }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);

        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang(){
        $id_khach_hang= $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($quanTri);die;
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        // deleteSessionError();
    }

    public function postEditKhachHang(){

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            // Truy vấn 

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
          // Đặt giá trị mặc định cho các trường
            $trang_thai_id =  $_POST['trang_thai_id'] ?? '';
          
            // Tạo 1 mảng trống để chứa dl
            $errors =[];
            if(empty($ho_ten)){
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if(empty($email)){
                $errors['email'] = 'Email không được để trống';
            }
            if(empty($ngay_sinh)){
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if(empty($gioi_tinh)){
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

           $_SESSION['errors'] =$errors;

            if(empty($errors)){
              $this->modelTaiKhoan->updateKhachHang($khach_hang_id,$ho_ten,$email,$so_dien_thoai,$ngay_sinh,$gioi_tinh,$dia_chi,$trang_thai);
              //  var_dump($san_pham_id);die;
                header("Location: ". BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            }else{
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: ". BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang='.$khach_hang_id);
                exit();
            }
        }   
    }

    public function detailKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }


}

?>