<!-- profil/vw_admin_profile.php -->

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center mb-4">Admin Profile</h1>

            <div class="card">
                <div class="card-body">
                    <?php if (isset($user) && !empty($user)): ?>
                        <h2>Welcome, <?php echo $user['nama']; ?></h2>
                        <p>Email: <?php echo $user['email']; ?></p>
                        <p>Role: <?php echo $user['role']; ?></p>

                        <!-- Tambahkan informasi tambahan untuk admin sesuai kebutuhan -->
                        <p>Additional Information for Admin</p>

                    <?php else: ?>
                        <p class="text-danger">Admin data not available.</p>
                    <?php endif; ?>
                </div>

                <div class="card-footer text-center">
                    <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
