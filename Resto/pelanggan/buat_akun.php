<?php
session_start();
include('config/config.php');
//login 
if (isset($_POST['addCustomer'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["no_telp"]) || empty($_POST["nama_pelanggan"]) || empty($_POST['email_pelanggan']) || empty($_POST['password_pelanggan'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $no_telp = $_POST['no_telp'];
        $email_pelanggan = $_POST['email_pelanggan'];
        $password_pelanggan = sha1(md5($_POST['password_pelanggan'])); //Hash This 
        $id_pelanggan = $_POST['id_pelanggan'];

        //Insert Captured information to a database table
        $postQuery = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, no_telp, email_pelanggan, password_pelanggan) VALUES(?,?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('sssss', $id_pelanggan, $nama_pelanggan, $no_telp, $email_pelanggan, $password_pelanggan);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Akun Pelanggan Dibuat" && header("refresh:1; url=index.php");
        } else {
            $err = "Silakan Coba Lagi Atau Coba Nanti";
        }
    }
}
require_once('partials/_head.php');
require_once('config/code-generator.php');
?>

<body class="bg-dark">
    <div class="main-content">
        <div class="header bg-gradient-primar py-7">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">Tanoshii Sushi</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form method="post" role="form">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control" required name="nama_pelanggan" placeholder="Nama Lengkap" type="text">
                                        <input class="form-control" value="<?php echo $cus_id;?>" required name="id_pelanggan"  type="hidden">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input class="form-control" required name="no_telp" placeholder="Nomor Telepon" type="text">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" required name="email_pelanggan" placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" required name="password_pelanggan" placeholder="Password" type="password">
                                    </div>
                                </div>

                                <div class="text-center">
                                </div>
                                <div class="form-group">
                                    <div class="text-left">
                                        <button type="submit" name="addCustomer" class="btn btn-primary my-4">Buat Akun</button>
                                        <a href="index.php" class=" btn btn-success pull-right">Log In</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="../admin/lupa_pwd.php" target="_blank" class="text-light"><small>Lupa password?</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require_once('partials/_footer.php');
    ?>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>