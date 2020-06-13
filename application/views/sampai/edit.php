<form action="<?php echo site_url('sampai/ubah/') . $this->uri->segment(3) ?>" method="post">
    <div class="form-group">
      <label for="no_waybill">No waybill</label>
      <select class="form-control" id="no_waybill" name="no_waybill" required="true">
        <option value="" disabled selected>No waybill</option>
        <?php foreach ($pengiriman as $data): ?>
          <?php if ($sampai['no_waybill'] == $data['no_waybill']) : ?>
            <option value="<?php echo $data['no_waybill'] ?>" selected><?php echo $data['no_waybill'] ?></option>
          <?php else : ?>
            <option value="<?php echo $data['no_waybill'] ?>"><?php echo $data['no_waybill'] ?></option>
          <?php endif ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="tempat_sebelumnya">Tempat Sebelumnya</label>
      <select class="form-control" id="tempat_sebelumnya" name="tempat_sebelumnya" required="true">
        <option value="" disabled>Pilih tempat sebelumnya</option>
        <?php $options = ["Haruai","Uya", "Tanta", "Murung Pudak", "Jaro", "Muara lawas", "Pugaan", "Kalua", "Bintang Ara"] ?>
        <?php foreach ($options as $option): ?>
          <?php if ($option == $sampai['tempat_sebelumnya']): ?>
            <option value="<?= $sampai['tempat_sebelumnya'] ?>" selected><?= $sampai['tempat_sebelumnya'] ?></option>
          <?php else: ?>
            <option value="<?= $option ?>"><?= $option ?></option>
          <?php endif; ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
    <div class="form-group">
      <label for="id_karyawan">No waybill</label>
      <select class="form-control" id="karyawan" name="id_karyawan" required="true">
        <?php foreach ($karyawan as $data): ?>
            <?php if ($data['id_karyawan'] == $sampai['id_karyawan']): ?>
              <option value="<?php echo $data['id_karyawan'] ?>" selected><?php echo $data['nama'] ?></option>
            <?php else: ?>
              <option value="<?php echo $data['id_karyawan'] ?>"><?php echo $data['nama'] ?></option>
            <?php endif ?>
        <?php endforeach ?>
      </select>
    </div>
      <input type="submit" class="btn btn-primary" value="Ubah">
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#no_waybill").select2();
        $("#tempat_sebelumnya").select2();
        $("#karyawan").select2();
    });
</script>