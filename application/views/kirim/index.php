<h3>Data Kirim Barang</h3>
<table id="kirim-barang">
  <thead>
    <tr>
      <th>No Waybill</th>
      <th>Tempat selanjutnya</th>
      <th>Kurir</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kirim as $data) : ?>
      <tr>
        <td><?php echo $data['no_waybill']; ?></td>
        <td><?php echo $data['tempat_selanjutnya']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><a href="<?php echo site_url('kirim/edit/') . $data['id_kirim_barang'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a onclick="return confirm('Apa kamu yakin?')" href="<?php echo site_url('kirim/hapus/') . $data['id_kirim_barang'] ?>" 
            class="btn btn-danger"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
    $('#kirim-barang').DataTable();
</script>
