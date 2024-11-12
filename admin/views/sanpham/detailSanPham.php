<!-- Header -->
<?php
include './views/layout/header.php';
?>
<!-- Navbar -->
<?php
include './views/layout/navbar.php';
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php
include './views/layout/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý danh sách sản phẩm</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <div class="col-12">
              <img style="width: 500px; height: 500px;"
                src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image"
                alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs">
              <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
              <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img
                    src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image">
                </div>
              <?php endforeach ?>
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?></h3>
            <hr>
            <h4 class="mt-3">Giá tiền: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
            <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
            <h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h4>
            <h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
            <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
            <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
            <h4 class="mt-3">Trạng thái:
              <small><?= $sanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></small>
            </h4>
            <h4 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta'] ?></small></h4>

          </div>
        </div>
        <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
              type="button" role="tab" aria-controls="home" aria-selected="true">Bình luận của sản
              phẩm</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên người bình luận</th>
                  <th>Nội dung</th>
                  <th>Ngày đăng</th>
                  <th>Thao tác</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              </form>
              <?php foreach ($listBinhLuan as $key => $binhLuan) { ?>
                          <tr>
                            <td><?= $key + 1 ?></td>
                            <td><a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                            <td><?= $binhLuan['noi_dung'] ?></td>
                            <td><?= $binhLuan['ngay_dang'] ?></td>
                            <td>
                              <form action="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan' ?>" method="POST">
                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
       
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn xóa bình luận này không?')">
                                      Xóa
                                    </button>
                                    
                                  </a>
                                 

                                </div>

                              </form>

                            </td>
                          </tr> 
                        <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- //Footer -->
<?php
include './views/layout/footer.php';
?>
<!-- //End Footer -->
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
<!-- Code injected by live-server -->

</body>

</html>