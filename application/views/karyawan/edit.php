<form action="<?php echo site_url('karyawan/ubah/') . $this->uri->segment(3) ?>" method="post">
    <div class="form-group">
      <label for="nik">NIK</label>
      <input type="text" name="nik" class="form-control" value="<?php echo $karyawan['nik'] ?>" disabled>
    </div>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?php echo $karyawan['nama'] ?>">
    </div>
    <div class="form-group">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $karyawan['tempat_lahir'] ?>">
    </div>
    <div class="form-group">
      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $karyawan['tanggal_lahir'] ?>">
    </div>
    <div class="form-group">
      <label for="no_hp">No. HP</label>
      <input type="text" name="no_hp" class="form-control" value="<?php echo $karyawan['no_hp'] ?>">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" class="form-control" value="<?php echo $karyawan['alamat'] ?>">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Ubah">
    </div>
</form>
