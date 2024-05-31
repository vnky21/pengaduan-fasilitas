<?php
if($_SESSION['level'] == '2'){
  header("Location: index.php");
  exit;
}

if (!isset($_GET['data'])) {
    
    header("Location: index.php");
    exit; 
}
$id = $_GET['data'];


include '../template/admin/header.php';
if($_SESSION['level'] == '2'){
    echo "<script>
    window.location.replace('index.php');
          </script>";
    exit;
  }
  
$data = getDataUserById($id);
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow">
        <div class="card-header">
            Reset Password User
        </div>
        <div class="card-body">
            <?php if(!isset($_SESSION['alert'])) {
          $_SESSION['alert'] = FALSE;
        } ?>

            <?php if($_SESSION['alert'] == TRUE) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php 
            unset($_SESSION['alert']);; 
            endif; ?>

            <form method="POST" action="../function/admin/edit-data-user.php">

            <input type="hidden" name="id_user" value="<?= $id; ?>">

            <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email User</label>
                    <input type="text" class="form-control" disabled id="email" value="<?= $data['email'] ?>" name="email" required>
                </div>
       
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" disabled id="nim" value="<?= $data['nim'] ?>" name="nim" required>
                    </div>

                </div>
            </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="togglePasswordBtn"
                                    onclick="togglePasswordVisibility()">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password2" name="password2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="togglePasswordBtn2"
                                    onclick="togglePasswordVisibility2()">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-4">Submit</button>
                </form>
        </div>


    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var togglePasswordBtn = document.getElementById('togglePasswordBtn');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordBtn.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                togglePasswordBtn.innerHTML = '<i class="bi bi-eye"></i>';
            }
        }

        function togglePasswordVisibility2() {
            var passwordInput = document.getElementById('password2');
            var togglePasswordBtn2 = document.getElementById('togglePasswordBtn2');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordBtn2.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                togglePasswordBtn2.innerHTML = '<i class="bi bi-eye"></i>';
            }
        }
    </script>
    <br><br><br><br><br><br><br>

    <?php
include '../template/admin/footer.php';
?>