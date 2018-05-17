
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
              <h2>Tambah Katalog Obat
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                    <div class="form-group">
                      <label class="control-label">Nama Katalog Obat : </label>
                      <input type="text" name="nama_product" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Stock Awal : </label>
                      <input type="number" name="qty" class="form-control" required>
                    </div>
                      <div class="form-group">
                        <?= BtnSave('Simpan');?>
                        <?= BtnBack('gudang/product');?>
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
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>