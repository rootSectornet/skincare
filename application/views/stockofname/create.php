
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
              <h2>Stock Of Name
              </h2>
            </div>
            <div class="box-body">
              <div class="form">
                <?= form_open();?>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Filter</h3>
                    </div>
                    <div class="box-body">
                      <input type="hidden" name="head[id_product]" id="id_product">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                          <label class="control-label">Nama Product : </label>
                          <select class="form-control" name="nama_product" id="select" required>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Tgl Awal : </label>
                          <input type="date" name="awal" class="form-control">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Tgl Akhir : </label>
                          <input type="date" name="akhir" class="form-control">
                        </div>
                        <div class="form-group">
                          <button type="button" name="button" id="filter" class="btn btn-flat btn-primary"  data-toggle="tooltip" data-placement="top" title="Filter"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Product</h3>
                    </div>
                    <div class="box-body">
                            <table class="table table-bordered table-condensed table-striped trx-table" id="table-row"> <!-- << Ganti name table-id sesuai no trx >> -->
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>EXP</th>
                                        <th>Stock</th>
                                        <th>Stock Rusak</th>
                                        <th>Stock EXP</th>
                                        <th>Stock Terjual</th>
                                        <th>Stock Fisik</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                </tbody>
                            </table>
                    </div>
                  </div>
                  <div class="form-group">
                    <?= BtnSave('Simpan');?>
                    <?= BtnBack('gudang/StockOfname');?>
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
$('[name="awal"]').datetimepicker({
    format:'Y-m-d',
    mask:false,
    timepicker:false,
    minDate: '-2015/01/01'
});
$('[name="akhir"]').datetimepicker({
    format:'Y-m-d',
    mask:false,
    timepicker:false,
    minDate: '-2015/01/01'
});
     $(document).ready(function(){
        $('#select').selectize({
            valueField: 'nama_product',
            labelField: 'nama_product',
            searchField: 'nama_product',
            placeholder: "Ketik Untuk Mencari Nama Product",
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
              $('#id_product').val(data.id_product);
            },
            onDelete : function(value, $item) {
                let data = this.options[value];
                $('#id_product').val("");
            },
            onItemRemove : function(value, $item) {
                let data = this.options[value];
                $('#id_product').val("");
            },
            onLoad: function(){
              $('#select').val('Ketik Untuk Mencari Nama Product');
            }
        });

     });
  function ConfirmDialog() {
    var x=confirm("Apakah anda yakin ingin menghapus data ini?")
    if (x) {
      return true;
    } else {
      return false;
    }
  }
function AddRow(index,value){
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td ><input type="text" class="form-control" disabled name="nama_product" value="'+value.nama_product+'"><input type="hidden" class="form-control" required name="stock[id_product]" value="'+value.id_product+'"></td>';
            cols += '<td><input type="text" class="form-control" disabled name="exps" value="'+value.exp+'"><input type="hidden" class="form-control" required name="exp" value="'+value.exp+'"></td>';
            cols += '<td ><input type="text" class="form-control" disabled name="qty" value="'+value.qty+'"><input type="hidden" class="form-control" required name="stock[qty]" value="'+value.qty+'"></td>';
            cols += '<td ><input type="text" class="form-control" disabled name="qty_rusak" value="'+value.qty_rusak+'"><input type="hidden" class="form-control" required name="stock[qty_rusak]" value="'+value.qty_rusak+'"></td>';
            cols += '<td ><input type="text" class="form-control" disabled name="qty_exp" value="'+value.qty_exp+'"><input type="hidden" class="form-control" required name="stock[qty_exp]" value="'+value.qty_exp+'"></td>';
            cols += '<td ><input type="text" class="form-control" disabled name="qty_terjual" value="'+value.qtyTerjual+'"><input type="hidden" class="form-control" required name="stock[qty_terjual]" value="'+value.qtyTerjual+'"></td>';
            cols += '<td ><input type="text" class="form-control" required name="stock[qty_baru]" value=""></td>';
            newRow.html(cols);
            $("#body").html(newRow).show(8000);
}
  $(document).ready(()=>{
    $('#filter').click((filter)=>{
      let data = {
        id_product : $('#id_product').val(),
        awal : $('[name="awal"]').val(),
        akhir : $('[name="akhir"]').val(),
      }
      if (data.id_product.length === 0 && data.awal.length === 0 && data.akhir.length === 0) {
          alert('Silahkan Lengkapi Data Filter Terlebih Dahulu')
      }else{
        $.ajax({
          type : 'POST',
          url  : '<?php echo base_url(); ?>gudang/StockOfname/search',
          data : 'post='+ JSON.stringify(data),
          success : (res) =>{
            let hasil = JSON.parse(res)
            $.each(hasil, (index,value)=>{
              AddRow(index,value)
              console.log(hasil)
            })
            $('#filter').html('<i class="fa fa-filter"> Filter')
            $('#filter').removeClass('buttonload')
            $('#filter').prop('disabled',false)
          },
          ajaxSend: function(){
            $('#filter').html('Loading ... <i class="fa fa-spinner fa-spin">')
            $('#filter').addClass('buttonload')
            $('#filter').prop('disabled',true)
            Pace.restart()
          },
          beforeSend: function(){
            $('#filter').html('Loading ... <i class="fa fa-spinner fa-spin">')
            $('#filter').addClass('buttonload')
            $('#filter').prop('disabled',true)
            Pace.restart()
          }
        })
      }
    })
  })
</script>
