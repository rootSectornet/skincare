

  <?php foreach ($TagihanPasien as $key => $row): ?>
     <tr>
       <td><?= $row->id_trx_pendaftaran;?></td>
       <td><?= $row->no_rm;?></td>
       <td><?= $row->tgl;?></td>
       <td><?= $row->nama_pasien;?></td>
       <td><?= $row->flag_lunas == '0' ? 'Belum Lunas' : 'Lunas';?></td>
       <td>
         <?= BtnView('Kasir/Kasir/detailTagihan/'.$row->id_billing,'Pembayaran Detail');?>
       </td>
     </tr>
  <?php endforeach; ?>

<script type="text/javascript">

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>
