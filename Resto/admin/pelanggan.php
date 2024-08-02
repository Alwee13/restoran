<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Delete Staff
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM  pelanggan  WHERE  id_pelanggan = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Terhapus" && header("refresh:1; url=pelanggan.php");
  } else {
    $err = "Coba Lagi Nanti";
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(assets/img/theme/bg.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
    <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <a href="tambah_pelanggan.php" class="btn btn-outline-success">
                <i class="fas fa-user-plus"></i>
                Tambah Pelanggan
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Nomor Kontak</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  pelanggan  ORDER BY `pelanggan`.`created_at` DESC ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($cust = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $cust->nama_pelanggan; ?></td>
                      <td><?php echo $cust->no_telp; ?></td>
                      <td><?php echo $cust->email_pelanggan; ?></td>
                      <td>
                        <a href="pelanggan.php?delete=<?php echo $cust->id_pelanggan; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Hapus
                          </button>
                        </a>

                        <a href="perbarui_pelanggan.php?update=<?php echo $cust->id_pelanggan; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-user-edit"></i>
                            Perbarui
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>