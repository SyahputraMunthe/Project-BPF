<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-mb-8">
            <div class="card">
                <div class="card-header justify-content-centet">
                    Form Tukar Nota
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Customer/proses_tambah') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                            <?php echo form_error('nama', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class=" form-control" id="email" placeholder="Email">
                            <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
                            <?php echo form_error('no_hp', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <br>
                        <div class="mb-3">
                            <div class="co col-md-12 form-group">
                                <label for="formFile">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input class="form-control" type="file" id="formFile" name="gambar">
                                        <label class="custom-file-label" for="formFile">Pilih Foto</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                            <?php echo form_error('alamat', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="transfer">Pengiriman (OVO, DANA, SHOPPEPAY, GOPAY)</label>
                            <select name="transfer" id=" transfer" class="form-control">
                                <option value="">Jenis Transfer</option>
                                <option value="DANA">DANA</option>
                                <option value="SHOPEEPAY">SHOPEEPAY</option>
                                <option value="OVO">OVO</option>
                                <option value="GOPAY">GOPAY</option>
                            </select>
                            <?php echo form_error('transfer', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <br>

                        <a href="<?= base_url('customer') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Kirim
                            Pengajuan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>