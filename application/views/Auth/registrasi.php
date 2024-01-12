
<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url('assets/') ?>img/ginbers.png" alt="" style="width: 500px; height: 300px;">
                                    <span class="d-none d-lg-block"></span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form action="<?= base_url('auth/registrasi') ?>" method="post">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" name="nama" class="form-control"required>
                                        
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" required>
                                        
                                        <label for="password" class="form-label">>Password:</label>
                                        <input type="password" name="password" class="form-control" required>
                                        
                                        <label for="password_conf" class="form-label">>Konfirmasi Password:</label>
                                        <input type="password" name="password_conf" class="form-control" required>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Registrasi
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>

</body>

</html>