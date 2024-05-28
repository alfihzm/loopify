 <style>
     .indicator-box {
         display: inline-block;
         width: 20px;
         height: 20px;
         margin-left: 10px;
     }

     .legend {
         display: flex;
         align-items: center;
         margin-top: 10px;
     }

     .legend div {
         display: flex;
         align-items: center;
         margin-right: 20px;
     }

     .legend .box {
         width: 20px;
         height: 20px;
         margin-right: 5px;
     }

     .legend .green {
         background-color: green;
     }

     .legend .yellow {
         background-color: yellow;
     }

     .legend .red {
         background-color: red;
     }
 </style>
 </style>
 <div class="main-panel">
     <div class="content">
         <div class="page-inner">
             <div class="page-header">
                 <h4 class="page-title"><?= $judul; ?></h4>
                 <ul class="breadcrumbs">
                     <li class="nav-home">
                         <a href="#">
                             <i class="flaticon-home"></i>
                         </a>
                     </li>
                     <li class="separator">
                         <i class="flaticon-right-arrow"></i>
                     </li>
                     <li class="nav-item">
                         <a href="#">Pages</a>
                     </li>
                     <li class="separator">
                         <i class="flaticon-right-arrow"></i>
                     </li>
                     <li class="nav-item">
                         <a href="#">Starter Page</a>
                     </li>
                 </ul>
             </div>
             <div class="page-category">
                 <table class="table table-bordered">
                     <h3 style="font-weight: bold;">Pengumuman terbaru!</h3>
                     <thead class="thead-light">
                         <tr>
                             <th scope="col">No</th>
                             <th scope="col">Judul</th>
                             <th scope="col">Tanggal</th>
                             <th scope="col">Deskripsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($menu as $m) : ?>
                             <tr>
                                 <th scope="row"><?= $i; ?></th>
                                 <td><?= $m['judul']; ?></td>
                                 <td><?= $m['tanggal']; ?></td>
                                 <td><?= $m['deskripsi']; ?></td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
             <h3 style="font-weight: bold;">Statistik Keanggotaan</h3>
             <div class="row">
                 <div class="col-lg-3">
                     <div class=" card border border-dark" style=" height: 250px; margin-bottom: 20px;">
                         <div class="card-header" style="background-color: #fff; color: black; text-align: center">
                             Jumlah Member
                         </div>
                         <i class="fas fa-solid fa-user" style="margin-top: 50px; text-align: center; font-size: 2.5em;"></i>
                         <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                             <?= $jumlah_partisipan ?> Partisipan
                         </h4>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class=" card border border-dark" style=" height: 250px; margin-bottom: 20px;">
                         <div class="card-header" style="background-color: #fff; color: black; text-align: center">
                             Jumlah Staff
                         </div>
                         <i class="fas fa-solid fa-user" style="margin-top: 50px; text-align: center; font-size: 2.5em;"></i>
                         <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                             <?= $jumlah_pegawai ?> Sukarelawan
                         </h4>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class=" card border border-dark" style=" height: 250px; margin-bottom: 20px;">
                         <div class="card-header" style="background-color: #fff; color: black; text-align: center">
                             Jumlah Admin
                         </div>
                         <i class="fas fa-solid fa-user" style="margin-top: 50px; text-align: center; font-size: 2.5em;"></i>
                         <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                             <?= $jumlah_admin ?> Administrator
                         </h4>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class=" card border border-dark" style=" height: 250px; margin-bottom: 20px;">
                         <div class="card-header" style="background-color: #fff; color: black; text-align: center">
                             Jumlah Akun terblokir
                         </div>
                         <i class="fas fa-solid fa-user" style="margin-top: 50px; text-align: center; font-size: 2.5em;"></i>
                         <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                             <?= $jumlah_terblokir ?> Akun
                         </h4>
                     </div>
                 </div>
             </div>
             <h3 style="font-weight: bold;">Statistik Keuangan</h3>
             <div class="row">
                 <div class="col-lg-6">
                     <canvas id="myPieChart"></canvas>
                 </div>
                 <div class="col-lg-6">
                     <table class="table table-bordered">
                         <thead class="thead-light">
                             <tr>
                                 <th>ID</th>
                                 <th>Saldo</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($finance as $row) : ?>
                                 <tr>
                                     <td><?= $row['id'] ?></td>
                                     <td>
                                         <?= "Rp " . number_format($row['saldo'], 0, ',', '.') ?>
                                         <?php
                                            if ($row['saldo'] > 100000) {
                                                $color = "green";
                                            } elseif ($row['saldo'] > 0) {
                                                $color = "yellow";
                                            } else {
                                                $color = "red";
                                            }
                                            ?>
                                         <div class="indicator-box" style="background-color: <?= $color ?>;"></div>
                                     </td>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>
                     <div class="legend">
                         <div>
                             <div class="box green"></div>
                             <span>Saldo > 100,000</span>
                         </div>
                         <div>
                             <div class="box yellow"></div>
                             <span>0 < Saldo <=100,000</span>
                         </div>
                         <div>
                             <div class="box red"></div>
                             <span>Saldo <= 0</span>
                         </div>
                     </div>
                 </div>
             </div>
             <hr stle="border-color: white;">
             <h3 style="font-weight: bold; margin-top: 30px;">Statistik Limbah</h3>
             <div class="row">
                 <div class="col-lg-12">
                     <canvas id="myBarChart"></canvas>
                     <p>Total Sampah di Gudang: <?= array_sum(json_decode($total_sampah)); ?></p>
                 </div>
             </div>
             <h3 style="font-weight: bold; margin-top: 30px;">Penarikan tunai terakir</h3>
             <div class="col-lg-12">
                 <table class="table table-borderless">
                     <thead class="thead-light">
                         <tr>
                             <th>Username</th>
                             <th>Tanggal</th>
                             <th>Nominal</th>
                             <th>Metode</th>
                             <th>Lokasi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach (array_slice($withdraw, -3) as $w) : ?>
                             <tr>
                                 <td><?= $w['username']; ?></td>
                                 <td><?= $w['tanggal']; ?></td>
                                 <td><?= "Rp " . number_format($w['nominal'], 0, ',', '.'); ?></td>
                                 <td><?= $w['metode']; ?></td>
                                 <td><?= $w['lokasi']; ?></td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
         <p>Bara bara bara bere bere bere</p>
     </div>

     <!-- <div class="card" style="width: 18rem;">
        <img src="<?= base_url('assets/images/user/profile/') .  $user['photo']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
        </div>
      </div> -->

 </div>
 </div>
 <script>
     // Jangan diapa-apain dulu ini buat diagram
     const data = {
         labels: [
             'Akun Modal',
             'Akun Arus Kas'
         ],
         datasets: [{
             data: [
                 <?= $finance[0]['saldo'] ?>,
                 <?= $finance[1]['saldo'] ?>
             ],
             backgroundColor: [
                 'rgba(255, 99, 132, 0.2)',
                 'rgba(54, 162, 235, 0.2)'
             ],
             borderColor: [
                 'rgba(255, 99, 132, 1)',
                 'rgba(54, 162, 235, 1)'
             ],
             borderWidth: 2
         }]
     };

     const config = {
         type: 'pie',
         data: data,
         options: {
             responsive: true,
             plugins: {
                 legend: {
                     position: 'top',
                 },
                 title: {
                     display: true,
                     text: 'Perbandingan Saldo Akun'
                 }
             }
         },
     };

     const myPieChart = new Chart(
         document.getElementById('myPieChart'),
         config
     );
 </script>
 <script>
     const barLabels = <?= $jenis_sampah ?>;
     const barData = {
         labels: barLabels,
         datasets: [{
             label: 'Total Sampah',
             backgroundColor: 'rgba(54, 162, 235, 0.2)',
             borderColor: 'rgba(54, 162, 235, 1)',
             borderWidth: 1,
             data: <?= $total_sampah ?>
         }]
     };

     const barConfig = {
         type: 'bar',
         data: barData,
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         },
     };

     const myBarChart = new Chart(
         document.getElementById('myBarChart'),
         barConfig
     );
 </script>