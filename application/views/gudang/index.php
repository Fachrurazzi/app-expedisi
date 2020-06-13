<h3>Data Barang Masuk Gudang</h3>
<table id="gudang">
  <thead>
    <tr>
      <th>No Waybill</th>
      <th>Alasan</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data_gudang as $gudang) : ?>
      <tr>
        <td><?php echo $gudang['no_waybill']; ?></td>
        <td><?php echo $gudang['alasan']; ?></td>
        <td><a href="<?php echo site_url('gudang/edit/') . $gudang['id_barang_gudang'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a onclick="return confirm('Apa kamu yakin?')" href="<?php echo site_url('gudang/hapus/') . $gudang['id_barang_gudang'] ?>" 
            class="btn btn-danger"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
  $('#gudang').DataTable();
</script>
