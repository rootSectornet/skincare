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
              <h2>Tambah Data Penjualan Obat
              </h2>
            </div>
            <div class="box-body">
              <div class="form">
                <?= form_open();?>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data Penjualan</h3>
                    </div>
                    <div class="box-body">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">No Faktur : </label>
                          <input type="text" name="ssds" class="form-control" disabled required value="<?= $faktur;?>">
                          <input type="hidden" name="head[faktur_penjualan]" class="form-control" required value="<?= $faktur;?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Tgl Penjualan : </label>
                          <input type="date" name="head[tgl_penjualan]" class="form-control" disabled value="<?= date('Y-m-d');?>">
                          <input type="hidden" name="head[tgl_penjualan]" class="form-control"  value="<?= date('Y-m-d');?>">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Nama Pasien : </label>
                          <select class="form-control" name="nama_pasien" id="select">
                          </select>
                          <input type="hidden" name="id_mst_pasien" class="form-control" id="id_mst_pasien">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Cara Bayar : </label>
                          <input type="text" name="head[cara_bayar]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">PPN : </label>
                            <div class="input-group">
                                  <span class="input-group-addon">
                                     <input type="checkbox" name="head[ppn]" id="Idppn" value="1">
                                  </span>
                                  <input type="hidden" name="ppn" id="ppnh"  class="form-control" value="0">
                                <input type="text" name="ppn" id="ppn" disabled class="form-control" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Total : </label>
                          <input type="hidden" name="total" class="form-control"  value="0" id="totalh">
                          <input type="text" name="total" class="form-control" disabled value="0" id="total">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Detail Penjualan</h3>
                    </div>
                    <div class="box-body">
                            <table class="table table-bordered table-condensed table-striped trx-table" id="table-row"> <!-- << Ganti name table-id sesuai no trx >> -->
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th>Sub Total</th>
                                        <th>
                                            <button type="button" class="btn btn-primary btn-sm" id="addRow"><span class="fa fa-plus"></span> Tambah</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                    </div>
                  </div>
                  <div class="form-group">
                    <?= BtnSave('Simpan');?>
                    <?= BtnBack('gudang/penjualan');?>
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
                                            '<div class="col-xs-12" style="padding-left: 4px;">' +
                                                '<p style="margin-bottom: 2px !important; color:red;"><strong> Harga :' + escape(item.harga_jual) + '</strong></p>' +
                                                '<p style="margin-bottom: 2px !important; color:red;"><small>Stock : ' + escape(item.qty) + '</small></p>' +
                                            '</div>' +
                                            //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                        '</div>' +
                                    '</div>';
                        }else{
                          return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                  '<div class="col-xs-6" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                                  '<div class="col-xs-6" style="border-left :1px solid #ddd; padding: 0px;">' +
                                      '<div class="col-xs-12" style="padding-left: 4px;">' +
                                          '<p style="margin-bottom: 2px !important;"><strong> Harga :' + escape(item.harga_jual) + '</strong></p>' +
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
  function ConfirmDialog() {
    var x=confirm("Apakah anda yakin ingin menghapus data ini?")
    if (x) {
      return true;
    } else {
      return false;
    }
  }
  $(document).ready(()=>{
      $('#Idppn').change(function() {
          // this will contain a reference to the checkbox
          if (this.checked) {
            let Total = $('#totalh').val();
            let ppnAwal = $('#ppnh').val();
            Total -= ppnAwal;
            let ppn = Total * 10 / 100;
            $('#ppnh').val(ppn)
            $('#ppn').val(ppn.toLocaleString())
            let totalAkhir = Total + ppn;
            $('#totalh').val(totalAkhir);
            $('#total').val(totalAkhir.toLocaleString());
          } else {
              $('#ppn').val(0)
              ppnAwal = $('#ppnh').val()
              Total = $('#totalh').val()
              Totalakhir = Total - ppnAwal;
              $('#ppnh').val(0)
              $('#total').val(Totalakhir.toLocaleString());
              $('#totalh').val(Totalakhir);
          }
      });
  })
  function HitungSubTotal(a){
    let hasil = 0;
    if ($('#qty'+a).val() == 0) {
       hasil = $('#harga'+a).val();
    }else{
       hasil = $('#qty'+a).val() * $('#harga'+a).val();
    }
    $('#sub_total'+a).val(hasil);
    $('#sub_totals'+a).val(hasil.toLocaleString());
    var totalPoints = 0;
    $(document).find('.sub').each(function(){
      totalPoints += parseInt($(this).val()); //<==== a catch  in here !! read below
    });
    if ($('#Idppn').is(':checked')){
      let ppn = totalPoints * 10/100
      totalPoints += ppn;
      $('#ppnh').val(ppn);
      $('#ppn').val(ppn.toLocaleString());
    }
    $('#total').val(totalPoints.toLocaleString())
    $('#totalh').val(totalPoints)
  }
    $(document).ready(function () {
          var counter = 0;

          $("#addRow").on("click", function () {
              var newRow = $("<tr>");
              var cols = "";

              cols += '<td  style="width: 30%"><select class="form-control" name="nama_product" id="select' + counter + '" required></select>';
              cols += '<input type="hidden" class="form-control" name="detail[' + counter + '][id_product]" id="id_product' + counter + '"/></td>';
              cols += '<td><input type="number" value="0" class="form-control" onchange="HitungSubTotal('+counter+')" name="detail[' + counter + '][qty]" id="qty'+ counter + '"/></td>';
              cols += '<td><input type="text" class="form-control" name="detail[' + counter + '][harga]" onchange="HitungSubTotal('+counter+')"  id="harga'+ counter + '"/></td>';
              cols += '<input type="hidden" class="form-control sub" name="detail[' + counter + '][sub_total]" id="sub_total' + counter + '"/>';
              cols += '<input type="hidden" class="form-control" name="detail[' + counter + '][harga_beli]" id="harga_beli' + counter + '"/></td>';
              cols += '<td><input type="text"  value="0" class="form-control" name="ss" id="sub_totals' + counter + '"/></td>';

              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " onClick="return ConfirmDialog();" value="Hapus"></td>';
              newRow.append(cols);
              $("#table-row").append(newRow);
              createSelectize('#select'+counter,'#id_product'+counter, '#harga'+counter,  '#harga_beli'+counter);
              counter++;
          });



          $("#table-row").on("click", ".ibtnDel", function (event) {
              $(this).closest("tr").remove();
              counter -= 1
          });


  });



  function calculateRow(row) {
      var price = +row.find('input[name^="price"]').val();

  }

  function calculateGrandTotal() {
      var grandTotal = 0;
      $("table.order-list").find('input[name^="price"]').each(function () {
          grandTotal += +$(this).val();
      });
      $("#grandtotal").text(grandTotal.toFixed(2));
  }

$(document).ready(function(){
  $('#select').selectize({
      valueField: 'nama_pasien',
      labelField: 'nama_pasien',
      searchField: 'nama_pasien',
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
        $('#id_mst_pasien').val(data.id_mst_pasien);
      },
      onDelete : function(value, $item) {
          let data = this.options[value];
          $('#id_mst_pasien').val("");
      },
      onItemRemove : function(value, $item) {
          let data = this.options[value];
          $('#id_mst_pasien').val("");
      },
      onLoad: function(){
        $('#select').val('sdsd');
      }
  });

});
</script>