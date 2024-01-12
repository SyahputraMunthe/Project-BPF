<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Pelanggan
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td><?php echo $customer['nama']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><?php echo $customer['email']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No HP</th>
                                <td><?php echo $customer['no_hp']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td><?php echo $customer['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Transfer</th>
                                <td><?php echo $customer['transfer']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Foto</th>
                                <td>
                                    <?php if ($customer['gambar']) : ?>
                                        <img src="<?php echo base_url('assets/img/customer/') . $customer['gambar']; ?>" alt="Foto Pelanggan" style="width: 600px; height: 400px;">
                                    <?php else : ?>
                                        <span>Tidak Ada Foto</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?= base_url('admin/index_table') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
