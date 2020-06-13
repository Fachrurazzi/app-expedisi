<div class="col-md-2">
<form action="<?php echo site_url('sprinter/laporan_sprinter') ?>" method="get" target="_blank">
    <div class="form-group">
        <label>Tanggal awal</label>
        <input type="date" name="tanggal_awal" class="form-control" required="true">
        <label>Tanggal akhir</label>
        <input type="date" name="tanggal_akhir" class="form-control" required="true">
    </div>
    <div class="form-group">
        <input type="submit" value="Tampilkan" class="btn btn-success">
    </div>
</form>    
</div>
