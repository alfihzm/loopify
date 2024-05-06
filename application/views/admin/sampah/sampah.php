<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>

            <a href=" <?= base_url('admin/tambah_sampah'); ?>" class="btn btn-secondary mb-3"> Tambah Jenis Sampah
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
                            <th scope=" col" style="width: 80px;">No</th>
                            <th scope="col" style="width: 140px;">Jenis Sampah</th>
                            <th scope="col" style="width: 130px;">Nilai Tukar</th>
                            <th scope="col" style="width: 130px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sampah as $s) : ?>
                            <tr>
                                <th scope="row"><?= $s['no']; ?></th>
                                <td><?= $s['jenis_sampah']; ?></td>
                                <td>Rp<?= $s['nilai_tukar']; ?>/kg</td>
                                <td>
                                    <a href="<?= base_url('admin/ubah_sampah/'   . $s['id']); ?>" class="btn btn-success btn-sm"><i style="color: #000;" class="fa-solid fa-pencil"></i></a>
                                    <a href="<?= base_url('admin/hapus_sampah/' . $s['id']); ?>" class="btn btn-danger btn-sm"><i style="color: #000;" class="fa-solid fa-trash"></i></a>
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