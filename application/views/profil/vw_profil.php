<!-- profil/vw_profil.php -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center mb-4">Profil Pengguna</h1>

            <div class="card">
                <div class="card-body">
                    <?php if (!empty($user) && is_array($user)): ?>
                        <h2>Welcome, <?php echo $user['nama']; ?></h2>
                        <p>Email: <?php echo $user['email']; ?></p>
                        <p>Role: <?php echo $user['role']; ?></p>
                    <?php else: ?>
                        <p class="text-danger">Data pengguna tidak ditemukan atau kosong.</p>
                    <?php endif; ?>
                </div>

                <div class="card-footer text-center">
                    <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
