<?php


class HomeController
{
    public $modelSanPham;
    public $modelGioHang;
    public $modelTaiKhoan;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelGioHang = new GioHang();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDonHang = new DonHang();
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

    public function gt(){
        require_once './views/gt.php';
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

    public function thanhToan(){
        if(isset($_SESSION['user_client'])){
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            // lấy dữ liệu giỏ hàng người dùng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);

            if(!$gioHang){
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id'=> $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // var_dump($chiTietGioHang);die();
            }else{
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            }
          
           require_once './views/pay.php';

        }else{
            header('Location:' . BASE_URL . '?act=login');
        }
        require_once './views/pay.php';

    }

    public function postThanhToan(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // var_dump($_POST);die;
           $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
           $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
           $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
           $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
           $ghi_chu = $_POST['ghi_chu'];
           $tong_tien = $_POST['tong_tien'];
           $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

           $ngay_dat = date('Y-m-d');
           $trang_thai_id = 1;
           $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
           $tai_khoan_id = $user['id'];

           $ma_don_hang = "DH" .rand(1000,9999);

           // Thêm thông tin vào db

          $donHang =  $this->modelDonHang->addDonHang($tai_khoan_id,
            $ten_nguoi_nhan,
            $email_nguoi_nhan,
            $sdt_nguoi_nhan,
            $dia_chi_nguoi_nhan,
            $ghi_chu,
            $tong_tien,
            $phuong_thuc_thanh_toan_id,
            $ngay_dat,
            $ma_don_hang,
            $trang_thai_id,
        


        );
          // lấy thông tin giỏ hàng của người dùng
          $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

          // Lưu sản phẩm vào chi tiết đơn hàng
          if($donHang){
            // Lấy ra toàn bộ sản phẩm trong giỏ hàng
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            // Thêm từng sản phẩm từ giỏ hàng vào bảng chi tiết đơn hàng
            foreach( $chiTietGioHang as $item){

                $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; // ưu tiên lấy giá khuyến mãi    

                $this->modelDonHang->addChiTietDonHang(
                    $donHang, // ID ĐƠN HÀNG VỪA TẠO
                    $item['san_pham_id'], // SẢN PHẨM
                    $donGia, // ĐƠN GIÁ
                    $item['so_luong'], // SỐ LƯỢNG
                    $donGia * $item['so_luong'] // THÀNH TIỀN
                );
            }

            // SAU KHI THÊM XONG THÌ PHẢI TIẾN HÀNH XÓA SẢN PHẨM TRONG GIỎ HÀNG
            // XÓA TOÀN BỘ SẢN PHẨM TRONG CHI TIẾT GIỎ HÀNG

            $this->modelGioHang->clearDetailGioHang($gioHang['id']);
            // XÓA THÔNG TIN GIỎ HÀNG NGƯỜI DÙNG
            $this->modelGioHang->clearGioHang($tai_khoan_id);

            // Chuyển hướng về trang lịch sử mua hàng
            header("Location:" . BASE_URL . '?act=lich-su-mua-hang');
            exit;
          }else{
            var_dump('LỖI ĐẶT HÀNG. VUI LÒNG THỬ LẠI SAU');die;
          }
    }

}

public function LichSuMuaHang(){
    if(isset($_SESSION['user_client'])){
    // LẤY THÔNG TIN TÀI KHOẢN ĐĂNG NHẬP
    $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
           $tai_khoan_id = $user['id'];

    // lấy ra danh sách trạng thái đơn hàng

    $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
    $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai','id');
   


    // lấy ra danh sách phương thức thanh toán
    $arrPhuongThucThanhToan = $this->modelDonHang-> getPhuongThucThanhToan();
    $PhuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc','id');
    // lấy ra danh sách tất cả đơn hàng của tài khoản
    $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
    require_once './views/lichSuMuaHang.php';

    }else{
        var_dump('BẠN CHƯA ĐĂNG NHẬP');die;
    }
    
}
public function ChiTietMuaHang(){
    if(isset($_SESSION['user_client'])){
        // LẤY THÔNG TIN TÀI KHOẢN ĐĂNG NHẬP
    $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    $tai_khoan_id = $user['id'];

    // LẤY ID ĐƠN HÀNG TRUYỀN TỪ URL
    $donHangId = $_GET['id'];
    // lấy ra danh sách trạng thái đơn hàng

    $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
    $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai','id');
   


    // lấy ra danh sách phương thức thanh toán
    $arrPhuongThucThanhToan = $this->modelDonHang-> getPhuongThucThanhToan();
    $PhuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc','id');

    // Lấy ra thông tin đơn hàng theo id
    $donHang = $this->modelDonHang->getDonHangById($donHangId);
    
    // lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết đơn hàng
    $chiTietDonHang = $this->modelDonHang->getChiTietDonHangId($donHangId);
    // print_r($donHang);
    // print_r($chiTietDonHang);

    if($donHang['tai_khoan_id'] != $tai_khoan_id){
        echo"Bạn không có quyền truy cập đơn hàng này";
    }

    require_once './views/chiTietMuaHang.php';

        }else{
            var_dump('BẠN CHƯA ĐĂNG NHẬP');die;
        }

}
public function HuyDonHang(){
    if(isset($_SESSION['user_client'])){
        // LẤY THÔNG TIN TÀI KHOẢN ĐĂNG NHẬP
    $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    $tai_khoan_id = $user['id'];

    // LẤY ID ĐƠN HÀNG TRUYỀN TỪ URL
    $donHangId = $_GET['id'];

    // Kiểm tra đơn hàng
    $donHang = $this->modelDonHang->getDonHangById($donHangId);

    if($donHang['tai_khoan_id'] != $tai_khoan_id){
        echo "Bạn không có quyền hủy đơn hàng này";
        exit;
    }
    if($donHang['trang_thai_id'] != 1){
        echo "Chỉ đơn hàng ở trạng thái chưa xác nhận mới có thể hủy";
        exit;
    }

    // HỦY ĐƠN HÀNG
    $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
    header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
            exit;

        }else{
            var_dump('BẠN CHƯA ĐĂNG NHẬP');die;
        }
}




    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        // var_dump($listSanPhamCungDanhMuc);
        die;
        if ($sanPham) {
            require_once './views/detail.php';
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

}
