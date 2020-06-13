<form id="edit-pengiriman">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="no_waybill">No waybill</label>
      <input type="text" class="form-control" value="<?= $pengiriman['no_waybill'] ?>" name="no_waybill" placeholder="No waybill" disabled>
    </div>
    <div class="form-group col-md-4">
      <label for="tujuan_pengiriman">Tujuan Pengiriman</label>
      <select class="form-control" id="tujuan" name="tujuan_pengiriman">
        <option value="" disabled>Pilih tujuan pengiriman</option>
        <?php $options = ["Haruai","Uya", "Tanta", "Murung Pudak", "Jaro", "Muara lawas", "Pugaan", "Kalua", "Bintang Ara"] ?>
        <?php foreach ($options as $option): ?>
          <?php if ($option == $pengiriman['tujuan_pengiriman']): ?>
            <option value="<?= $pengiriman['tujuan_pengiriman'] ?>" selected><?= $pengiriman['tujuan_pengiriman'] ?></option>
          <?php else: ?>
            <option value="<?= $option ?>"><?= $option ?></option>
          <?php endif; ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="tgl_pengiriman">Tanggal Pengiriman</label>
      <input type="date" class="form-control" value="<?= $pengiriman['tgl_pengiriman'] ?>" name="tgl_pengiriman" placeholder="Tanggal pengiriman">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="metode_pembayaran">Metode Pembayaran</label>
      <select name="metode_pembayaran" class="form-control">
        <?php $metode_pembayaran = ["CASH", "DFOD"]; ?>
        <?php foreach ($metode_pembayaran as $metode): ?>
          <?php if($pengiriman['metode_pembayaran'] == $metode) : ?>
            <option value="<?= $metode ?>" selected><?= $metode ?></option>
          <?php else: ?>
            <option value="<?= $metode ?>"><?= $metode ?></option>
          <?php endif; ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="jenis_paket">Jenis Paket</label>
      <select name="jenis_paket" class="form-control">
        <?php $jenis_paket = ["Barang", "Dokumen"]; ?>
        <?php foreach ($jenis_paket as $paket): ?>
          <?php if($pengiriman['jenis_paket'] == $paket) : ?>
            <option value="<?= $paket ?>" selected><?= $paket ?></option>
          <?php else: ?>
            <option value="<?= $paket ?>"><?= $paket ?></option>
          <?php endif; ?>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="biaya_kirim">Biaya</label>
      <input type="text" class="form-control" value="<?= $pengiriman['biaya_kirim'] ?>" name="biaya_kirim" placeholder="Biaya kirim">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nama_pengirim">Nama pengirim</label>
      <input type="text" class="form-control" value="<?= $pengiriman['nama_pengirim'] ?>" name="nama_pengirim" placeholder="Nama pengirim">
    </div>
    <div class="form-group col-md-4">
      <label for="alamat_pengirim">Alamat pengirim</label>
      <input type="text" class="form-control" value="<?= $pengiriman['alamat_pengirim'] ?>" name="alamat_pengirim" placeholder="Alamat pengirim">
    </div>
    <div class="form-group col-md-4">
      <label for="kontak_pengirim">Kontak pengirim</label>
      <input type="text" class="form-control" value="<?= $pengiriman['kontak_pengirim'] ?>" name="kontak_pengirim" placeholder="Kontak pengirim">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nama_penerima">Nama penerima</label>
      <input type="text" class="form-control" value="<?= $pengiriman['nama_penerima'] ?>" name="nama_penerima" placeholder="Nama penerima">
    </div>
    <div class="form-group col-md-4">
      <label for="alamat_penerima">Alamat penerima</label>
      <input type="text" class="form-control" value="<?= $pengiriman['alamat_penerima'] ?>" name="alamat_penerima" placeholder="Alamat penerima">
    </div>
    <div class="form-group col-md-4">
      <label for="kontak_penerima">Kontak penerima</label>
      <input type="text" class="form-control" value="<?= $pengiriman['kontak_penerima'] ?>" name="kontak_penerima" placeholder="Kontak penerima">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
    </div>
    <div class="form-group col-md-4">
      <input type="submit" class="btn btn-primary" value="Ubah">
    </div>
  </div>
    
</form>
<script type="text/javascript">
  $(document).ready(function(){

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).on('submit', '#edit-pengiriman',function(e){
      e.preventDefault();
      $.ajax({
        url: '<?php echo site_url('pengiriman/perbarui/') . $this->uri->segment(3) ?>',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'JSON',
        beforeSend: function(){
          $(':input[type="submit"]').prop('disabled', true);
        },
        success: function(response){
          if (response.status == "success"){
            Toast.fire({
              type: 'success',
              title: 'Berhasil mengubah.'
            });
            window.location.href="<?php echo site_url('pengiriman/'); ?>"; 
          } else {
            msg = ""
            if (response.msg) {
              $.each(response.msg,function(i,value){
                msg += '* ' + response.msg[i] + "<br>";
              });
              Swal.fire({
                type: 'error',
                title: 'Oops...',
                html: msg,
              });
            }            
          }
          $(':input[type="submit"]').prop('disabled', false);
        },
        error: function(){
          Toast.fire({
            type: 'error',
            title: '<p style="color:red; font-size:12px">Kesalahan Internal.</p>'
          });
          $(':input[type="submit"]').prop('disabled', false);
        }
      });
    });

  });
</script>
