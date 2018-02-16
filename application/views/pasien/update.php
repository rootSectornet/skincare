
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
              <h2>Tambah Pasien
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                  <div class="col-md-6 col-md-offset-3">
                    <?= form_open();?>
                    <?php foreach ($pasien as $key => $row): ?>
                      <div class="form-group">
                        <label class="control-label">Nama Pasien : </label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" required value="<?= $row->nama_pasien;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">NO RM : </label>
                        <input type="text" name="no_rm" class="form-control" placeholder="NO RM" required value="<?= $row->no_rm;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Tgl Lahir : </label>
                        <input type="text" name="tgl_lahir" class="form-control" required id="datepicker" value="<?= $row->tgl_lahir;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">NO Telp : </label>
                        <input type="text" name="no_tlp" class="form-control" required placeholder="080xxxx" value="<?= $row->no_telp;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Jenis Kelamin : </label>
                        <select class="form-control" name="gender" required id="">
                          <option value="1" <?= $row->gender == 1 ? 'selected' : '';?>> Laki - Laki </option>
                          <option value="0"<?= $row->gender == 0 ? 'selected' : '';?>>Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Alamat : </label>
                        <textarea class="form-control" name="alamat" rows="3"><?= $row->alamat;?></textarea>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Kelurahan : </label>
                        <select class="form-control" name="Kelurahan" id="select">
                          <option value="<?= $row->id_kel;?>" selected><?= $row->kel;?></option>
                        </select>
                      </div>
                        <input type="hidden" name="id_kel" class="form-control" id="id_kel" value="<?= $row->id_kel;?>">
                      <div class="form-group">
                        <label class="control-label">Kecamatan : </label>
                        <input type="text" name="kec" class="form-control" id="kec" value="<?= $row->kec;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Kabupaten : </label>
                        <input type="text" name="kab" class="form-control" id="kab" value="<?= $row->kab;?>">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Kecamatan : </label>
                        <input type="text" name="prov" class="form-control" id="prov" value="<?= $row->prov;?>">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                        <a class="btn btn-danger" href="<?= base_url();?>pasien/pasien" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
                      </div>
                    <?php endforeach ?>
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
    $('#datepicker').datetimepicker({
        format:'Y-m-d',
        mask:false,
        timepicker:false,
        minDate: '-2015/01/01'
    });

        var eventHandler = function(name) {
          return function() {
            console.log(name, arguments);
            $('#log').append('<div><span class="name">' + name + '</span></div>');
          };
        };
     $(document).ready(function(){
        $('#select').selectize({
            valueField: 'kel',
            labelField: 'kel',
            searchField: 'kel',
            options: [],
            create: false,
            render: {
                option: function(item, escape) {
                        return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                '<div class="" style="padding-left: 4px;">' + '<p><strong>' + escape(item.kel) + " | "+
                                escape(item.kec) + " | " + escape(item.kab) + " | " + escape(item.prov)

                                 '</strong></p>' + '</div>' +
                            '</div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: '<?= base_url();?>pasien/pasien/alamat',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        or_like: {kel: query}
                    },
                    error: function() {
                        callback();
                    },
                    success: function(res) {
                        callback(res);
                    }
                });
            },
            onItemAdd: function(value,$item){
              let data = this.options[value];
              $('#id_kel').val(data.id_kel);
              $('#kec').val(data.kec);
              $('#kab').val(data.kab);
              $('#prov').val(data.prov);
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#id_kel').val("");
                $('#kec').val("");
                $('#kab').val("");
                $('#prov').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#id_kel').val("");
                $('#kec').val("");
                $('#kab').val("");
                $('#prov').val("");
            }
        });

     });
</script>