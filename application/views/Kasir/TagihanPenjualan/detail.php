<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Detail Tagihan <strong><?= $tagihan->id_tagihan;?></strong>
     </h1>
    <?php
      $totalSemua = $tagihan->total;
       if ($tagihan->ppn == 1) {
         $totalSemua = $tagihan->total + ($tagihan->total * 10 / 100);
       }
       ?>
   </section>
   <!-- Main content -->
   <section class="content">
     <!-- /.row -->
     <div class="row">
       <div class="col-xs-12">
         <div class="box box-default">
           <div class="box-header with-border">
             <?= BtnBack('Kasir/Tpenjualan');?>
               <button type="button" name="button" <?= $tagihan->flag_lunas == '1' ? 'disabled' : '';?>  class="btn btn-info proses" onclick="ModalPelunasan(<?= $tagihan->id_billing;?>,<?= $totalSemua;?>)"  data-tooltip="tooltip" data-placement="top" title="Proses Pembayaran">Proses</button>
               <?= BtnPrint('gudang/penjualan/print/'.$tagihan->faktur_penjualan, $tagihan->faktur_penjualan);?>
             <div class="box-tools pull-right">
               <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div align="center">
                 <h2><strong>SKIN CARE</strong></h2>
                 <p>Jl. Salak 8. No 10, Pondok Benda, Pamulang - Tangerang Selatan</p>
               </div>
             </div><br><br>
             <div class="">
               <div class="col-md-6">
                 <div align="left" class="kiri">

                  <p>No Faktur : <?= $tagihan->id_tagihan;?></p>
                  <p>Status    : <?= $tagihan->flag_lunas == '0' ? '<strong id="status">Belum Lunas</strong>' : '<strong id="status">Lunas</strong>';?></p>
                  <?php if ($tagihan->flag_lunas == '1'): ?>
                    <p>Total Yang Dibayar : Rp. <?= number_format($tagihan->nilai_terbayar,0,',','.');?></p>
                  <?php endif; ?>
                 </div>
               </div>
               <div class="col-md-6">
                 <div align="right" class="kanan">
                   <p>Tanggal : <?= $tagihan->tgl_penjualan;?></p>
                   <p> Cara bayar : <?= $tagihan->cara_bayar;?></p>
                   <?php if ($tagihan->flag_lunas == '1'): ?>
                     <p>Sisa : Rp. <?= number_format($tagihan->nilai_terbayar - $tagihan->nilai_tagihan,0,',','.');?></p>
                   <?php endif; ?>
                 </div>
               </div>
             </div>
             <div class="clearfix"></div>
             <div class="">
               <div class="table-responsive">
                 <table class="table table-striped table-hover">
                   <thead>
                     <tr>
                       <th>NO</th>
                       <th>Barang</th>
                       <th>Jumlah</th>
                       <th>Harga</th>
                       <th>Total</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $total = 0; ?>
                     <?php if (isset($tagihan->detail)): ?>
                       <?php foreach ($tagihan->detail as $key => $value): ?>
                           <?php if ($value->flag_retur == '1' && isset($value->retur)){ ?>
                                 <tr>
                                   <td><?= $key + 1;?></td>
                                   <td><?= $value->retur->nama_product;?></td>
                                   <td><?= $value->retur->qty_retur;?></td>
                                   <td>Rp. <?= number_format($value->retur->harga_jual,0,',','.');?></td>
                                   <td>Rp. <?= number_format($value->retur->sub_total,0,',','.');?></td>
                                 </tr>
                           <?php }else { ?>
                               <tr>
                                 <td><?= $key + 1;?></td>
                                 <td><?= $value->nama_product;?></td>
                                 <td><?= $value->qty;?></td>
                                 <td>Rp. <?= number_format($value->harga,0,',','.');?></td>
                                 <td>Rp. <?= number_format($value->sub_total,0,',','.');?></td>
                               </tr>
                           <?php } ?>
                       <?php endforeach; ?>
                     <?php endif; ?>
                       <tr>
                         <td colspan="4" align="right">PPN  : </td>
                         <td  align="left">
                           <?php
                           if ($tagihan->ppn == 1) {
                             echo "Rp. ".number_format($tagihan->total * 10 /100,0,',','.');
                           }
                           ?>
                         </td>
                         </tr>
                         <td colspan="4" align="right">Total Harga  : </td>
                         <td  align="left">
                           <?php
                           echo "Rp. ".number_format($totalSemua,0,',','.');
                           ?>
                         </td>
                       </tr>
                       <tr>
                         <td colspan="5">Kasir : <strong><?= $this->session->userdata('nama_pegawai');?></strong></td>
                       </tr>
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>
       <!-- /.col -->
     </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <div class="modal fade" id="ModalPembayaran" role="dialog">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Proses Pelunasan</h4>
       </div>
       <div class="modal-body">
         <input type="hidden" id="idBilling">
         <div class="form-group">
             <label for="Tagihan">Tagihan Pasien : </label>
             <input type="text" name="Tagihan" id="Tagihan" class="form-control" disabled>
         </div>
         <div class="form-group">
             <label for="bayar">Bayar : </label>
             <input type="text" name="bayar" id="bayar" class="form-control">
         </div>
       </div>
       <div class="modal-footer">
         <button type="submit" class="btn btn-info" onclick="save()" id="save">Simpan</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>

 <script type="text/javascript">
 $(function () {
   $('[data-tooltip="tooltip"]').tooltip()
 });

 function ModalPelunasan(id,total){
     let MyModalPelunasan = $('#ModalPembayaran');
     MyModalPelunasan.find('.modal-body #idBilling').val(id);
     MyModalPelunasan.find('.modal-body #Tagihan').val('Rp.' + total.toLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0}));
     MyModalPelunasan.modal('show');
 }

 function save(){
   let MyModalPelunasan = $('#ModalPembayaran');
   MyModalPelunasan.find('.modal-header h4').html('Information !');
   let data = {
     idBilling : $('.modal-body #idBilling').val(),
     total : <?= $totalSemua;?>,
     bayar : $('.modal-body #bayar').val(),
     faktur : "<?= $tagihan->id_tagihan;?>"
   }
   if (data.bayar < data.total) {
       alert('Uang Yang Diabayarkan Tidak Boleh Kurang Dari Tagihan !');
   }else if (data.bayar == '') {
     alert('Uang Yang Diabayarkan Tidak Boleh Kosong !');
   }else{
     let Jsondata = JSON.stringify(data);
     $.ajax({
         type: 'POST', // Metode pengiriman data menggunakan POST
         url: '<?php echo base_url(); ?>Kasir/Tpenjualan/Bayar', // File pemroses data
         data: 'post=' + Jsondata, // Data yang akan dikirim ke file pemroses
         success: function(response) { // Jika berhasil
             let hasil = JSON.parse(response);
             if (hasil.code == '200') {
               MyModalPelunasan.find('.modal-body').html('<p class="red"> Proses Pelunasan Berhasil !</p><p>Status : '+hasil.status+'</p><p>Sisa Uang : '+hasil.sisa.toLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0})+'</p>');
               MyModalPelunasan.find('.modal-footer #save').prop('disabled',true);
               $('#status').html(hasil.status);
               $('.proses').prop('disabled',true);
               $('.kiri').append('<p>Total Yang Dibayar : Rp. '+hasil.bayartoLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0})+'</p>');
               $('.kanan').append('<p>Sisa : Rp. '+hasil.sisatoLocaleString('en', {minimumFractionDigits: 0, maximumFractionDigits: 0})+'</p>');
             }else if (hasil.code == '300') {
                 MyModalPelunasan.find('.modal-body').html('<p class="red"> Gagal Melakukan Pelunasan !</p>');
                 MyModalPelunasan.find('.modal-footer #save').prop('disabled',true);
             }else{
                 MyModalPelunasan.find('.modal-body').html('<p class="red"> Uang Yang Dibayar Lebih Kecil Dari Nilai Tagihan !</p>');
                 MyModalPelunasan.find('.modal-footer #save').prop('disabled',true);
             }
             console.log(hasil);
           },
         ajaxSend: function(){
           Pace.restart()
         },
         beforeSend: function(){
           Pace.restart()
         }

     });
   }
 }

 $(document).ajaxStart(function () {
   Pace.restart()
 })
 </script>
