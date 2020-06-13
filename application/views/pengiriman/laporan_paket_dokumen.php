<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="margin-right: 40px; margin-left: 40px">
    <h3 style="padding-top: 20px" class="text-center">Laporan Pengiriman Dokumen</h3>
    <h3 class="text-center">Java Express</h3>
    <p>Total : <?php echo count($paket) ?></p>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No. Waybill</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Berat</th>
      <th scope="col">Biaya Kirim</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $total_biaya_kirim = 0; 
      $jumlah = 0;
      $berat = 0;
    ?>
    <?php foreach ($paket as $data): ?>
      <tr>
        <td><?php echo $data['no_waybill'] ?></td>
        <td><?php echo $data['nama_barang'] ?></td>
        <td><?php echo $data['jumlah'] ?></td>
        <td><?php echo $data['berat'] ?></td>
        <td>Rp. <?php echo number_format($data['biaya_kirim'], 0, ',', '.') ?></td>
        <?php 
          $total_biaya_kirim += $data['biaya_kirim'];
          $jumlah += $data['jumlah'];
          $berat += $data['berat'];
        ?>
      </tr>
    <?php endforeach ?>
    <tr>
      <td colspan="2"></td>
      <td><?php echo $jumlah ?></td>
      <td><?php echo $berat ?></td>
      <td>Rp. <?php echo number_format($total_biaya_kirim, 0, ',', '.') ?></td>
    </tr>
  </tbody>
</table>

<p align="right" style="margin-right: 40px; margin-top: 40px">
  <?php $tanggal = date('Y-m-d'); 
    $full_tanggal = explode('-', $tanggal);
    $hari = $full_tanggal[2];
    switch ($full_tanggal[1]) {
      case '01':
        $bulan = 'Januari';
        break;
      case '02':
        $bulan = 'Februari';
        break;
      case '03':
        $bulan = 'Maret';
        break;
      case '04':
        $bulan = 'April';
        break;
      case '05':
        $bulan = 'Mei';
        break;
      case '06':
        $bulan = 'Juni';
        break;
      case '07':
        $bulan = 'Juli';
        break;
      case '08':
        $bulan = 'Agustus';
        break;
      case '09':
        $bulan = 'September';
        break;
      case '10':
        $bulan = 'Oktober';
        break;
      case '11':
        $bulan = 'November';
        break;
      case '12':
        $bulan = 'Desember';
        break;
    }
    $tahun = $full_tanggal[0];
    echo $hari . " " . $bulan . " " . $tahun;
  ?> <br> <br><br>
  Pimpinan
</p>
<script type="text/javascript">
  window.print();
</script>

</body>
</html>