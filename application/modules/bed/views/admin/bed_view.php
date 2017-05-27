<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <a href="<?php echo site_url()?>bed/admin"><?php echo $link1 ?></a>
        <small><?php echo $link2 ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $link1 ?></a></li>
        <li class="active"><?php echo $link2 ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-5 col-xs-12">
            <div class="box box-default">
                <div class="box-header">
                    Aksi Table
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div>
                <div class="box-body">
                    <button class="btn btn-xs btn-success" data-rel="tooltip" title="Add Data" onClick="add()"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    <button class="btn btn-xs btn-default" data-rel="tooltip" title="Refresh data" onClick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                    <button class="btn btn-xs btn-danger" data-rel="tooltip" title="Hapus Data" onClick="bulk_delete()"><i class="glyphicon glyphicon-trash"></i> Bulk Action</button>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xs-12">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table id="mytable" class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th><input type="checkbox" id="check-all"></th>
                                  <th>ID</th>
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
                                  <th>ID</th>
                                  <th>Nama Paviliun</th>
                                  <th>Nama Kamar</th>
                                  <th>Kelas</th>
                                  <th>Nomor Bed</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                          </tfoot>
                      </table>
                </div>
            </div>
        </div>
    </div>    
</section><!-- /.content -->
<!-- Modal Form -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                <form action="#" id="form" class="form-horizontal" class='has-error' method="post">
                  <div class="box box-warning">
                    <!-- /.box-header -->
                    <div class="box-body">
                      <form role="form">
                        <div class="form-group">
                          <label class="control-label" >Paviliun</label>
                          <input type="hidden" class="form-control input-sm" id="id_pk" name="id_pk" placeholder="Enter ..." >
                          <select class="form-control select2" style="width: 100%;" name="id_paviliun" id="id_paviliun">
                          <?php
                              foreach ($paviliun as $row) {
                                echo "<option value=".$row->id_paviliun.">".strtoupper($row->nama_paviliun)."</option>";
                              }
                          ?>
                          </select>
                          <span class="help-block">Help block with error</span>
                        </div>
                        <div class="form-group">
                          <label class="control-label" >Kamar</label>
                          <select class="form-control" style="width: 100%;" name="id_kamar" id="id_kamar">
                            <option value="">--select--</option>
                          </select>
                          <span class="help-block">Help block with error</span>
                        </div>
                        <div class="form-group has-error">
                          <label class="control-label" >Nomor Bed</label>
                          <input type="text" class="form-control input-sm" id="no_bed" name="no_bed" placeholder="Enter ...">
                          <span class="help-block">Help block with error</span>
                        </div>
                      </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- inline scripts related to this page -->
<script>	
	var base_url = "<?php echo base_url() ?>";
</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/aplikasi/js/bed.js"> </script>