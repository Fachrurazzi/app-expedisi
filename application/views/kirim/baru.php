<form action="<?php echo site_url('kirim/tambah') ?>" method="post">
    <div class="form-group">
      <label for="no_waybill">No waybill</label>
      <select class="form-control" id="no_waybill" name="no_waybill" required="true">
        <option value="" disabled selected>No waybill</option>
        <?php foreach ($pengiriman as $data): ?>
            <option value="<?php echo $data['no_waybill'] ?>"><?php echo $data['no_waybill'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="tempat_selanjutnya">Tempat Selanjutnya</label>
      <select class="form-control" id="tempat_selanjutnya" name="tempat_selanjutnya" required="true">
        <option value="" disabled selected>Pilih tempat selanjutnya</option>
        <option value="Haruai">Haruai</option>
        <option value="Uya">Uya</option>
        <option value="Tanta">Tanta</option>
        <option value="Murung Pudak">Murung Pudak</option>
        <option value="Jaro">Jaro</option>
        <option value="Muara lawas">Muara Lawas</option>
        <option value="Pugaan">Pugaan</option>
        <option value="Kalua">Kalua</option>
        <option value="Bintang Ara">Bintang ara</option>
      </select>
    </div>
    <div class="form-group">
      <label for="id_karyawan">Kurir</label>
      <select class="form-control" id="karyawan" name="id_karyawan" required="true">
        <option value="" disabled selected>Pilih kurir</option>
        <?php foreach ($karyawan as $data): ?>
            <option value="<?php echo $data['id_karyawan'] ?>"><?php echo $data['nama'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#no_waybill").select2();
        $("#tempat_selanjutnya").select2();
        $("#karyawan").select2();
    });
</script>