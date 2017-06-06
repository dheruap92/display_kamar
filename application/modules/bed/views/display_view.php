<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/AdminLTE-2.3.11/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    body {
      background-color: #B1B5BE;
      padding: 10px;
    }
    td {
      font-size: 35px;
      font-weight : bold;
      text-align: center;
    }
    th {
      font-size : 45px;
      font-weight : bold;
      color : red;
      text-align: center
    }
    h1 {
      font-size : 50px;
      font-weight : bold;
      text-align: center;
    }
    .text-pengumuman {
      font-size: 22px;
      font-weight: bold;
    }
  </style>

</head>
<body>
<!-- Automatic element centering -->
  <div class="row">
    <div class="col-xs-12">
        <center><h1>Display Kamar RSUD Pariaman</h1></center>
    </div>
  </div>
  <div class="row" >
      <!-- /.col -->
    <div class="col-xs-6" >
      <div class="box box-solid" style="max-height: 80%;height:600px">
        <!-- /.box-header -->
        <div class="box-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
              $no=0;
              $active = ""; 
                foreach ($paviliun as $row) { 
                $no++;
                if($no==1) {
                  $active = "active";
                } else {
                  $active = "";
                }
              ?>
                <div class="item <?php echo $active ?>">
                <h1><?php echo strtoupper($row->nama_paviliun) ?></h1>
                  <table class="table table-hover">
                   <tr>
                      <th>Kelas</th>
                      <th>Total Bed</th>
                      <th>Terisi</th>
                    </tr>
                  <?php 
                    foreach ($kelas as $row_kelas) {
                       if ($row->nama_paviliun==$row_kelas->nama_paviliun) {
                  ?>
                    <tr>
                      <td><?php echo $row_kelas->kelas ?></td>
                      <td><?php echo $row_kelas->total ?></td>
                      <td><?php echo $row_kelas->terisi?></td>
                    </tr>
                  <?php      
                       }
                    }
                  ?>
                    
                  </table>
              </div>
              <?php } ?>
            </div>
            </a>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <div class="box box-solid" style="max-height: 80%;height:600px">
        <div class="box-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
                $no = 1;
                foreach ($pengumuman as $row) {
                if ($no==1) {
                  $active = "active";
                } else {
                  $active = "";
                }
                $no++; 
              ?>
              <div class="item <?php echo $active ?>">
                <h1 class="text-center"><?php echo $row->judul ?></h1>
                <p class="text-pengumuman"><?php echo $row->text_pengumuman ?></p>
              </div>
              
              <?php
                } 
              ?>
              <div class="item">
                <h3 class="text-center">Mengapa kita menggunakannya?</h3>
                <p class="text-pengumuman">
                  Sudah merupakan fakta bahwa seorang pembaca akan terpengaruh oleh isi tulisan dari sebuah halaman saat ia melihat tata letaknya. Maksud penggunaan Lorem Ipsum adalah karena ia kurang lebih memiliki penyebaran huruf yang normal, ketimbang menggunakan kalimat seperti "Bagian isi disini, bagian isi disini", sehingga ia seolah menjadi naskah Inggris yang bisa dibaca. Banyak paket Desktop Publishing dan editor situs web yang kini menggunakan Lorem Ipsum sebagai contoh teks. Karenanya pencarian terhadap kalimat "Lorem Ipsum" akan berujung pada banyak situs web yang masih dalam tahap pengembangan. Berbagai versi juga telah berubah dari tahun ke tahun, kadang karena tidak sengaja, kadang karena disengaja (misalnya karena dimasukkan unsur humor atau semacamnya)
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
<!-- /.center -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>assets/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>assets/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>