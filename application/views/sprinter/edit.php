<form action="<?php echo site_url('sprinter/ubah/') . $this->uri->segment(3) ?>" method="post">
    <div class="form-group">
      <label for="id_karyawan">No waybill</label>
      <select class="form-control" id="karyawan" name="id_karyawan" required="true">
        <?php foreach ($karyawan as $data): ?>
            <?php if ($data['id_karyawan'] == $sprinter['id_karyawan']): ?>
              <option value="<?php echo $data['id_karyawan'] ?>" selected><?php echo $data['nama'] ?></option>
            <?php else: ?>
              <option value="<?php echo $data['id_karyawan'] ?>"><?php echo $data['nama'] ?></option>
            <?php endif ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="jumlah_barang">Jumlah Barang</label>
      <input type="number" name="jumlah_barang" value="<?php echo $sprinter['jumlah_barang'] ?>" class="form-control" required="true" value="1" min="1" max="100">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Ubah">
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#karyawan").select2();
    });
</script>