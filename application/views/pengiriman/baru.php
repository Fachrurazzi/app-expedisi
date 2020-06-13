<h2 class="text-center">Masukkan data Pengiriman</h2>

<form id="form-pengiriman">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="tujuan_pengiriman">Tujuan Pengiriman</label>
      <select class="form-control" id="tujuan" name="tujuan_pengiriman">
        <option value="" disabled selected>Pilih tujuan pengiriman</option>
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
    <div class="form-group col-md-4">
      <label for="tgl_pengiriman">Tanggal Pengiriman</label>
      <input type="date" class="form-control" name="tgl_pengiriman" placeholder="Tanggal pengiriman">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="metode_pembayaran">Metode Pembayaran</label>
      <select name="metode_pembayaran" class="form-control">
        <option value="CASH" selected>CASH</option>
        <option value="DFOD">DFOD</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="jenis_paket">Jenis Paket</label>
      <select name="jenis_paket" class="form-control">
        <option value="Barang" selected>Barang</option>
        <option value="Dokumen">Dokumen</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nama_barang">Nama barang</label>
      <input type="text" class="form-control" name="nama_barang">
    </div>
    <div class="form-group col-md-1">
      <label for="jumlah">Jumlah</label>
      <input type="number" min="1" value="1" name="jumlah" class="form-control">
    </div>
    <div class="form-group col-md-1">
      <label for="berat">Berat (Kg)</label>
      <input type="number" class="form-control" min="1" value="1" name="berat">
    </div>
    <div class="form-group col-md-2">
      <label for="biaya">Biaya</label>
      <input type="text" class="form-control" readonly="true" value="0" name="biaya_kirim">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nama_pengirim">Nama Pengirim</label>
      <input type="text" class="form-control" name="nama_pengirim" value="">
    </div>
    <div class="form-group col-md-5">
      <label for="alamat_pengirim">Alamat Pengirim</label>
      <input type="text" class="form-control" name="alamat_pengirim" value="">
    </div>
    <div class="form-group col-md-2">
      <label for="kontak_pengirim">Kontak Pengirim</label>
      <input type="text" class="form-control" name="kontak_pengirim" value="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nama_penerima">Nama Penerima</label>
      <input type="text" class="form-control" name="nama_penerima" value="">
    </div>
    <div class="form-group col-md-5">
      <label for="alamat_penerima">Alamat Penerima</label>
      <input type="text" class="form-control" name="alamat_penerima" value="">
    </div>
    <div class="form-group col-md-2">
      <label for="kontak_penerima">Kontak Penerima</label>
      <input type="text" class="form-control" name="kontak_penerima" value="">
    </div>
  </div>
  Biaya : Rp. <b id="total_biaya"></b><br>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $("#tujuan").select2();
    total_biaya = 10000;
    $("input[name='biaya_kirim']").val(total_biaya);
    $(document).on('change, keyup, mouseup', "input[name='berat']", function(){
      berat = $(this).val();
      total_biaya = berat * 10000;
      $("#total_biaya").text(total_biaya.toLocaleString());
      $("input[name='biaya_kirim']").val(total_biaya);
    });

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $(document).on('submit', '#form-pengiriman',function(e){
      e.preventDefault();
      $.ajax({
        url: "<?php echo site_url('pengiriman/tambahkan'); ?>",
        method: "POST",
        data: $(this).serialize(),
        dataType: "JSON",
        beforeSend: function(){
          $(':input[type="submit"]').prop('disabled', true);
        },
        success: function(response){
          if (response.status == "success"){
            Toast.fire({
              type: 'success',
              title: 'Berhasil menyimpan.'
            });
            window.location.href="<?php echo site_url('pengiriman') ?>";
            window.open("<?php echo site_url('pengiriman/tampil_pengiriman'); ?>" + "?no_waybill=" + response.data.no_waybill, "_blank");
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