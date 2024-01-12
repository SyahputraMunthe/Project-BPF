<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($Customer as $us) : ?>
                        <tr>
                            <td><?= $i; ?>.</td>
                            <td><?= $us['nama']; ?></td>
                            <td><?= $us['alamat']; ?></td>
                            <td><?= $us['email']; ?></td>
                            <td>
                                <a href="<?= base_url('Admin/confirm/') . $us['id']; ?>" class="btn btn-primary rounded-pill">Confirm</button></a>
                                <a href="<?= base_url('Admin/detail/') . $us['id']; ?>" class="btn btn-info rounded-pill">Detail</button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
