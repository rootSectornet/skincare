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
             <h2>Laporan Pengunjung</h2>
           </div>
           <div class="box-body">
             <div class="row">

               <form class="form-horizontal">
                 <div class="col-md-8">
                   <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Option</label>
                     <div class="col-sm-10">
                      <select class="form-control" name="option" id="option">
                        <option value="2">ALL</option>
                        <option value="1">Sudah Lunas</option>
                        <option value="0">Belum Lunas</option>
                      </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Awal</label>

                     <div class="col-sm-10">
                       <input type="text" class="form-control " id="tgl_awal">
                     </div>
                   </div>
                   <div class="form-group">
                     <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Akhir</label>

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
                     <th>Kode Pendaftaran</th>
                     <th>Tanggal Daftar</th>
                     <th>No RM</th>
                     <th>Nama Pasien</th>
                     <th>Keterangan</th>
                     <th>Tagihan</th>
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

 $('#group').selectize({
       create : false,
       plugins : ['restore_on_backspace'],
       sortField: 'text'
   });
 function ConfirmDialog() {
 var x=confirm("Apakah anda yakin ingin menghapus data ini?")
 if (x) {
   return true;
 } else {
   return false;
 }
}

$(document).ready(function(){
 $('#filter').click(function(){
   let dataPost = {
     awal : $('#tgl_awal').val(),
     akhir : $('#tgl_akhir').val(),
     option : $('#option').val()
   }
    let dataKirim = JSON.stringify(dataPost);
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url(); ?>Laporan/Laporan/listLaporanPengunjung',
           data: 'data=' + dataKirim,
           success: function(response) {
               $('#data').html(response);
                    $('.print').remove()
                   $('.tools').append('<a href="<?= base_url();?>Laporan/Laporan/listLaporanPengunjungPrint/'+dataPost.awal+'/'+dataPost.akhir+'/'+dataPost.option+'" class="btn btn-default print"  data-tooltip="tooltip" data-placement="top" title="Print Laporan"><i class="fa fa-print"></i></a>')

           }
       });
 });
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>
