<link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/all.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="box">
            <div class="box-header">
            <?php echo $this->session->flashdata('pesan_eror'); ?>
              <h2>Tambah Menu
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                      <div class="form-group">
                        <label class="control-label">Pilih Group : </label>
                        <select class="form-control" name="id_mst_group" id="select">
                          <?php foreach ($group as $key => $g): ?>
                            <option value="<?= $g->id_mst_group;?>"><?= $g->nama_group;?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Pilih Pegawai : </label>
                        <select class="form-control" name="id_mst_pegawai" id="select">
                          <?php foreach ($pegawai as $key => $p): ?>
                            <option value="<?= $p->id_mst_pegawai;?>"><?= $p->nama_pegawai;?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                        <a class="btn btn-danger" href="<?= base_url();?>sistem/system/group_akses" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
                      </div>
                    <?= form_close();?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
     $('#select').selectize({
        create : false,
        plugins : ['restore_on_backspace'],
        sortField: 'text'
    });

</script>