<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="">
                            <i class="fa-solid fa-file-lines"></i>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Transaksi Penyerahan</a>
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
                            <th scope="col">BP</th>
                            <th scope="col">KA</th>
                            <th scope="col">KK</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaction as $t) : ?>
                            <tr>
                                <td><?= $t['id_member']; ?></td>
                                <td><?= $t['username']; ?></td>
                                <td><?= $t['tanggal']; ?></td>
                                <td><?= $t['jumlah_botol']; ?></td>
                                <td><?= $t['jumlah_kaleng']; ?></td>
                                <td><?= $t['jumlah_kardus']; ?></td>
                                <td><?= $t['lokasi']; ?></td>
                                <td>
                                    <div style="text-align: center;">
                                        <a href="<?= base_url('log/info_transaction/' . $t['id']); ?>" class="btn btn-light btn-sm" style="width: 30px; height: 30px;"><i style="color: #000;" class="fa-solid fa-info"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>