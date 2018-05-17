<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
             <h2>Laporan Penerimaan</h2>
           </div>
           <div class="box-body">
             <div class="row">

               <form class="form-horizontal">
                 <div class="col-md-8">
                   <div class="form-group">
                     <input type="hidden" name="id_suplier" id="id_suplier">
                     <label for="inputEmail3" class="col-sm-2 control-label">Supplier : </label>
                     <div class="col-sm-10">
                      <select class="form-control" name="option" id="select">
                      </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Awal :  </label>

                     <div class="col-sm-10">
                       <input type="text" class="form-control " id="tgl_awal">
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Akhir : </label>

                     <div class="col-sm-10">
                       <input type="text" class="form-control " id="tgl_akhir">
                     </div>
                   </div>
                   <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10 tools">
                       <button type="button" id="filter" name="button" class="btn btn-info">Filter</button>
                     </div>
                   </div>
                 </div>
                 <!-- /.box-body -->
                 <!-- /.box-footer -->
               </form>
             </div>
             <div id="data">
               <table class="table table-bordered table-striped table-hover" id="table">
                 <thead>
                   <tr>
                     <th>No Faktur</th>
                     <th>Tanggal</th>
                     <th>Cara Bayar</th>
                     <th>PPN</th>
                     <th>Total</th>
                   </tr>
                 </thead>
                 <tbody id="hasil">
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- /.content -->
 </div>
<script src="<?= base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
 $(function () {
   $('#table').DataTable({
     'paging'      : true,
     'lengthChange': true,
     'searching'   : true,
     'ordering'    : true,
     'info'        : true,
     'autoWidth'   : true
   })
 });
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
  $('#tgl_awal').datetimepicker({
       format:'Y-m-d',
       mask:false,
       timepicker:false,
       minDate: '-2015/01/01'
   });
   $('#tgl_akhir').datetimepicker({
       format:'Y-m-d',
       mask:false,
       timepicker:false,
       minDate: '-2015/01/01'
   });
$(document).ready(function(){
   $('#select').selectize({
       valueField: 'nama_suplier',
       labelField: 'nama_suplier',
       searchField: 'nama_suplier',
       placeholder: "Ketik Untuk Mencari Nama Supplier",
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
$(document).ready(function(){
 $('#filter').click(function(){
   let dataPost = {
     awal : $('#tgl_awal').val(),
     akhir : $('#tgl_akhir').val(),
     id : $('#id_suplier').val()
   }
    let dataKirim = JSON.stringify(dataPost);
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url(); ?>Laporan/Laporan/listLaporanPenerimaan',
           data: 'data=' + dataKirim,
           success: function(response) {
               $('#data').html(response);
                    $('.print').remove()
                   $('.tools').append('<a href="<?= base_url();?>Laporan/Laporan/listLaporanPenerimaanPrint/'+dataPost.awal+'/'+dataPost.akhir+'/'+dataPost.id+'" class="btn btn-default print"  data-tooltip="tooltip" data-placement="top" title="Print Laporan"><i class="fa fa-print"></i></a>')

           }
       });
 });
});
</script>
