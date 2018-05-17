
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
              <h2>Pendaftaran Pasien
                <a href="<?php echo base_url() ?>pasien/pasien/create" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Pasien"><i class="fa fa-plus"></i> Pasien Baru</a>
              </h2>
            </div>
            <div class="box-body">
                <div class="form">
                    <?= form_open();?>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Kode Pendaftaran : </label>
                            <input type="text" name="kode" class="form-control" disabled value="<?= $kode_pendaftaran;?>">
                            <input type="hidden" name="id_trx_pendaftaran" class="form-control"  value="<?= $kode_pendaftaran;?>">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Nama Pasien : </label>
                            <select class="form-control" name="nama_pasien" id="select">
                            </select>
                            <input type="hidden" name="id_mst_pasien" class="form-control" id="id_mst_pasien">
                          </div>
                          <div class="form-group">
                            <label class="control-label">NO RM : </label>
                            <input type="text" name="no_rm" id="no_rm" class="form-control" placeholder="NO RM" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Tgl Lahir : </label>
                            <input type="text" name="tgl_lahir" id="tgl_lahir"  class="form-control" required id="datepicker">
                          </div>
                          <div class="form-group">
                            <label class="control-label">NO Telp : </label>
                            <input type="text" name="no_telp" id="no_tlp"  class="form-control" required placeholder="080xxxx">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Keterangan : </label>
                            <textarea class="form-control" name="keterangan" rows="4"></textarea>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Tindakan : </label>
                              <select class="form-control" name="tindakan[][id_tindakan]" multiple="multiple" id="tindakan">
                                <?php foreach ($tindakan as $key => $tind): ?>
                                  <option value="<?= $tind->id_mst_tindakan;?>"><?= $tind->nama_tindakan;?></option>
                                <?php endforeach ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label class="control-label">Pemakaian Obat :   </label>
                            <table class="table table-bordered table-condensed table-striped trx-table" id="table-row"> <!-- << Ganti name table-id sesuai no trx >> -->
                                <thead>
                                    <tr>
                                        <th width="50%">Nama Obat</th>
                                        <th width="30%">QTY</th>
                                        <th>
                                            <button type="button" class="btn btn-primary btn-sm" id="addRow"><span class="fa fa-plus"></span> Tambah</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Simpan">Simpan</button>
                          <a class="btn btn-danger" href="<?= base_url();?>pendaftaran/pendaftaran" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>
                        </div>
                      </div>
                    <?= form_close();?>
                  
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

        $('#tindakan').selectize({
            plugins: ['remove_button']
        });
        $('#select').selectize({
            valueField: 'nama_pasien',
            labelField: 'nama_pasien',
            searchField: ['nama_pasien','no_rm'],
            placeholder: "sdsd",
            options: [],
            create: false,
            render: {
                option: function(item, escape) {
                        return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                '<div class="col-xs-2" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_pasien) + '</strong></p>' + '</div>' +
                                '<div class="col-xs-10" style="border-left :1px solid #ddd; padding: 0px;">' +
                                    '<div class="col-xs-12" style="padding-left: 4px;">' +
                                        '<p style="margin-bottom: 2px !important;"><strong> No RM :' + escape(item.no_rm) + '</strong></p>' +
                                        '<p style="margin-bottom: 2px !important;"><small>Nama : ' + escape(item.nama_pasien) + '</small></p>' +
                                    '</div>' +
                                    //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                '</div>' +
                            '</div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: '<?= base_url();?>pendaftaran/pendaftaran/cari_pasien',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nama_pasien: {nama_pasien: query}
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
              $('#id_mst_pasien').val(data.id_mst_pasien);
              $('#no_rm').val(data.no_rm);
              $('#tgl_lahir').val(data.tgl_lahir);
              $('#no_tlp').val(data.no_telp);
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#id_mst_pasien').val("");
                $('#no_rm').val("");
                $('#tgl_lahir').val("");
                $('#no_tlp').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#id_mst_pasien').val("");
                $('#no_rm').val("");
                $('#tgl_lahir').val("");
                $('#no_tlp').val("");
            },
            onLoad: function(){
              $('#select').val('sdsd');
            }
        });

     });
         function createSelectize(element, id, fieldHargajual, fieldHargabeli) {
            $(element).selectize({
                valueField: 'nama_product',
                labelField: 'nama_product',
                searchField: 'nama_product',
                placeholder: "Ketik Untuk Mencari Nama Obat",
                options: [],
                create: false,
                render: {
                    option: function(item, escape) {
                        if (escape(item.qty) <= 0) {
                                return '<div style="color:red;" class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                        '<div class="col-xs-6" style="padding-left: 4px;color:red;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                                        '<div class="col-xs-6" style="border-left :1px solid #ddd; padding: 0px;">' +
                                                '<p style="margin-bottom: 2px !important; color:red;"><small>Stock : ' + escape(item.qty) + '</small></p>' +
                                            '</div>' +
                                            //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                        '</div>' +
                                    '</div>';
                        }else{
                          return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                  '<div class="col-xs-6" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                                  '<div class="col-xs-6" style="border-left :1px solid #ddd; padding: 0px;">' +
                                          '<p style="margin-bottom: 2px !important;"><small>Stock : ' + escape(item.qty) + '</small></p>' +
                                      '</div>' +
                                      //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                  '</div>' +
                              '</div>';
                        }
                    }
                },
                load: function(query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: '<?= base_url();?>gudang/product/jsonpenjualan',
                        type: 'POST',
                        dataType: 'json',
                        data: {
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
                    if (data.qty <= 0) {
                      alert('Stock Tidak ada, Silahkan Pilih Obat lain atau buat penerimaan');
                    }else{
                      $(id).val(data.id_product);
                      $(fieldHargajual).val(data.harga_jual);
                      $(fieldHargabeli).val(data.harga_beli);
                    }

                },
                onDelete : function(value, $item) {
                    let data = this.options[value];
                    $(id).val("");
                    $(fieldHargajual).val("");
                    $(fieldHargabeli).val("");
                },
                onItemRemove : function(value, $item) {
                    let data = this.options[value];
                    $(id).val("");
                    $(fieldHargajual).val("");
                    $(fieldHargabeli).val("");
                },
                onLoad: function(){
                    $(element).val('Ketik Untuk Mencari Nama Obat');
                }
            });

        }
    $(document).ready(function () {
          var counter = 0;

          $("#addRow").on("click", function () {
              var newRow = $("<tr>");
              var cols = "";

              cols += '<td  style="width: 30%"><select class="form-control" name="nama_product" id="select' + counter + '" required></select>';
              cols += '<input type="hidden" class="form-control" name="detail[' + counter + '][id_product]" id="id_product' + counter + '"/></td>';
              cols += '<input type="hidden" class="form-control" name="detail[' + counter + '][harga_jual]" id="harga_jual' + counter + '"/></td>';
              cols += '<input type="hidden" class="form-control" name="detail[' + counter + '][harga_beli]" id="harga_beli' + counter + '"/></td>';
              cols += '<td><input type="number" value="0" class="form-control" onchange="HitungSubTotal('+counter+')" name="detail[' + counter + '][qty]" id="qty'+ counter + '"/></td>';

              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " onClick="return ConfirmDialog();" value="Hapus"></td>';
              newRow.append(cols);
              $("#table-row").append(newRow);
              createSelectize('#select'+counter,'#id_product'+counter, '#harga_jual'+counter,  '#harga_beli'+counter);
              counter++;
          });
          $("#table-row").on("click", ".ibtnDel", function (event) {
              $(this).closest("tr").remove();
              counter -= 1
          });
    });
</script>
