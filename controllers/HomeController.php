<?php


class HomeController
{
    public $modelSanPham;

    public function __construct(){
        $this->modelSanPham = new SanPham();
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
}