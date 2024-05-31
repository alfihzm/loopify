 <div class="main-panel" style="font-family: quicksand;">
     <div class="content">
         <div class="page-inner">
             <div class="page-header">
                 <h4 class="page-title"><?= $judul; ?></h4>
                 <ul class="breadcrumbs">
                     <li class="nav-home">
                         <a href="#">
                             <i class="fa-solid fa-paste"></i>
                         </a>
                     </li>
                     <li class="separator">
                         <i class="flaticon-right-arrow"></i>
                     </li>
                     <li class="nav-item">
                         <a href="#"><?= $judul ?></a>
                     </li>
                     <li class="separator">
                         <i class="flaticon-right-arrow"></i>
                     </li>
                     <li class="nav-item">
                         <a href="#">Index</a>
                     </li>
                 </ul>
             </div>
             <div class="row">
                 <div class="col-lg-6">
                     <?= $this->session->flashdata('message') ?>
                 </div>
             </div>
             <!-- <a href=" <?= base_url('reports/add_reports'); ?>" class="btn btn-secondary mb-3">Tambah Laporan Masalah</a> -->
             <div class="container">
                 <table class="table table-hover table-bordered" id="dataTable">
                     <thead>
                         <tr style="background: #fff; color: black;">
                             <th scope="col">No</th>
                             <th scope="col">Petugas</th>
                             <th scope="col">Judul</th>
                             <th scope="col">Tanggal</th>
                             <th scope="col">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($menu as $m) : ?>
                             <tr>
                                 <th scope="row" style="width: 50px"><?= $i; ?></th>
                                 <td style="width: 290px"><?= $m['nama']; ?></td>
                                 <td><b><?= $m['judul']; ?></b></td>
                                 <td><?= $m['tanggal']; ?></td>
                                 <td style="text-align:center; vertical-align: middle;">
                                     <a href="<?= base_url('log/info_reports?id=' . $m['id']); ?>" class="btn btn-info"> <i class="fa-solid fa-eye"></i> </a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
             <script type="text/javascript">
                 window.setTimeout(function() {
                     $(".col-lg-6").fadeTo(500, 0).slideUp(500, function() {
                         $(this).remove();
                     });
                 }, 2000);
             </script>