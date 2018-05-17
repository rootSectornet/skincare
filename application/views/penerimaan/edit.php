
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/selectize/css/selectize.bootstrap3.css">
<script src="<?php echo base_url();?>assets/plugins/selectize/js/selectize.min.js"></script>
<?php $index = 0; ?>
<script type="text/javascript">
function createSelectizeedit($element, nama, id) {
   $element.selectize({
       valueField: 'nama_product',
       labelField: 'nama_product',
       searchField: 'nama_product',
       placeholder: nama,
       options: [],
       create: false,
       render: {
           option: function(item, escape) {
                   return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                           '<div class="col-xs-12" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                       '</div>';
           }
       },
       load: function(query, callback) {
           if (!query.length) return callback();
           $.ajax({
               url: '<?= base_url();?>gudang/product/json',
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
         $(id).val(data.id_product);
       },
       onDelete : function(value, $item) {
           let data = this.options[value];
           $(id).val("");
       },
       onItemRemove : function(value, $item) {
           let data = this.options[value];
           $(id).val("");
       },
       onLoad: function(){
           $element.val('Ketik Untuk Mencari Nama Obat');
       }
   });

}
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <?php $nama_suplier = $penerimaan['head'][0]->nama_suplier; ?>
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="box">
            <div class="box-header">
            <?php echo $this->session->flashdata('pesan_eror'); ?>
              <h2>Edit Data Penerimaan Obat</h2>
              <p class="text-muted "> <i class="fa fa-info-circle fa-fw"></i> Dilakukan Oleh  : <?= $penerimaan['head'][0]->nama_pegawai;?></p>
            </div>
            <div class="box-body">
              <div class="form">
                <?= form_open();?>
                <?php foreach ($penerimaan['head'] as $key => $head): ?>
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Data Penerimaan</h3>
                        </div>
                        <div class="box-body">
                          <input type="hidden" name="head[id_suplier]" id="id_suplier" value="<?= $head->id_suplier;?>">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">No Faktur : </label>
                              <input type="text" name="head[faktur_penerimaan]" class="form-control" required value="<?= $head->faktur_penerimaan;?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Supplier : </label>
                              <select class="form-control" name="nama_suplier" id="select" >
                              </select>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Tgl Penerimaan : </label>
                              <input type="date" name="head[tgl_penerimaan]" class="form-control" disabled value="<?= date('Y-m-d');?>">
                              <input type="hidden" name="head[tgl_penerimaan]" class="form-control"  value="<?= date('Y-m-d');?>">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Cara Bayar : </label>
                              <input type="text" name="head[cara_bayar]" class="form-control" required value="<?= $head->cara_bayar;?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">PPN : </label>
                                <div class="input-group">
                                      <span class="input-group-addon">
                                         <input type="checkbox" name="s" id="Idppn" value="1" <?= ($head->ppn == 1) ? 'checked' : '';?>>
                                      </span>
                                    <input type="hidden" name="ppn" value="<?= $head->total * 10 / 100;?>" id="ppnh">
                                    <input type="text" name="ppn" id="ppn" disabled class="form-control"  value="Rp. <?= ($head->ppn == 1) ? number_format($head->total * 10 / 100,2,',','.') : number_format(0,2,',','.');?>">
                                </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label">Total : </label>
                              <input type="hidden" name="t" value="<?= $head->total;?>" id="totalh">
                              <input type="text" name="total" class="form-control" disabled value="Rp. <?= ($head->ppn == 1) ? number_format($head->total + $head->total * 10 / 100,2,',','.') : number_format($head->total,2,',','.');?>" id="total">
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php endforeach; ?>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Detail Penerimaan</h3>
                    </div>
                    <div class="box-body">
                            <table class="table table-bordered table-condensed table-striped trx-table" id="table-row"> <!-- << Ganti name table-id sesuai no trx >> -->
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Tgl EXp</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th>Harga Jual</th>
                                        <th>Sub Total</th>
                                        <th>
                                            <button type="button" class="btn btn-primary btn-sm" id="addRow"><span class="fa fa-plus"></span> Tambah</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($penerimaan['detail'] as $key => $detail): ?>
                                    <tr>
                                      <td style="width: 30%"><select class="form-control" name="nama_product" id="selects<?= $key;?>" ></select>
                                      <input type="hidden" class="form-control" name="detail[<?= $key;?>][id_product]" id="id_product<?= $key;?>" value="<?= $detail->id_product;?>"/></td>
                                      <td><input type="date" class="form-control" name="detail[<?= $key;?>][tgl_exp]" id="exp<?= $key;?>" value="<?= $detail->tgl_exp;?>"/></td>
                                      <td><input type="number"  class="form-control" value="<?= $detail->qty;?>" onkeyup="HitungSubTotal(<?= $key;?>)" name="detail[<?= $key;?>][qty]" id="qty<?= $key;?>"/></td>
                                      <td><input type="text" class="form-control" name="detail[<?= $key;?>][harga]" value="<?= $detail->harga;?>" onkeyup="HitungSubTotal(<?= $key;?>)"  id="harga<?= $key;?>"/></td>
                                      <td><input type="text" class="form-control" name="detail[<?= $key;?>][harga_jual]" value="<?= $detail->harga_jual;?>" id="harga_jual<?= $key;?>"/>
                                      <input type="hidden" class="form-control sub" name="detail[<?= $key;?>][sub_total]" value="<?= $detail->sub_total;?>" id="sub_total<?= $key;?>"/></td>
                                      <td><input type="text"   class="form-control" name="ss" id="sub_totals<?= $key;?>" value="<?= $detail->sub_total;?>"/></td>
                                      <td><input type="button" class="ibtnDel btn btn-md btn-danger " onClick="return ConfirmDialog();" value="Hapus"></td>
                                    </tr>
                                    <script type="text/javascript">
                                      createSelectizeedit($('#selects<?= $key;?>'), '<?= $detail->nama_product?>','#id_product<?= $key;?>');
                                    </script>
                                    <?php $index = $key; ?>
                                  <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                  </div>
                  <div class="form-group">
                    <?= BtnSave('Simpan');?>
                    <?= BtnBack('gudang/penerimaan');?>
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
     $(document).ready(function(){
        $('#select').selectize({
            valueField: 'nama_suplier',
            labelField: 'nama_suplier',
            searchField: 'nama_suplier',
            placeholder: "<?= $nama_suplier ?>",
            options: [],
            create: false,
            render: {
                option: function(item, escape) {
                        return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                '<div class="col-xs-2" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_suplier) + '</strong></p>' + '</div>' +
                                '<div class="col-xs-10" style="border-left :1px solid #ddd; padding: 0px;">' +
                                    '<div class="col-xs-12" style="padding-left: 4px;">' +
                                        '<p style="margin-bottom: 2px !important;"><strong> No Telp :' + escape(item.telp) + '</strong></p>' +
                                        '<p style="margin-bottom: 2px !important;"><small>Nama : ' + escape(item.nama_suplier) + '</small></p>' +
                                    '</div>' +
                                    //'<div class="col-xs-12">' + '<small>' + escape(item.ket_icd_icd10) + '</small>' + '</div>' +
                                '</div>' +
                            '</div>';
                }
            },
            load: function(query, callback) {
                if (!query.length) return callback();
                $.ajax({
                    url: '<?= base_url();?>gudang/suplier/json',
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
              $('#id_suplier').val(data.id_suplier);
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#id_suplier').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#id_suplier').val("");
            },
            onLoad: function(){
              $('#select').val('Ketik Untuk Mencari Nama Supplier');
            }
        });

     });

         function createSelectize(element, id) {
            $(element).selectize({
                valueField: 'nama_product',
                labelField: 'nama_product',
                searchField: 'nama_product',
                placeholder: "Ketik Untuk Mencari Nama Obat",
                options: [],
                create: false,
                render: {
                    option: function(item, escape) {
                            return '<div class="col-xs-12" style="border-top :1px solid #ccc; padding: 0px !important">' +
                                    '<div class="col-xs-12" style="padding-left: 4px;">' + '<p><strong> Nama :' + escape(item.nama_product) + '</strong></p>' + '</div>' +
                                '</div>';
                    }
                },
                load: function(query, callback) {
                    if (!query.length) return callback();
                    $.ajax({
                        url: '<?= base_url();?>gudang/product/json',
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
                  $(id).val(data.id_product);
                },
                onDelete : function(value, $item) {
                    let data = this.options[value];
                    $(id).val("");
                },
                onItemRemove : function(value, $item) {
                    let data = this.options[value];
                    $(id).val("");
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
              Total = $('#totalh').val();
              ppnAwal = $('#ppnh').val();
              totalAkhir = Total - ppnAwal
              $('#ppnh').val(0)
              $('#total').val(totalAkhir.toLocaleString());
              $('#totalh').val(totalAkhir);
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
          let index = '<?= $index + 1;?>'

          $("#addRow").on("click", function () {
              var newRow = $("<tr>");
              var cols = "";

              cols += '<td  style="width: 30%"><select class="form-control" name="nama_product" id="select' + index + '" required></select>';
              cols += '<input type="hidden" class="form-control" name="detail[' + index + '][id_product]" id="id_product' + index + '"/></td>';
              cols += '<td><input type="date" class="form-control" name="detail[' + index + '][tgl_exp]" id="exp' + index + '"/></td>';
              cols += '<td><input type="number" value="0" class="form-control" onkeyup="HitungSubTotal('+index+')" name="detail[' + index + '][qty]" id="qty'+ index + '"/></td>';
              cols += '<td><input type="text" class="form-control" name="detail[' + index + '][harga]" onkeyup="HitungSubTotal('+index+')"  id="harga'+ index + '"/></td>';
              cols += '<td><input type="text" class="form-control" name="detail[' + index + '][harga_jual]" id="harga_jual' + index + '"/>';
              cols += '<input type="hidden" class="form-control sub" name="detail[' + index + '][sub_total]" id="sub_total' + index + '"/></td>';
              cols += '<td><input type="text"  value="0" class="form-control" name="ss" id="sub_totals' + index + '"/></td>';

              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " onClick="return ConfirmDialog();" value="Hapus"></td>';
              newRow.append(cols);
              $("#table-row").append(newRow);
              createSelectize('#select'+index,'#id_product'+index);
              index++;
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
</script>
