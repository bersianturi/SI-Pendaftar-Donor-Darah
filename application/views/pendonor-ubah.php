<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pendonor</title>

    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/global.css">
    <link rel="stylesheet" href="<?= base_url("assets") ?>/css/dataTables.dataTables.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="py-4">
                <div class="col-12">
                    <h1 class="text-center">Ubah Data Pendonor</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card py-2 px-4 mb-4 col-6 mx-auto">
                <?php foreach ($pendonor as $row) : ?>
                    <form action="<?= base_url('pendonor/ubah/') . $row->id ?>" method="post">
                        <input type="hidden" name="id" value="<?= $row->id ?>">
                        <div class="my-3">
                            <label for="namaPendonor" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namaPendonor" name="nama_pendonor" placeholder="John Doe" value="<?= $row->nama ?>">
                            <?= form_error('nama_pendonor') ?>
                        </div>
                        <div class="my-3">
                            <label for="alamatPendonor" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamatPendonor" name="alamat_pendonor" placeholder="Jalan ABC" value="<?= $row->alamat ?>">
                            <?= form_error('alamat_pendonor') ?>
                        </div>
                        <div class="my-3">
                            <label for="tempatLahir" class="form-label">Tempat/Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="tempatLahir" name="tempatlahir_pendonor" placeholder="Semarang" value="<?= $row->tempat_lahir ?>">
                                    <?= form_error('tempatlahir_pendonor') ?>
                                </div>
                                <div class="col-6">
                                    <input type="date" class="form-control" id="tglLahirPendonor" name="tgllahir_pendonor" placeholder="01-01-2000" value="<?= $row->tanggal_lahir ?>">
                                    <?= form_error('tgllahir_pendonor') ?>
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="golDarahPendonor" class="form-label">Golongan Darah</label>
                            <input type="text" class="form-control" id="golDarahPendonor" name="goldarah_pendonor" placeholder="O" value="<?= $row->golongan_darah ?>">
                            <?= form_error('goldarah_pendonor') ?>
                        </div>
                        <div class="mb-3">
                            <label for="nomorHP" class="form-label">Nomor Hp</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="text" inputmode="numeric" min="0" class="form-control" id="nomorHP" name="nomor_hp" placeholder="81234567890" value="<?= $row->nomor_hp ?>">
                            </div>
                            <?= form_error('nomor_hp') ?>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="<?= base_url("assets") ?>/js/bootstrap.min.js"></script>
</body>

</html>