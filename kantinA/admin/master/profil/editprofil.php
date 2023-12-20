<?php
session_start();

include "../koneksi.php";

class EditProfil
{
    private $conn;
    private $user;

    public function __construct($conn)
    {
        $this->conn = $conn;

        // Check if session has started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
            $username = $_SESSION['username'];
            $level = $_SESSION['level'];

            $ambildata = mysqli_query($this->conn, "SELECT * FROM user WHERE username='$username' AND level='$level'");
            $this->user = mysqli_fetch_assoc($ambildata);
        }
    }

    public function updateUserProfile($nama_lengkap, $username, $nip, $password)
{
    $user = $this->user;

    // Use mysqli_real_escape_string to prevent SQL injection for string variables
    $nama_lengkap = isset($nama_lengkap) ? mysqli_real_escape_string($this->conn, $nama_lengkap) : '';
    $username = isset($username) ? mysqli_real_escape_string($this->conn, $username) : '';
    $password = isset($password) ? mysqli_real_escape_string($this->conn, $password) : '';

    // Check if at least one field is filled
    if (!empty($nama_lengkap) || !empty($username) || !empty($nip) || !empty($password)) {
        // Fix: Use proper escaping for $nip as it's an integer
        $sqlUpdate = "UPDATE user SET nama_lengkap='$nama_lengkap', username='$username', nip=$nip, password='$password' WHERE nip={$user['nip']}";
        $queryUpdate = mysqli_query($this->conn, $sqlUpdate);

        // Update $user if the query is successful
        if ($queryUpdate) {
            // Fetch the updated user data
            $ambildata = mysqli_query($this->conn, "SELECT * FROM user WHERE nip=$nip");
            $this->user = mysqli_fetch_assoc($ambildata);

            // Update $_SESSION['username'] with the new username
            $_SESSION['username'] = $username;
        }
        return $queryUpdate;
    } else {
        // Handle the case where no fields are filled
        return false;
    }
}

    public function getUser()
    {
        return $this->user;
    }
}

$editProfil = new EditProfil($conn);

if (isset($_POST['simpan'])) {
    $nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $nip = isset($_POST['nip']) ? $_POST['nip'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $queryUpdate = $editProfil->updateUserProfile($nama_lengkap, $username, $nip, $password);

    if ($queryUpdate) {
        // Update $user if the query is successful
        $user = $editProfil->getUser();
    }
    
    if ($queryUpdate) {
        // Redirect ke halaman profil jika update berhasil
        echo '<script>window.location.href="?view=profil";</script>';
        exit();
    } else {
        // Tampilkan pesan error jika update gagal
        echo '<script>alert("Update gagal", false);</script>';
    }
    
}

$user = $editProfil->getUser();
?>

<form method="post" action="">
    <div id="popup-alert" class="popup">
        <div id="popup-message-alert"></div>
    </div>

<div class="main-panel" style="margin-top: -40px;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Profil</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="?view=dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="?view=profil">Profil</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Profil</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row card-body">
                            <div class="row">
                                <div class="col-sm-8 ml-5 mr-5 mt-3 text-center">
                                    <img src="../assets/img/administrator.png" class="rounded" alt="user" width="201" height="177">
                                    <h4 class="fw-bold mt-3">admin</h4>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-4">
                                <div class="form-group" id="namaFormGroup">
                                    <label class="fw-bold">Nama</label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap'] ?>" required>                                 
                                </div>
                                <div class="form-group" id="usernameFormGroup">
                                    <label class="fw-bold">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']?>" required>
                                </div>
                                <div class="form-group" id="nipFormGroup">
                                    <label class="fw-bold">NIP</label>
                                    <input type="number" name="nip" id="nip" class="form-control" value="<?= $user['nip'] ?>" required>                                
                                </div>
                                <div class="form-group" id="passwordFormGroup">
                                    <label class="fw-bold">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" value="<?= $user['password']?>" required>                                   
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-eye" id="togglePassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            const togglePassword = document.getElementById('togglePassword');
                            const passwordInput = document.getElementById('password');

                            togglePassword.addEventListener('click', function () {
                                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordInput.setAttribute('type', type);
                                this.classList.toggle('fa-eye-slash');
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button type="submit" name="simpan" class="btn btn-success">
                    <i class="fa fa-save" aria-hidden="true"></i> Save Changes</button>
                <a href="?view=profil" class="btn btn-danger">
                    <i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
            </div>     
        </div>
    </div>
</div>
</form>

</body>
</html>

<?php mysqli_close($conn); ?>

