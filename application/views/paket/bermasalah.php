<h3>Data Paket Bermasalah</h3>
<table id="paket-bermasalah">
  <thead>
    <tr>
      <th>No Waybill</th>
      <th>Alasan</th>
      <th>Status</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paket_bermasalah as $paket) : ?>
      <tr>
        <td><?php echo $paket['no_waybill']; ?></td>
        <td><?php echo $paket['alasan']; ?></td>
        <td><?php echo $paket['status']; ?></td>
        <td><a href="<?php echo site_url('paket/edit_paket_bermasalah/') . $paket['id_paket_bermasalah'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a onclick="return confirm('Apa kamu yakin?')" href="<?php echo site_url('paket/hapus_paket_bermasalah/') . $paket['id_paket_bermasalah'] ?>" 
            class="btn btn-danger"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
  $('#paket-bermasalah').DataTable();
</script>
