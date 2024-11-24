<?php 
class DonHang{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addDonHang($tai_khoan_id,
    $ten_nguoi_nhan,
    $email_nguoi_nhan,
    $sdt_nguoi_nhan,
    $dia_chi_nguoi_nhan,
    $ghi_chu,
    $tong_tien,
    $phuong_thuc_thanh_toan_id,
    $ngay_dat,
    $ma_don_hang,
    $trang_thai_id){

        try{
            $sql = 'INSERT INTO don_hangs (tai_khoan_id,
    ten_nguoi_nhan,
    email_nguoi_nhan,
    sdt_nguoi_nhan,
    dia_chi_nguoi_nhan,
    ghi_chu,
    tong_tien,
    phuong_thuc_thanh_toan_id,
    ngay_dat,
    ma_don_hang,
    trang_thai_id) 
    
    VALUES (:tai_khoan_id,
    :ten_nguoi_nhan,
    :email_nguoi_nhan,
    :sdt_nguoi_nhan,
    :dia_chi_nguoi_nhan,
    :ghi_chu,
    :tong_tien,
    :phuong_thuc_thanh_toan_id,
    :ngay_dat,
    :ma_don_hang,
    :trang_thai_id)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':tai_khoan_id'=>$tai_khoan_id,
                ':ten_nguoi_nhan'=>$ten_nguoi_nhan,
                ':email_nguoi_nhan'=>$email_nguoi_nhan,
                ':sdt_nguoi_nhan'=>$sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan'=>$dia_chi_nguoi_nhan,
                ':ghi_chu'=>$ghi_chu,
                ':tong_tien'=>$tong_tien,
                ':phuong_thuc_thanh_toan_id'=>$phuong_thuc_thanh_toan_id,
                ':ngay_dat'=>$ngay_dat,
                ':ma_don_hang'=>$ma_don_hang,
                ':trang_thai_id'=>$trang_thai_id,

            ]);

            return $this->conn->lastInsertId(); 
        }catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }

    public function addChiTietDonHang($donHangid,$sanPhamId,$donGia,$soLuong,$thanhTien) {
        try {
            $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien)
            VALUES (:don_hang_id,:san_pham_id,:don_gia,:so_luong,:thanh_tien)
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id'  =>$donHangid,
                ':san_pham_id'  =>$sanPhamId,
                ':don_gia'      =>$donGia,
                ':so_luong'     =>$soLuong,
                ':thanh_tien'   =>$thanhTien
            ]);
            return true;
        } catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }
    public function getDonHangFromUser($taiKhoanId) {
        try {
            $sql = "SELECT * FROM don_hangs WHERE tai_khoan_id = :tai_khoan_id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id'  => $taiKhoanId
            ]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }
    public function getTrangThaiDonHang() {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }
    public function getPhuongThucThanhToan() {
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";

            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

        
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }
    public function getDonHangById($donHangid) {
        try {
            $sql = "SELECT * FROM don_hangs WHERE id = :id";

            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=> $donHangid]);

        
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }
    public function updateTrangThaiDonHang ($donHangid, $trangThaiId) {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id  '=> $trangThaiId,
                ':id'             => $donHangid
        ]);
            return true;
        } catch(Exception $e){
            echo "LỖI" . $e->getMessage();
        }
    }

    

    










}




?>