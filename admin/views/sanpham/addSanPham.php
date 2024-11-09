<!-- Header  -->
<?php require_once './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí danh sách sản phầm</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thêm Sản Phẩm</h3>
            </div>


            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
              <div class="row card-body ">
                <div class="form-group col-12">
                  <label>Tên Sản phảm</label>
                  <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                  <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Giá sản phẩm</label>
                  <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Giá khuyến mãi</label>
                  <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                  <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Hình ảnh</label>
                  <input type="file" class="form-control" name="hinh_anh" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Album ảnh</label>
                  <input type="file" class="form-control" name="img_array[]" multiple>

                </div>

                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Số Lượng</label>
                  <input type="number" class="form-control" name="so_luong" placeholder="Nhập giá khuyến mãi">
                  <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label for="exampleInputEmail1">Ngày Nhập</label>
                  <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                    <option selected disabled>chọn danh mục sản phẩm</option>
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                      <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>

                    <?php endforeach ?>
                  </select>
                  <?php if (isset($_SESSION['errors']['danh_muc_id'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Trạng thái</label>
                  <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                    <option selected disabled>chọn danh mục sản phẩm</option>
                    <option value="1">Còn bán</option>
                    <option value="2">Ngừng bán</option>
                  </select>
                  <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group col-12">
                  <label for="">Mô tả</label>
                  <textarea name="mo_ta" id="" class="form-control" placeholder="nhập mô tả"></textarea>
                </div>



              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

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
<!-- Footer -->
<?php
include './views/layout/footer.php';
?>

<!-- Code injected by live-server -->
<script>
  // <![CDATA[  <-- For SVG support
  if ('WebSocket' in window) {
    (function() {
      function refreshCSS() {
        var sheets = [].slice.call(document.getElementsByTagName("link"));
        var head = document.getElementsByTagName("head")[0];
        for (var i = 0; i < sheets.length; ++i) {
          var elem = sheets[i];
          var parent = elem.parentElement || head;
          parent.removeChild(elem);
          var rel = elem.rel;
          if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
          }
          parent.appendChild(elem);
        }
      }
      var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
      var address = protocol + window.location.host + window.location.pathname + '/ws';
      var socket = new WebSocket(address);
      socket.onmessage = function(msg) {
        if (msg.data == 'reload') window.location.reload();
        else if (msg.data == 'refreshcss') refreshCSS();
      };
      if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
        console.log('Live reload enabled.');
        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
      }
    })();
  } else {
    console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
  }
  // ]]>
</script>
</body>

</html>