<<<<<<< HEAD


<!-- Header  -->
<?php require_once './views/layout/header.php'; ?>
=======
<!-- Header -->
<?php
include './views/layout/header.php';
?>
>>>>>>> ae25908c17ded44e10f12960e19ce186aa382db4
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
          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                <button class="btn btn-success">Thêm sản phẩm mới</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
<<<<<<< HEAD

=======
>>>>>>> ae25908c17ded44e10f12960e19ce186aa382db4
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
<<<<<<< HEAD

                  </thead>
                  <tbody>
                    <?php foreach($listSanPham as $key =>$sanPham): ?>
                  <tr>
                    <td><?=$key+1?></td>
                    <td><?=$sanPham['ten_san_pham'] ?></td>
                    <td>
                      <img src="<?=BASE_URL. $sanPham['hinh_anh'] ?>" style="width:100px" alt=""
                      onerror="this.onerror=null;this.src='https://th.bing.com/th?id=OIP.31nBttiCoBuGH3sYvN65iwAAAA&w=288&h=216&c=8&rs=1&qlt=90&o=6&dpr=1.5&pid=3.1&rm=2'"
                      >
                    </td>
                    <td><?=$sanPham['gia_san_pham'] ?></td>
                    <td><?=$sanPham['so_luong'] ?></td>
                    <td><?=$sanPham['ten_danh_muc'] ?></td>
                    <td><?=$sanPham['trang_thai']==1 ? 'còn bán ':'Dừng bán'; ?></td>
                    
                    <td>
                      <div class="btn-group">
                        <a href="<?=BASE_URL_ADMIN .'?act=chi-tiet-san-pham&id_san_pham= '.$sanPham['id'] ?>">
                         <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                        </a>
                        <a href="<?=BASE_URL_ADMIN .'?act=form-sua-san-pham&id_san_pham= '.$sanPham['id'] ?>">
                         <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                        </a>
                        <a href="<?=BASE_URL_ADMIN .'?act=xoa-san-pham&id_san_pham= '.$sanPham['id'] ?>" onclick="return confirm('bạn có đồng ý xóa hay không?')">
                          <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </a>
                      </div>
                     
                    </td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                     <th>STT</th>
=======
>>>>>>> ae25908c17ded44e10f12960e19ce186aa382db4
                </thead>
                <tbody>
                  <?php foreach ($listSanPham as $key => $sanPham) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $sanPham['ten_san_pham'] ?></td>
                      <td><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>"
                          style="width:100px" alt=""
                          onerror="this.onerror=null; this.src='https://img.pikbest.com/wp/202345/cat-dog-pet-and-pets-in-real-pictures-wallpapers_9596134.jpg!bwr800'">
                      </td>
                      <td><?= $sanPham['gia_san_pham'] ?></td>
                      <td><?= $sanPham['so_luong'] ?></td>
                      <td><?= $sanPham['ten_danh_muc'] ?></td>
                      <td><?= $sanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></td>
                      <td>
                        <div class="btn-group">
                          <a
                            href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                            <button class="btn btn-primary"><i
                                class="fas fa-eye"></i></button>
                          </a>
                          <a
                            href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                            <button class="btn btn-warning"><i
                                class="fas fa-wrench"></i></button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>"
                            onclick="return confirm('Bạn có đồng ý xóa hay không?' )">
                            <button class="btn btn-danger"><i
                                class="fas fa-trash-alt"></i></button>
                          </a>

                        </div>

                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
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
<!-- //End Footer -->
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
<<<<<<< HEAD

      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
=======
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
>>>>>>> ae25908c17ded44e10f12960e19ce186aa382db4
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

<<<<<<< HEAD
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
</body>
</html>
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
          if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
            "stylesheet") {
            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
              .valueOf());
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
=======
>>>>>>> ae25908c17ded44e10f12960e19ce186aa382db4
</body>

</html>