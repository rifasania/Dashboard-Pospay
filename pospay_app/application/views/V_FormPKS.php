<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url('assets/img/pospay.png'); ?>" type="image/png">
    <title>Pospay</title>
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
        .navbar li.logout {
            float: right;
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
            background-color: #ff6600; 
            padding: 30px;
            border-radius: 10px;
            width: 340px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
        }
        .form-container {
            width: 100%; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container form {
            width: 100%;
            max-width: 400px;
        }
        .form-container input[type="text"],
        .form-container input[type="date"] {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc; 
        }
        .button {
            background-color: orange; 
            border: none;
            color: white;
            padding: 15px 0; 
            text-align: center;
            text-decoration: none;
            display: block;
            width: 101%;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px 0; 
            box-sizing: border-box; 
        }
        .navbar ul li ul {
            display: none;
            position: absolute;
            background-color: orange;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 999;
            margin-top: 0;
        }
        .navbar ul li:hover > ul {
            display: block;
        }
        .navbar ul li ul li {
            float: none;
            padding: 12px 16px;
        }
        .navbar ul li ul li a {
            padding: 10px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .navbar ul li ul li a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <span class="logo"><img src="<?php echo base_url('assets/img/pospay.png'); ?>" alt="PosPay Logo" height="60"></span>
        <ul>
            <li><a href="<?php echo site_url('C_Home/index');?>">Home</a></li>
            <li onmouseenter="showDropdown(this, event)" onmouseleave="hideDropdown(this)"><a href="#">Dashboard</a>
                <ul>
                    <li><a href="<?php echo site_url('C_DataTransaksi/index'); ?>">Lihat Dashboard</a></li>
                    <li><a href="<?php echo site_url('C_DataTransaksi/formAddDataTransaksi'); ?>">Tambah Data Transaksi</a></li>
                </ul>
            </li>
            <li onmouseenter="showDropdown(this, event)" onmouseleave="hideDropdown(this)"><a href="#">PKS</a>
                <ul>
                    <li><a href="<?php echo site_url('C_DataPKS/index'); ?>">Lihat Data PKS</a></li>
                    <li><a href="<?php echo site_url('C_DataPKS/formAddDataPKS'); ?>">Tambah Data PKS</a></li>
                </ul>
            </li>
            <li class="logout"><a href="<?php echo site_url('C_Login/logout'); ?>">Logout</a></li>
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
    <script>
        let dropdownTimeout;

        function showDropdown(li, event) {
            clearTimeout(dropdownTimeout); // Reset penghitungan waktu jika kursor masuk ke area dropdown
            const dropdowns = document.querySelectorAll('.navbar ul li ul');
            dropdowns.forEach(dropdown => {
                if (dropdown !== event.currentTarget.querySelector('ul')) {
                    dropdown.style.display = 'none';
                }
            });
            const currentDropdown = li.querySelector('ul');
            if (currentDropdown) {
                currentDropdown.style.display = 'block';
            }
        }

        function hideDropdown(li) {
            dropdownTimeout = setTimeout(() => {
                const dropdown = li.querySelector('ul');
                if (dropdown) {
                    dropdown.style.display = 'none';
                }
            }, 100);
        }
    </script>
</body>
</html>
