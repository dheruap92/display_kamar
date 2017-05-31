<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Reservasi
        <small>Cekin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Reservasi</a></li>
        <li class="active">Cekin</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-lg-6 col-xs-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3>Table Bed</h3>
              </div>
              <div class="box-body table-responsive no-padding">
                  <table id="paviliun_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="check-all"></th>
                                <th>No</th>
                                <th>Nama Paviliun</th>
                                <th>Keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><input type="checkbox" id="check-all"></th>
                                <th>No</th>
                                <th>Nama Paviliun</th>
                                <th>Keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </tfoot>
                    </table>
              </div>
          </div>
      </div>
      <div class="col-lg-6 col-xs-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3>Table Kamar</h3>
              </div>
              <div class="box-body table-responsive no-padding">
                  <table id="kamar_table" class="table table-hover">
                       <thead>
                          <tr>
                              <th><input type="checkbox" id="check-all"></th>
                              <th>No</th>
                              <th>Nama Kamar</th>
                              <th>Kelas</th>
                              <th>Paviliun</th>
                              <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                              <th><input type="checkbox" id="check-all"></th>
                              <th>No</th>
                              <th>Nama Kamar</th>
                              <th>Kelas</th>
                              <th>Paviliun</th>
                              <th>Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody id="kamar_t_b">
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-xs-12">
          <div class="box box-primary">
              <div class="box-header">
                <h3>Table Bed</h3>
              </div>
              <div class="box-body table-responsive no-padding">
                  <table id="bed_table" class="table table-hover">
                       <thead>
                          <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>No</th>
                            <th>Nama Paviliun</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Nomor Bed</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>No</th>
                            <th>Nama Paviliun</th>
                            <th>Nama Kamar</th>
                            <th>Kelas</th>
                            <th>Nomor Bed</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody id="bed_t_b">
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
    </div>
</section><!-- /.content -->

<script>  
  var base_url = "<?php echo base_url() ?>";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/aplikasi/js/kelola.js"> </script>