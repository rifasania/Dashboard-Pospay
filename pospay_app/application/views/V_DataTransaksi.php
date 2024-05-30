<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to PosPay</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: orange;
            overflow: hidden;
            display: flex;
            align-items: center;
            height: 75px; /* Tinggi navbar yang lebih tinggi */
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-grow: 1;
        }
        .navbar li {
            float: left;
        }
        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 25px 20px; /* Padding lebih besar untuk membuat navbar lebih tinggi */
            text-decoration: none;
            line-height: 40px; /* Menjaga teks tetap di tengah secara vertikal */
            font-size: 18px;
        }
        .navbar li a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .logo {
            display: block;
            padding: 15px 25px; /* Menyesuaikan padding untuk logo */
        }
        #container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        .button {
            background-color: orange;
            border: none;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px; /* Menambahkan radius sudut */
            margin-bottom: 20px; /* Menambahkan jarak dari tombol ke iframe */
        }
    </style>
</head>
<body>
    <div class="navbar">
    <span class="logo"><img src="<?php echo base_url('assets/img/pospay.png'); ?>" alt="PosPay Logo" height="60"></span>
        <ul>
            <li><a href="<?php echo site_url('C_Home/index');?>">Home</a></li>
            <li><a href="<?php echo site_url('C_DataTransaksi/index');?>">Data Transaksi</a></li>
            <li><a href="<?php echo site_url('pks'); ?>">Data PKS</a></li>
        </ul>
    </div>
    <div id="container">
        <h1>Data Transaksi</h1>
        <a href="<?php echo site_url('');?>" class="button">Tambah Data Transaksi</a>
        <iframe width="1200" height="1080" src="https://lookerstudio.google.com/embed/reporting/9b2ba553-a178-4dd8-a895-185f2dae0742/page/B8k0D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
    </div>
</body>
</html>
