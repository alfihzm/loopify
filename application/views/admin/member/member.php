<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>

            <a href=" <?= base_url('admin/add_member'); ?>" class="btn btn-secondary mb-3"> Tambah Member
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
                            <th scope=" col" style="width: 80px;">Kode Member</th>
                            <th scope="col" style="width: 140px;">Nama</th>
                            <th scope="col" style="width: 130px;">Email</th>
                            <th scope="col" style="width: 130px;">Foto</th>
                            <th scope="col" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($members as $u) : ?>
                            <tr>
                                <th scope="row"><?= $u['id_member']; ?></th>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td>
                                    <img class="mb-2 mt-2" style="border: 1px solid #FFF; border-radius: 5px;" src="<?= base_url('assets/images/user/profile/' . $u['photo']); ?>" alt="Gambar" width="85" height="85">
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/member_info/'   . $u['id_member']); ?>" class="btn btn-primary btn-sm"><i style="color: #000;" class="fa-solid fa-circle-info"></i></a>
                                    <a href="<?= base_url('admin/member_edit/'   . $u['id_member']); ?>" class="btn btn-success btn-sm"><i style="color: #000;" class="fa-solid fa-pencil"></i></a>
                                    <a href="<?= base_url('admin/member_delete/' . $u['id_member']); ?>" class="btn btn-danger btn-sm"><i style="color: #000;" class="fa-solid fa-trash"></i></a>
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