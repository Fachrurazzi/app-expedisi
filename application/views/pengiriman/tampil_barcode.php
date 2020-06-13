<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="<?php echo base_url('assets/js/jsbarcode.min.js') ?>"></script>
    <style type="text/css">
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
    </style>
</head>
<body>
<!--     <svg id="barcode"></svg>
    <br>
 -->    <p><b>Pengirim : </b><?php echo $pengiriman['nama_pengirim'] ?></p>
    <p>No Waybill : <b><?php echo $pengiriman['no_waybill']; ?></b></p>
    <p><?php echo $pengiriman['kontak_pengirim'] ?> - <?php echo $pengiriman['alamat_pengirim'] ?></p>
    <hr>
    <p><b>Penerima : </b><?php echo $pengiriman['nama_penerima'] ?></p>
    <p><?php echo $pengiriman['kontak_penerima'] ?> - <?php echo $pengiriman['alamat_penerima'] ?></p>
    <hr>
    <p>
        TGL : <?php echo $pengiriman['tgl_pengiriman']; ?><br>
        Tujuan : <?php echo $pengiriman['tujuan_pengiriman']; ?><br>
        Biaya kirim : <?php echo $pengiriman['biaya_kirim']; ?> | <?php echo $pengiriman['metode_pembayaran']; ?> | <?php echo $pengiriman['berat'] ?> Kg |
    </p>

    <script type="text/javascript">
        //JsBarcode("#barcode", "<?php echo $pengiriman['no_waybill'] ?>");
        window.print();
    </script>

</body>
</html>
