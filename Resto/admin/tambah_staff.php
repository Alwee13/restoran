<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
//Add Staff
if (isset($_POST['addStaff'])) {
  //Prevent Posting Blank Values
  if (empty($_POST["nomor_kasir"]) || empty($_POST["nama_kasir"]) || empty($_POST['email_kasir']) || empty($_POST['password_kasir'])) {
    $err = "Blank Values Not Accepted";
  } else {
    $nomor_kasir = $_POST['nomor_kasir'];
    $nama_kasir = $_POST['nama_kasir'];
    $email_kasir = $_POST['email_kasir'];
    $password_kasir = sha1(md5($_POST['password_kasir']));

    //Insert Captured information to a database table
    $postQuery = "INSERT INTO kasir (nomor_kasir, nama_kasir, email_kasir, password_kasir) VALUES(?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //bind paramaters
    $rc = $postStmt->bind_param('ssss', $nomor_kasir, $nama_kasir, $email_kasir, $password_kasir);
    $postStmt->execute();
    //declare a varible which will be passed to alert function
    if ($postStmt) {
      $success = "Staff Ditambahkan" && header("refresh:1; url=staff.php");
    } else {
      $err = "Silakan Coba Lagi Atau Coba Nanti";
    }
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
              <h3>Harap Isi Semua Kolom</h3>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Nomor Staff</label>
                    <input type="text" name="nomor_kasir" class="form-control" value="<?php echo $alpha; ?>-<?php echo $beta; ?>">
                  </div>
                  <div class="col-md-6">
                    <label>Nama Staff</label>
                    <input type="text" name="nama_kasir" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Email Staff</label>
                    <input type="email" name="email_kasir" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Staff Password</label>
                    <input type="password" name="password_kasir" class="form-control" value="">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addStaff" value="Tambah Staff" class="btn btn-success" value="">
                  </div>
                </div>
              </form>
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