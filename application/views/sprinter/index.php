<h3>Data Kurir</h3>
<table id="sprinter">
  <thead>
    <tr>
      <th>NIK</th>
      <th>Nama Kurir</th>
      <th>Jumlah barang</th>
      <th>Tanggal</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sprinter as $sprint) : ?>
      <tr>
        <td><?php echo $sprint['nik']; ?></td>
        <td><?php echo $sprint['nama']; ?></td>
        <td><?php echo $sprint['jumlah_barang']; ?></td>
        <td><?php echo $sprint['tanggal']; ?></td>
        <td><a href="<?php echo site_url('sprinter/edit/') . $sprint['id_sprinter'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a onclick="return confirm('Apa kamu yakin?')" href="<?php echo site_url('sprinter/hapus/') . $sprint['id_sprinter'] ?>" 
            class="btn btn-danger"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
    $('#sprinter').DataTable();
</script>
