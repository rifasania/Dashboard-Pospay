<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Transaksi</title>
    <style>
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
        body {
            background-color: #f8f9fa;
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
            background-color: #ff8800; /* Warna orange khas kantor pos */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-top: 25px;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container h2 img {
            display: block;
            margin: 0 auto 10px;
            height: 80px; /* Adjust the height as needed */
        }
        .form-container label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
        }
        .form-container input,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid black;
            border-radius: 5px;
            box-sizing: border-box; /* Ensures padding is included in the width */
        }
        .form-container button {
            background-color: orange; /* Orange color */
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 25px;
            display: inline-block;
        }
        .form-container button:hover {
            background-color: #e65c00; /* Darker shade of orange for hover effect */
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
        <div class="form-container">            
            <form action="<?php echo site_url('C_DataTransaksi/aksiAddDataTransaksi'); ?>" method="post" enctype="multipart/form-data">
                <label for="tanggal_insert">Tanggal:</label>
                <input type="date" id="tanggal_insert" name="tanggal_insert" placeholder="Tanggal" required>                
                <label for="nama_file">File:</label>
                <input type="file" id="nama_file" name="nama_file" required>
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
