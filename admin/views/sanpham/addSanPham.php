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
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm Sản Phẩm</h3>
            </div>


            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST"
              enctype="multipart/form-data">
              <div class="row card-body">
                <div class="form-group col-12">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="ten_san_pham"
                    placeholder="Nhập tên sản phẩm">
                  <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['ten_san_pham'] ?></p>
                  <?php
                  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá tiền sản phẩm</label>
                  <input type="number" class="form-control" name="gia_san_pham"
                    placeholder="Nhập giá tiền sản phẩm">
                  <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['gia_san_pham'] ?></p>
                  <?php
                  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá khuyến mãi sản phẩm</label>
                  <input type="number" class="form-control" name="gia_khuyen_mai"
                    placeholder="Nhập giá khuyến mãi sản phẩm">
                  <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['gia_khuyen_mai'] ?>
                    </p>
                  <?php
                  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Hình ảnh sản phẩm</label>
                  <input type="file" class="form-control" name="hinh_anh"
                    placeholder="Chọn hình ảnh sản phẩm">
                  <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['hinh_anh'] ?></p>
                  <?php
                  } ?>
                </div>
                <div class="form-group col-6">
                  <label>Album ảnh sản phẩm</label>
                  <input type="file" class="form-control" name="img_array[]" multiple>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng sản phẩm</label>
                  <input type="number" class="form-control" name="so_luong"
                    placeholder="Nhập số lượng sản phẩm">
                  <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['so_luong'] ?></p>
                  <?php
                  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Ngày nhập sản phẩm</label>
                  <input type="date" class="form-control" name="ngay_nhap"
                    placeholder="Nhập ngày nhập sản phẩm">
                  <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['ngay_nhap'] ?></p>
                  <?php
                  } ?>
                </div>

                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select name="danh_muc_id" id="exampleFormControlSelect"
                    class="form-control">
                    <option selected disabled>Chọn danh mục sản phẩm</option>
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                      <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?>
                      </option>
                    <?php endforeach ?>

                  </select>
                  <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['danh_muc_id'] ?></p>
                  <?php
                  } ?>
                </div>


                <div class="form-group col-12">
                  <label>Trạng thái</label>
                  <select name="trang_thai" id="exampleFormControlSelect"
                    class="form-control">
                    <option selected disabled>Chọn trạng thái sản phẩm</option>
                    <option value="1">Còn hàng</option>
                    <option value="2">Hết hàng</option>


                  </select>
                  <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error']['trang_thai'] ?></p>
                  <?php
                  } ?>
                </div>

                <div class="form-group col-12">
                  <label>Mô tả danh mục</label>
                  <textarea name="mo_ta" id="" class="form-control"
                    placeholder="Nhập mô tả"></textarea>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- //Footer -->
<?php
include './views/layout/footer.php';
?>

</body>

</html>