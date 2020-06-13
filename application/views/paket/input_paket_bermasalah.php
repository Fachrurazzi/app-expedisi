<form action="<?php echo site_url('paket/tambah_paket_bermasalah') ?>" method="post">
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
      <label for="alasan">Alasan</label>
      <select class="form-control" name="alasan" required="true">
        <option value="BARANG RUSAK" selected>BARANG RUSAK</option>
        <option value="BARANG HILANG">BARANG HILANG</option>
        <option value="PENERIMA MENOLAK BARANG">PENERIMA MENOLAK BARANG</option>
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" required="true">
        <option value="BELUM SELESAI" selected>BELUM SELESAI</option>
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