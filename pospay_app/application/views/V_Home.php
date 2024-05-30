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
            height: 90px; /* Tinggi navbar yang lebih tinggi */
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
            font-size: 20px;
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
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="navbar">
    <span class="logo"><img src="<?php echo base_url('assets/img/pospay.png'); ?>" alt="PosPay Logo" height="60"></span>
        <ul>
            <li><a href="<?php echo site_url('transaksi'); ?>">Data Transaksi</a></li>
            <li><a href="<?php echo site_url('pks'); ?>">Data PKS</a></li>
        </ul>
    </div>
    <div id="container">
        <h1>Welcome to PosPay</h1>
    </div>
</body>
</html>
