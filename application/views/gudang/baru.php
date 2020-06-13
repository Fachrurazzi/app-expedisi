<form action="<?php echo site_url('gudang/tambah') ?>" method="post">
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
      <select name="alasan" class="form-control" required="true">
        <option value="NO BERMASALAH" selected>NO BERMASALAH</option>
        <option value="ALAMAT TDK DITEMUKAN">ALAMAT TDK DITEMUKAN</option>
        <option value="PENDING">PENDING</option>
        <option value="PELANGGAN AMBIL DI DP">PELANGGAN AMBIL DI DP</option>
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