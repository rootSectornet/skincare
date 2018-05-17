<link rel="stylesheet" href="<?= base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
             <h2>Data Stock Of Name  <?= BtnCreate('gudang/StockOfname/create','Stock Of Name');?>
             </h2>
           </div>
           <div class="box-body">
             <div class="row">
               <div class="col-md-6 col-md-offset-3">
                 <form class="form-horizontal">
                   <div class="col-md-">
                     <label class="control-label">Tanggal : </label>
                   </div>
                   <div class="col-md-10">
                     <div class="input-group input-group-sm">
                       <input type="text" class="form-control" id="tgl_filter">
                           <span class="input-group-btn">
                             <button type="button" class="btn btn-info btn-flat" id="filter"><i class="fa fa-search"></i></button>
                           </span>
                     </div>
                   </div>
                 </form>
               </div>
             </div>
             <div class="s">
               <table class="table table-bordered table-striped table-hover" id="table">
                 <thead>
                   <tr>
                     <th>No</th>
                     <th>Nama Product</th>
                     <th>Tanggal</th>
                     <th>QTY</th>
                     <th>QTY Rusak</th>
                     <th>QTY EXP</th>
                     <th>QTY Terjual</th>
                     <th>QTY Fisik</th>
                     <th>Selisih</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody id="hasil">
                   <?php foreach ($list as $key => $row): ?>
                      <tr>
                        <td><?= $key + 1;?></td>
                        <td><?= $row->nama_product;?></td>
                        <td><?= $row->tgl_stockOfName;?></td>
                        <td><?= $row->qty;?></td>
                        <td><?= $row->qty_rusak;?></td>
                        <td><?= $row->qty_exp;?></td>
                        <td><?= $row->qty_terjual;?></td>
                        <td><?= $row->qty_baru;?></td>
                        <td><?= $row->qty_baru - $row->qty;?></td>
                        <td>
                          <?php
                              if ($row->flag_verif == 0) {
                                echo BtnVerif('gudang/StockOfname/verif/'.$row->id_stockOfName, 'Stock Of Name');
                                echo  BtnDelete('gudang/StockOfname/delete/'.$row->id_stockOfName, 'Stock Of Name');
                              }
                           ?>
                        </td>
                      </tr>
                   <?php endforeach; ?>
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

   $('#tgl_filter').datetimepicker({
       format:'Y-m-d',
       mask:false,
       timepicker:false,
       minDate: '-2015/01/01'
   });
 function ConfirmDialog() {
 var x=confirm("Apakah anda yakin ingin menghapus data ini?")
 if (x) {
   return true;
 } else {
   return false;
 }
}
function ConfirmVerif() {
var x=confirm("Apakah anda yakin ingin Memverifikasi data ini?")
if (x) {
 return true;
} else {
 return false;
}
}
$(document).ready(function(){
 $('#filter').click(function(){
     let tgl = $('#tgl_filter').val();
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url(); ?>gudang/StockOfname/list',
           data: 'tgl=' + tgl,
           success: function(response) {
               $('.s').html(response);
           }
       });
 });
});
</script>
