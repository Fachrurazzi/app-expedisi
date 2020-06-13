<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4287f5">
      <a style="color: white" class="navbar-brand" href="#">Java Express</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a style="color: white" class="nav-link" href="<?php echo site_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pengiriman
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('pengiriman/baru') ?>">Input data pengiriman</a>
              <a class="dropdown-item" href="<?php echo site_url('pengiriman') ?>">Data Pengiriman</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" target="_blank" href="<?php echo site_url('pengiriman/cash') ?>">Laporan pembayaran CASH</a>
              <a class="dropdown-item" target="_blank" href="<?php echo site_url('pengiriman/dfod') ?>">Laporan pembayaran DFOD</a>
              <a class="dropdown-item" target="_blank" href="<?php echo site_url('pengiriman/paket_dokumen') ?>">Laporan Paket Dokumen</a>
              <a class="dropdown-item" target="_blank" href="<?php echo site_url('pengiriman/paket_barang') ?>">Laporan Paket Barang</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kirim
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('kirim/baru') ?>">Input Kirim Barang</a>
              <a class="dropdown-item" href="<?php echo site_url('kirim') ?>">Data Kirim Barang</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url('kirim/laporan') ?>">Laporan Kirim Barang</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sampai
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('sampai/baru') ?>">Input Sampai Barang</a>
              <a class="dropdown-item" href="<?php echo site_url('sampai') ?>">Data Sampai Barang</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url('sampai/laporan') ?>">Laporan Sampai Barang</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kurir
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('sprinter/baru') ?>">Input data Kurir</a>
              <a class="dropdown-item" href="<?php echo site_url('sprinter') ?>">Data Kurir</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url('sprinter/laporan') ?>">Laporan Kurir</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Paket
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('paket/input_paket_bermasalah') ?>">Input Paket Bermasalah</a>
              <a class="dropdown-item" href="<?php echo site_url('paket/paket_bermasalah') ?>">Data Paket bermasalah</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" target="_blank" href="<?php echo site_url('paket/laporan_paket_bermasalah_selesai') ?>">Laporan Paket Bermasalah(SELESAI)</a>
              <a class="dropdown-item" target="_blank" href="<?php echo site_url('paket/laporan_paket_bermasalah_belum_selesai') ?>">Laporan Paket Bermasalah(BELUM SELESAI)</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Barang Gudang
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('gudang/baru') ?>">Input Barang Masuk Gudang</a>
              <a class="dropdown-item" href="<?php echo site_url('gudang/index') ?>">Data Barang masuk gudang</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url('gudang/laporan') ?>">Laporan Masuk Gudang</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Karyawan
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('karyawan/baru') ?>">Tambah karyawan</a>
              <a class="dropdown-item" href="<?php echo site_url('karyawan') ?>">Data Karyawan</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a style="color: white" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Akun
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo site_url('logout'); ?>">Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <br><br>
