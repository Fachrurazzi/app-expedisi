<table id="karyawan">
  <thead>
    <tr>
      <th>NIK</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>No. HP</th>
      <th>Alamat</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data_karyawan as $karyawan) : ?>
      <tr>
        <td><?php echo $karyawan['nik']; ?></td>
        <td><?php echo $karyawan['nama']; ?></td>
        <td><?php echo $karyawan['tempat_lahir']; ?></td>
        <td><?php echo $karyawan['tanggal_lahir']; ?></td>
        <td><?php echo $karyawan['no_hp']; ?></td>
        <td><?php echo $karyawan['alamat']; ?></td>
        <td><a href="<?php echo site_url('karyawan/edit/') . $karyawan['id_karyawan'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a onclick="return confirm('Apa kamu yakin?')" href="<?php echo site_url('karyawan/hapus/') . $karyawan['id_karyawan'] ?>" 
            class="btn btn-danger"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
    $('#karyawan').DataTable();
</script>
