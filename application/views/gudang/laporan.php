<div class="col-md-2">
<form action="<?php echo site_url('gudang/laporan_masuk_gudang') ?>" method="get" target="_blank">
    <div class="form-group">
        <label>Alasan</label>
          <select name="alasan" class="form-control" required="true">
            <option value="NO BERMASALAH" selected>NO BERMASALAH</option>
            <option value="ALAMAT TDK DITEMUKAN">ALAMAT TDK DITEMUKAN</option>
            <option value="PENDING">PENDING</option>
            <option value="PELANGGAN AMBIL DI DP">PELANGGAN AMBIL DI DP</option>
          </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Tampilkan" class="btn btn-success">
    </div>
</form>    
</div>
