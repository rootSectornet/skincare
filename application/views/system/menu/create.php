<link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/all.css">
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
                        <label class="control-label">Nama Menu : </label>
                        <input type="text" name="menu" class="form-control" placeholder="Nama Group" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Link : </label>
                        <input type="text" name="link" class="form-control" placeholder="Nama Group" required>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Icon : </label>
                        <input type="text" name="icon" class="form-control" placeholder="Nama Group" required>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6">

                                  <input type="radio" name="is_menu" class="flat-red" checked id="main" value="0">
                                  <label class="control-label">Main Menu</label>
                          </div>
                          <div class="col-md-6">

                              <input type="radio" name="is_menu" class="flat-red" id="sub" value="1">
                              <label class="control-label">Sub Main Menu</label>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Pilih Main Menu</label>
                        <select class="form-control" name="is_main_menu" id="is_main_menu" disabled>
                          <?php foreach ($menu as $key => $row): ?>
                            <option value="<?= $row->id_menu;?>"><?= $row->menu;?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                        <a class="btn btn-danger" href="<?= base_url();?>sistem/system" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
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
    // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    //   checkboxClass: 'icheckbox_flat-blue',
    //   radioClass   : 'iradio_flat-blue'
    // });
    $(document).ready(function(){
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').each(function(){
        var self = $(this),
          label = self.next(),
          label_text = label.text();

        label.remove();
        self.iCheck({
          checkboxClass: 'icheckbox_line',
          radioClass: 'iradio_line-blue',
          insert: '<div class="icheck_line-icon"></div>' + label_text
        });
      });
    });
    $('input#main').on('ifChecked', function(event){
      $('#is_main_menu').prop("disabled", true);
    });
    $('input#sub').on('ifChecked', function(event){
      $('#is_main_menu').prop("disabled", false);
    });
</script>
