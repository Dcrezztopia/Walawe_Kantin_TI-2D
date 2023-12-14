<?php
include '../koneksi.php';
session_start();
?>
<?php 
$p = mysqli_query($conn,'SELECT count(*) as waitingroom from waitingroom where status = "menunggu"');
$q = mysqli_fetch_array($p);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sistem Informasi Kantin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/logo.png" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
		.logo img.navbar-brand {
    		width: 120px;
    		height: auto;
		}

		.nav-item.active a {
            background-color: #007bff;
            color: #fff;
        }
	</style>
	
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="orange">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="#" class="logo">
                    <img src="../assets/img/logo2.png" alt="navbar brand" class="navbar-brand">
                </a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
        <div class="sidebar-wrapper scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav list-group">
                    	<li class="nav-item">
							<a href="?view=dashboard" class="nav-link">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
							<h4 class="text-section">Components</h4>
						</li>

						<li class="nav-item">
							<a href="?view=databarang" class="nav-link">
								<i class="fa fa-briefcase"></i>
								<p class="sub-item">Daftar Barang</p>
							</a>
						</li>

						<li class="nav-item d-flex justify-content-between align-items-center">
							<a href="?view=datapengajuan" class="nav-link">
								<i class="fa fa-upload"></i>
								<p class="sub-item">Pengajuan Barang</p>
								<span class="badge bg-danger rounded-pill" style="color: white;"><?php echo $q['waitingroom'] ?></span>
							</a>
						</li>

						<li class="nav-item">
							<a href="?view=datajenisbarang" class="nav-link">
								<i class="fa fa-suitcase"></i>
								<p class="sub-item">Jenis Barang</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?view=datalaporan" class="nav-link">
								<i class="fa fa-tasks"></i>
								<p class="sub-item">Laporan</p>
							</a>
						</li>

						<li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </span>
							<h4 class="text-section">Setting</h4>
						</li>
					
						<li class="nav-item">
							<a href="?view=profil" class="nav-link">
								<i class="fa fa-user" aria-hidden="true"></i>
								<p>Profil</p>
							</a>
						</li>

                    	<li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutConfirmationModal">
                                <i class="fas fa-lock"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">Logout</span> 
							<span class="fw-light">Admin</span>
						</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
                    <div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
					    <h4>Apakah anda ingin <b>Logout</b>?</h4>
					</div>
                    <div class="modal-footer no-bd">
                        <button class="btn btn-primary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</button>
                        <a class="btn btn-danger" href="../logout.php"><i class="fas fa-lock"></i>&nbsp;Logout</a>
                    </div>
                </div>
            </div>
        </div>

		<!-- JS NOTIF BELL SAMPING TULISAN PENGAJUAN -->
		<!-- <script>
			function updateNotificationsCount() {
				$.ajax({
					url: 'path/to/your/script/getUnacceptedPengajuanCount.php',
					method: 'GET',
					dataType: 'json',
					success: function(response) {
						var count = response.count;
						$('.navbar-notifications').attr('data-count', count);
					},
					error: function() {
						console.log('Failed to fetch the unaccepted pengajuan count');
					}
				});
			}

			// Call the function to update the count
			updateNotificationsCount();

			// Set an interval to periodically update the count
			setInterval(updateNotificationsCount, 10000); // Update every 10 seconds
		</script> -->

		<!-- <php
		// getUnacceptedPengajuanCount.php
		header('Content-Type: application/json');

		// Your database connection code here

		$query = "SELECT COUNT(*) as count FROM pengajuan WHERE status = 'pending'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		echo json_encode(['count' => $row['count']]);
		?> -->

		<?php
                    // Dashboard
                    if(@$_GET['view']=='')
                        include 'dashboard.php';
                    elseif($_GET['view']=='dashboard')
                        include 'dashboard.php';

                    // Data Barang
                    elseif($_GET['view']=='databarang')
                        include 'master/barang/databarang.php';
                    
                    // Data Pengajuan
                    elseif($_GET['view']=='datapengajuan')
                        include 'master/pengajuan/datapengajuan.php';

                    // Data Jenis Barang
                    elseif($_GET['view']=='datajenisbarang')
                        include 'master/jenisbarang/datajenisbarang.php';
                    
					// Data Laporan
                    elseif($_GET['view']=='datalaporan')
                        include 'master/laporan/datalaporan.php';
                   
					// Profil
                    elseif($_GET['view']=='profil')
                        include 'master/profil/profil.php';
                    elseif($_GET['view']=='editprofil')
                        include 'master/profil/editprofil.php';
						
                 ?>

		<!-- Add Bootstrap JS and jQuery -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>
		<!-- jQuery UI -->
		<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<!-- Bootstrap Toggle -->
		<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
		<!-- jQuery Scrollbar -->
		<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<!-- Datatables -->
		<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
		<!-- Azzara JS -->
		<script src="../assets/js/ready.min.js"></script>
		<!-- Azzara DEMO methods, don't include it in your project! -->
		<script src="../assets/js/setting-demo.js"></script>
		<script >
			$(document).ready(function() {
				$('#add-row').DataTable({
				});
			});
		</script>
		<!-- jQuery script to add "active" class to clicked menu item -->
		<script>
        $(document).ready(function () {
            var currentUrl = window.location.href;

            $(".nav-item a").each(function () {
                if (currentUrl.indexOf($(this).attr("href")) > -1) {
                    $(this).closest('.nav-item').addClass("active");
                }
            });
        });
    	</script>

	</div>
</body>
</html>