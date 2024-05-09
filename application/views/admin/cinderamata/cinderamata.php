<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>

            <a href=" <?= base_url('admin/tambah_gift'); ?>" class="btn btn-secondary mb-3"> Tambah Cinderamata
            </a>

            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>

            <div class="containers">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 100px;">Nama</th>
                            <th scope="col" style="width: 100px;">Harga</th>
                            <th scope="col" style="width: 200px;">Deskripsi</th>
                            <th scope="col" style="width: 100px;">Foto</th>
                            <th scope="col" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cinderamata as $c) : ?>
                            <tr>
                                <td><?= $c['nama_gift']; ?></td>
                                <td><?= $c['harga']; ?> poin</td>
                                <td><?= $c['deskripsi']; ?></td>
                                <td>
                                    <img class="mb-2 mt-2" style="border: 1px solid #FFF; border-radius: 5px;" src="<?= base_url('assets/images/cinderamata/' . $c['photo']); ?>" alt="Gambar" width="85" height="85">
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/ubah_gift/'   . $c['id']); ?>" class="btn btn-success btn-sm"><i style="color: #000;" class="fa-solid fa-pencil"></i></a>
                                    <a href="<?= base_url('admin/hapus_gift/' . $c['id']); ?>" class="btn btn-danger btn-sm"><i style="color: #000;" class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".col-lg-6").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>