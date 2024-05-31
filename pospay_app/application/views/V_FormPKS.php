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
            background-image: url('<?php echo base_url('assets/img/background.png'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .navbar {
            background-color: orange; 
            overflow: hidden;
            display: flex;
            align-items: center;
            height: 75px;
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
            padding: 25px 20px;
            text-decoration: none;
            line-height: 40px;
            font-size: 18px;
        }
        .navbar li a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .logo {
            display: block;
            padding: 15px 25px;
        }
        #container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        .form-background {
            background-color: #ff6600; /* Warna orange khas kantor pos dengan transparansi */
            padding: 30px;
            border-radius: 10px;
            width: 340px; /* Lebar lebih besar dari form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
        }
        .form-container {
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container form {
            width: 100%;
        }
        .form-container input, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .button {
            background-color: orange; /* Warna orange khas kantor pos */
            border: none;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            margin-bottom: 20px;
            width: 100%; /* Lebar tombol submit sama dengan lebar form */
        }
    </style>
</head>
<body>
    <div class="navbar">
        <span class="logo"><img src="<?php echo base_url('assets/img/pospay.png'); ?>" alt="PosPay Logo" height="60"></span>
        <ul>
            <li><a href="<?php echo site_url('C_Home/index');?>">Home</a></li>
            <li><a href="<?php echo site_url('C_DataTransaksi/index');?>">Data Transaksi</a></li>
            <li><a href="<?php echo site_url('C_DataPKS/index'); ?>">Data PKS</a></li>
        </ul>
    </div>
    <div id="container">
        <h1>Tambah Data PKS</h1>
        <div class="form-background">
            <div class="form-container">
                <form action="<?php echo site_url('C_DataPKS/addDataPKS'); ?>" method="post">
                    <h3>PIC</h3>
                    <input type="text" name="pic" placeholder="Masukkan Nama PIC" required>
                    <h3>PKS</h3>
                    <input type="text" name="pks" placeholder="Masukkan Nama PKS" required>
                    <h3>Tanggal Habis</h3>
                    <input type="date" name="tanggal_habis" placeholder="Tanggal Habis" required>
                    <button type="submit" class="button">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
