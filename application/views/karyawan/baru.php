<form action="<?php echo site_url('karyawan/tambah') ?>" method="post">
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" class="form-control">
    </div>
    <div class="form-group">
      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control">
    </div>
    <div class="form-group">
      <label for="no_hp">No. Hp</label>
      <input type="text" name="no_hp" class="form-control">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>
