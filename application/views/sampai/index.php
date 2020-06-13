<h3>Data Barang Sampai</h3>
<table id="sampai-barang">
  <thead>
    <tr>
      <th>No Waybill</th>
      <th>Tempat sebelumnya</th>
      <th>Kurir</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sampai as $data) : ?>
      <tr>
        <td><?php echo $data['no_waybill']; ?></td>
        <td><?php echo $data['tempat_sebelumnya']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><a href="<?php echo site_url('sampai/edit/') . $data['id_sampai_barang'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a onclick="return confirm('Apa kamu yakin?')" href="<?php echo site_url('sampai/hapus/') . $data['id_sampai_barang'] ?>" 
            class="btn btn-danger"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
    $('#sampai-barang').DataTable();
</script>
