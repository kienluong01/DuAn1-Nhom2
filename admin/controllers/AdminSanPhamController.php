<?php
class AdminSanPhamController {
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct() {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function danhSachSanPham() {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham() {
        // Hiển thị form nhập
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
        // Xóa session lỗi sau khi load trang
        deleteSessionError();
    }

      public function postAddSanPham()
    {
        // Kiểm tra xem phương thức yêu cầu có phải là POST không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ POST
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // Upload hình ảnh sản phẩm
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            // Upload album hình ảnh
            $img_array = $_FILES['img_array'];


            // Kiểm tra và lưu lỗi vào session
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phải được chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phải được chọn';
            }
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Phải chọn ảnh sản phẩm';
            }
            $_SESSION['errors'] = $errors;


            if (!empty($errors)) {
                // var_dump($errors);die;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }

            // Nếu không có lỗi, tiến hành thêm sản phẩm vào CSDL

            $san_pham_id = $this->modelSanPham->insertSanPham(
                $ten_san_pham,
                $gia_san_pham,
                $gia_khuyen_mai,
                $so_luong,
                $ngay_nhap,
                $danh_muc_id,
                $trang_thai,
                $mo_ta,
                $file_thumb
            );

            if (!empty($img_array['name'])) {
                foreach ($img_array['name'] as $key => $value) {
                    $file = [
                        'name' => $img_array['name'][$key],
                        'type' => $img_array['type'][$key],
                        'tmp_name' => $img_array['tmp_name'][$key],
                        'error' => $img_array['error'][$key],
                        'size' => $img_array['size'][$key]
                    ];
                    $link_hinh_anh = uploadFile($file, './uploads/');
                    // var_dump($link_hinh_anh);die;
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                }
            }
            // Chuyển hướng sau khi thêm sản phẩm thành công
            header("location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }



    public function formEditSanPham() {
        // Hiển thị form sửa sản phẩm
        $id = $_GET['id_san_pham'];
        $sanPham =  $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        
        // Kiểm tra nếu không tìm thấy sản phẩm, chuyển hướng về trang danh sách sản phẩm
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }


    public function postEditSanPham() {
        // Kiểm tra xem phương thức yêu cầu có phải là POST không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ POST
            // lấy dữ liệu cũ của sản phẩm
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // truy vấn
            $sanPhamOld =$this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file=$sanPhamOld['hinh_anh'];// lấy ảnh cũ để phục vụ cho sửa ảnh



            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            
            $hinh_anh = $_FILES['hinh_anh'] ?? null;


            

            // Kiểm tra và lưu lỗi vào session
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phải được chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phải được chọn';
            }
            
            $_SESSION['error'] = $errors;
            
            

            // logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK){
                // upload ảnh mới lên
                $new_file = uploadFile($hinh_anh, './uploads/');
                if( !empty($old_file)){// neu có ảnh cũ thì xoa đi
                    // chưa sửa lỗi...
                
                    // delete($old_file);
                }


            }else{
                $new_file= $old_file;
            }
            // Nếu không có lỗi, tiến hành thêm sản phẩm vào CSDL
            if (empty($errors)) {
             $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );

                // Chuyển hướng sau khi thêm sản phẩm thành công
                header("location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // Nếu có lỗi, lưu lỗi vào session và chuyển hướng về form thêm sản phẩm
                
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }

    // sửa album ảnh

    public function postEditAnhSanPham (){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $san_pham_id = $_POST['san_pham_id' ]?? '' ;

                // lấy danh sách ảnh hiện  hiện tại của sản phẩm
                $listAnhSanPhamCurrent = $this ->modelSanPham->getListAnhSanPham($san_pham_id);
                
                // sử lí các ảnh
                $img_array = $_FILES['img_array'];
                $img_delete=isset($_POST['img_delete']) ? explode(',',$_POST['img_delete']): [] ;
                $current_img_ids = $_POST['current_img_ids'] ?? [];

                // khai báo mảng để lưu ảnh mới hoặc thay thế ảnh cũ
                $upload_file = [];
                // upload ảnh mới hoặ thay thế ảnh cũ
                foreach($img_array['name'] as $key =>$value){
                    if($img_array['error'][$key]== UPLOAD_ERR_OK){
                        $new_file =uploadFileAlbum($img_array, './uploads/', $key);
                        if ($new_file ){
                            $upload_file[] = [
                                'id' =>$current_img_ids[$key] ?? null,
                                'file' => $new_file
                            ];
                        }

                    }
                }
                //lưu ảnh mới vào db và xóa ảnh cũ nếu có
                foreach ($upload_file as $file_info){
                    if($file_info['id']){
                        $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                        // cập nhật ảnh cũ
                        $this ->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                        //xóa ảnh cũ
                        deleteFile($old_file);
                        
                    }else {
                        // thêm ảnh mới
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                    }

                }

                // xử lí xóa ảnh
                foreach ($listAnhSanPhamCurrent as $anhSP){
                    $anh_id = $anhSP['id'];
                    if(in_array($anh_id, $img_delete)){
                        //xóa ảnh trong đb
                        $this->modelSanPham->destroyAnhSanPham($anh_id);

                        //xóa file
                        deleteFile($anhSP['link_hinh_anh']);



                    }
                }
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
                

    } 


    public function deleteSanPham(){
        $id=$_GET['id_san_pham'];
        $sanPham =  $this ->modelSanPham->getDetailSanPham($id);

         $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        
        if($sanPham){
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);

        }

        if ($listAnhSanPham){
            foreach ($listAnhSanPham as $key =>$anhSP){
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
        }
        header("location: ". BASE_URL_ADMIN . '?act=san-pham');
                exit();
        
     }



     public function detailSanPham() {
        
        $id = $_GET['id_san_pham'];
        $sanPham =  $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
      
        
        // Kiểm tra nếu không tìm thấy sản phẩm, chuyển hướng về trang danh sách sản phẩm
        if ($sanPham) {
            require_once './views/sanpham/detailSanPham.php';
            
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }


  
    
    

}


?>