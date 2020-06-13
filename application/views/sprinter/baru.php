<form action="<?php echo site_url('sprinter/tambah') ?>" method="post">
    <div class="form-group">
      <label for="id_karyawan">Kurir</label>
      <select class="form-control" id="karyawan" name="id_karyawan" required="true">
        <option value="" disabled selected>Pilih karyawan</option>
        <?php foreach ($karyawan as $data): ?>
            <option value="<?php echo $data['id_karyawan'] ?>"><?php echo $data['nama'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="jumlah_barang">Jumlah Barang</label>
      <input type="number" name="jumlah_barang" class="form-control" required="true" value="1" min="1" max="100">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#karyawan").select2();
    });
</script>