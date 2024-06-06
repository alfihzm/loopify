 <style>
        .hidden {
            display: none;
        }
    </style>
<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>
            <div class="container-fluid col-md-8">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h5 style="text-align: center;" class="card-title mt-1"><?= $judul; ?></h5>
                        <hr>
                        <form action="<?= base_url('admin/tambah_distribusi') ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pengepul">Lokasi</label>
                                        <select class="form-control" id="pengepul" name="pengepul">
                                            <option value="" disabled selected>Pilih pengepul</option>
                                            <option value="TLP">PT. Tangerang Lestari Pratama</option>
                                            <option value="KSA">PT. Krakatau Steel Alumunium</option>
                                            <option value="DPR">CV. Dunia Produk Raya</option>
                                        </select>
                                        <?= form_error('pengepul', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group hidden" id="form-bp">
                                        <label for="bp">Sampah Botol</label>
                                        <input type="number" class="form-control" id="bp" name="bp" autocomplete="off" min="0" value="0">
                                    </div>

                                    <div class="form-group hidden" id="form-ka">
                                        <label for="ka">Kaleng Alumunium</label>
                                        <input type="number" class="form-control" id="ka" name="ka" autocomplete="off" min="0" value="0">
                                    </div>

                                    <div class="form-group hidden" id="form-kk">
                                        <label for="kk">Kertas Kardus</label>
                                        <input type="number" class="form-control" id="kk" name="kk" autocomplete="off" min="0" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">Driver</label>
                                        <input type="text" class="form-control" id="driver" name="driver" autocomplete="off">
                                        <?= form_error('driver', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="display: flex; justify-content: space-evenly; align-items: center; margin-top: 10px">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a style="width: 100px;" href="<?= base_url('admin/sampah'); ?>" class="btn btn-warning">
                                        Batal
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pengepul').change(function() {
            // Hide all forms initially
            $('#form-bp, #form-ka, #form-kk').addClass('hidden');

            // Get the selected value
            var selectedValue = $(this).val();

            // Show the appropriate form based on the selected value
            if (selectedValue === 'TLP') {
                $('#form-bp').removeClass('hidden');
            } else if (selectedValue === 'KSA') {
                $('#form-ka').removeClass('hidden');
            } else if (selectedValue === 'DPR') {
                $('#form-bp').removeClass('hidden');
                $('#form-ka').removeClass('hidden');
                $('#form-kk').removeClass('hidden');
            }
        });
    });
</script>