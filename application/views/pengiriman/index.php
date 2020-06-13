<h3>Data Pengiriman</h3>
<table id="pengiriman-table">
  <thead>
    <tr>
      <th>No Waybill</th>
      <th>Tujuan</th>
      <th>Tanggal pengiriman</th>
      <th>Barang</th>
      <th>Berat</th>
      <th>Nama pengirim</th>
      <th>Alamat pengirim</th>
      <th>Kontak pengirim</th>
      <th>Nama penerima</th>
      <th>Alamat penerima</th>
      <th>Kontak penerima</th>
      <th></th>
      <th>Aksi</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pengiriman as $data) : ?>
      <tr>
        <td><?php echo $data['no_waybill']; ?></td>
        <td><?php echo $data['tujuan_pengiriman']; ?></td>
        <td><?php echo $data['tgl_pengiriman']; ?></td>
        <td><?php echo $data['nama_barang']; ?></td>
        <td><?php echo $data['berat']; ?> Kg</td>
        <td><?php echo $data['nama_pengirim']; ?></td>
        <td><?php echo $data['alamat_pengirim']; ?></td>
        <td><?php echo $data['kontak_pengirim']; ?></td>
        <td><?php echo $data['nama_penerima']; ?></td>
        <td><?php echo $data['alamat_penerima']; ?></td>
        <td><?php echo $data['kontak_penerima']; ?></td>
        <td><a href="<?php echo site_url('pengiriman/tampil_pengiriman') ."?no_waybill=" .$data['no_waybill'] ?>" class="btn btn-info"><i class="fas fa-clipboard-list"></i></a></td>
        <td><a href="<?php echo site_url('pengiriman/edit/') . $data['id_pengiriman'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
        <td>
          <a href="<?php echo site_url('pengiriman/hapus/') . $data['id_pengiriman'] ?>" class="btn btn-danger" data-id_pengiriman="<?php echo $data['id_pengiriman'] ?>" id="hps-pengiriman"><i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
  $(document).ready( function () {
    $('#pengiriman-table').DataTable({"scrollX":true});
    $(document).on('click','#hps-pengiriman', function(e){
      e.preventDefault();
      id_pengiriman = $(this).data('id_pengiriman');
      swal({
        title: "apakah kamu yakin?",
        text: "ketika kamu yakin, kamu tidak bisa mengembalikan data ini lagi.",
        icon: "warning",
        buttons: true,
        dangermode: true,
      })
      .then((willdelete) => {
        if (willdelete) {
          $.ajax({
            url: "<?php echo site_url('pengiriman/hapus/') ?>" + id_pengiriman,
            method: "post",
            datatype: "json",
            success: function(){
              swal("berhasil menghapus data.", {
                icon: "success",
              });              
            },
            error: function(){
              swal("oops. something wrong happened."); 
            }
          });
        } else {
          swal("dibatalkan.");
        }
      });
    });
  });
</script>