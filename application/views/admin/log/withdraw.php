<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="">
                            <i class="fa-solid fa-file-lines"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Log Tarik Tunai</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Index</a>
                    </li>
                </ul>
            </div>
            <div class="containers">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Member</th>
                            <th scope="col">User</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Metode</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($withdraw as $w) : ?>
                            <?php if ($w['status'] === 'Belum diproses') : ?>
                                <tr>
                                    <td><?= $w['id_member']; ?></td>
                                    <td><?= $w['username']; ?></td>
                                    <td><?= $w['tanggal']; ?></td>
                                    <td><?= $w['nominal']; ?></td>
                                    <td><?= $w['metode']; ?></td>
                                    <td><?= $w['status']; ?></td>
                                    <td>
                                        <a href="<?= base_url('log/info_withdraw/' . $w['id']); ?>" class="btn btn-light btn-sm" style="width: 30px; height: 30px;"><i style="color: #000;" class="fa-solid fa-info"></i></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>