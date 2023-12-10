<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Profil</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Profil</a>
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
                                    <h4 class="fw-bold mt-3">ADMIN</h4>	                               
								</div>
							</div>     
                              
                            <div class="col-sm-4 mb-4">
                                <div class="form-group" id="namaFormGroup">
									<label class="fw-bold">Nama</label>
									<input type="text" id="nama" class="form-control" value="Muhammad Ariel Saputra">
								</div>
                                <div class="form-group" id="usernameFormGroup">
									<label class="fw-bold">Username</label>
									<input type="text" id="usrname" class="form-control" value="ariel">
								</div>
                                <div class="form-group" id="nipFormGroup">
									<label class="fw-bold">NIP</label>
									<input type="number" id="nip" class="form-control" value="18203812">
								</div>
                                <div class="form-group" id="passwordFormGroup">
                                    <label class="fw-bold">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="password" class="form-control" value="123">
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
					<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save Changes</button>
					<a href="?view=profil" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
				</div>
        </div>
    </div>
</div>