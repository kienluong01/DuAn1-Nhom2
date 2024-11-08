
<!-- Header  -->
 <?php  require_once './views/layout/header.php'; ?>
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
            <h1>Quản lí danh sách thú cưng</h1>
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
                <img style='width:400px; height:400px' src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                  <?php foreach($listAnhSanPham as $key=>$anhSP ):  ?>
                    <div class="product-image-thumb <?= $anhSP[$key ] == 0 ? 'active' : ''?> "><img src="<?= BASE_URL . $anhSP['link_hinh_anh'];  ?>" alt="Product Image"></div>
                  <?php endforeach?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Tên sản phẩm <?= $sanPham['ten_san_pham'] ?></h3>
              <hr>
              <h4 class="mt-3">Giá Tiền:  <small><?= $sanPham['gia_san_pham'] ?></small></h4>
              <h4 class="mt-3">Giá khuyến mãi:  <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
              <h4 class="mt-3">Số lượng:  <small><?= $sanPham['so_luong'] ?></small></h4>
              <h4 class="mt-3">Lượt xem:  <small><?= $sanPham['luot_xem'] ?></small></h4>
              <h4 class="mt-3">Ngày nhập:  <small><?= $sanPham['ngay_nhap'] ?></small></h4>
              <h4 class="mt-3">Danh mục:  <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
              <h4 class="mt-3">Trạng thái:  <small><?= $sanPham['trang_thai']== 1 ?'còn bán' : 'Dừng bán' ?></small></h4>
              <h4 class="mt-3">Mô tả:  <small><?= $sanPham['mo_ta'] ?></small></h4>

            </div>
            </div>


          

        <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist " >
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bình luận</button>
          </li>

        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Quản lí bình luận </a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="container">
                    <table class="table" >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tên người bình luận</th>
                          <th>Nội dung</th>
                          <th>Ngày đăng</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tr>
                        <td>1</td>
                        <td>Nguyễn Văn A</td>
                        <td>Sản phẩm đẹp</td>
                        <td>20/07/2024</td>
                        <td>
                          <div class="btn-group">
                            <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                            <a href=""><button class="btn btn-danger">Xóa</button></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Nguyễn Văn B</td>
                        <td>Sản phẩm đẹp</td>
                        <td>20/07/2024</td>
                        <td>
                          <div class="btn-group">
                            <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                            <a href=""><button class="btn btn-danger">Xóa</button></a>
                          </div>
                        </td>
                      </tr>
                    </table>
                    </div>
            </div>
          </div>
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
  <!-- Footer -->
   <?php
    include './views/layout/footer.php';
   ?>
   <!-- end footer -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
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
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</body>
</html>
