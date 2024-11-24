<?php


class HomeController
{
    public $modelSanPham;
    public $modelGioHang;
    public $modelTaiKhoan;

    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelGioHang = new GioHang();
        $this->modelTaiKhoan = new TaiKhoan();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function contact()
    {


        require_once './views/contact.php';
    }

    public function addGioHang(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            if(isset($_SESSION['user_client'])){
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                // lấy dữ liệu giỏ hàng người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if($gioHang){
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id'=> $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getChiTiet->getDetailGioHang($gioHang['id']);
                }else{
                    
                    $chiTietGioHang = $this->modelGioHang->getChiTiet->getDetailGioHang($gioHang['id']);

                }
                // var_dump($mail['id']);die;
             


                $sanPhamId = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checksanPham = false;

                foreach($chiTietGioHang as $detail){
                    if($detail['san_pham_id'] == $san_pham_id){
                        $newSoLuong = $detail['so_luong'] + $so_luong;

                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checksanPham = true;
                        break;

                    }
                }
                if($checksanPham){
                    $this->modelGioHang->addDetailGioHang($gioHang['id'],$san_pham_id, $so_luong);
                }
                // var_dump('Thêm giỏ hàng thành công');die;
                header("Location:" . BASE_URL . 'act=gio-hang');


            }else{
                var_dump('Chưa đăng nhập');die;
            }


        }   
    }


    public function gioHang(){
        if(isset($_SESSION['user_client'])){
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            // lấy dữ liệu giỏ hàng người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

            if(!$gioHang){
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id'=> $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // var_dump($chiTietGioHang);die();
            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }
            // var_dump($chiTietGioHang);die;
           require_once './views/cart.php';

        }else{
            header('Location:' . BASE_URL . '?act=login');
        }
    }

}