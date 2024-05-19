<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>
            <!-- <a href=" <?= base_url('admin/tambah_sampah'); ?>" class="btn btn-secondary mb-3"> Tambah Jenis Sampah
            </a> -->
            <a href="" data-toggle="modal" data-target="#newTransactionModal" class="btn btn-secondary mb-3">Tambah
                Transaksi</a>

            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>

            <div class="containers">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 100px;">Kode Member</th>
                            <th scope="col" style="width: 100px;">Nama</th>
                            <th scope="col" style="width: 100px;">Tanggal</th>
                            <th scope="col" style="width: 100px;" colspan="">Jenis sampah</th>
                            <th scope="col" style="width: 100px;">Lokasi</th>
                            <th scope="col" style="width: 100px;">Catatan</th>
                            <th scope="col" style="width: 100px;">Status</th>
                            <th scope="col" style="width: 100px;">Aksi</th>
                        </tr>
                        <!-- <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th scope="col" style="width: 100px;">Botol</th>
                            <th scope="col" style="width: 100px;">Kaleng</th>
                            <th scope="col" style="width: 100px;">Kardus</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $t) : ?>
                        <tr>
                            <td>MEM-<?= $t['id_member']; ?></td>
                            <td><?= $t['nama']; ?></td>
                            <td><?= $t['tanggal']; ?></td>
                            <td><?= $t['jumlah_botol'], $t['jumlah_kaleng'], $t['jumlah_kardus']; ?></td>
                            <!-- <td><?= $t['jumlah_kaleng']; ?></td>
                                <!-- <td><?= $t['jumlah_kardus']; ?></td> --> -->
                            <td><?= $t['lokasi']; ?></td>
                            <td><?= $t['catatan']; ?></td>
                            <td><?= $t['status']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/ubah_sampah/'   . $t['id']); ?>"
                                    class="btn btn-success btn-sm"><i style="color: #000;"
                                        class="fa-solid fa-pencil"></i></a>
                                <a href="<?= base_url('admin/hapus_sampah/' . $t['id']); ?>"
                                    class="btn btn-danger btn-sm"><i style="color: #000;"
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                </table>

            </div>
        </div>
    </div>

    <!-- Modal Tambah Announcement -->
    <div class="modal fade" id="newTransactionModal" tabindex="-1" aria-labelledby="newTransactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="background-color: #1A2035; border-radius: 10px;">
            <div class="modal-content" style="background-color: #1A2035;">
                <div class="modal-header">
                    <h4 class="modal-title text-white" id="newTransactionModalLabel"><b>Transaksi Baru</b></h2>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                </div>
                <form action="<?= base_url('transaction') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="color: #01E7f4 !important;" for="formGroupExampleInput">ID Member</label>
                            <input style="background: #01E7f4; color: #1A2035; font-weight: 600;" type="text"
                                class="form-control" id="id_member" name="id_member"
                                placeholder="Ketik ID milik member">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Botol Plastik</label>
                            <input type="text" class="form-control" id="jumlah_botol" name="jumlah_botol"
                                placeholder="Ketik jumlah botol yang ditukar">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kaleng Alumunium</label>
                            <input type="text" class="form-control" id="jumlah_kaleng" name="jumlah_kaleng"
                                placeholder="Ketik jumlah kaleng yang ditukar">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Kertas Kardus </label>
                            <input type="text" class="form-control" id="jumlah_kardus" name="jumlah_kardus"
                                placeholder="Ketik kardus kaleng yang ditukar">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Penukaran</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" id="lokasi" name="lokasi">
                                <option value="" disabled selected>Pilih lokasi</option>
                                <option value="Tenant Official">Tenant Official</option>
                                <option value="RW 001">RW 001</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
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