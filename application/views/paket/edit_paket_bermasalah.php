<form action="<?php echo site_url('paket/tambah_paket_bermasalah') ?>" method="post">
    <div class="form-group">
      <label for="no_waybill">No waybill</label>
      <select class="form-control" id="no_waybill" name="no_waybill" required="true">
        <?php foreach ($pengiriman as $data): ?>
          <?php if ($data['no_waybill'] == $paket_bermasalah['no_waybill']): ?>
            <option value="<?php echo $data['no_waybill'] ?>" selected><?php echo $data['no_waybill'] ?></option>
          <?php else: ?>
            <option value="<?php echo $data['no_waybill'] ?>"><?php echo $data['no_waybill'] ?></option>
          <?php endif ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="alasan">Alasan</label>
      <?php $options = ["BARANG RUSAK", "BARANG HILANG", "PENERIMA MENOLAK BARANG"]; ?>
      <select name="alasan" class="form-control" required="true">
        <?php foreach ($options as $option): ?>
          <?php if ($option == $paket_bermasalah['alasan']): ?>
            <option value="<?php echo $option ?>" selected><?php echo $option ?></option>
          <?php else: ?>
            <option value="<?php echo $option ?>"><?php echo $option ?></option>
          <?php endif ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" required="true">
        <option value="BELUM SELESAI">BELUM SELESAI</option>
        <option value="SELESAI">SELESAI</option>
      </select>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#no_waybill").select2();
    });
</script>