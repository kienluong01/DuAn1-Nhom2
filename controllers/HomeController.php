<?php


class HomeController
{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function home()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function contact()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/contact.php';
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        // var_dump($listAnhSanPham);
        // die;
        if ($sanPham) {
            require_once './views/detail.php';
        } else {
            header('location: ' . BASE_URL);
            exit();
        }
    }
    public function danhSachDanhMuc()
    {
        // var_dump($category);
        // die;
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/category.php';
    }
    public function danhMuc()
    {
        $category = $_GET['id'];
        // var_dump($category);
        // die;
        if ($category) {

            $listSanPham = $this->modelSanPham->getAllSanPhamDanhMuc($category);
        } else {
            $listSanPham = $this->modelSanPham->getAllSanPham();
        }
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        require_once './views/category.php';
    }
    public function gioiThieu()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/gt.php';
    }
}
