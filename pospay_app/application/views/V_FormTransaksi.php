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
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container form {
            width: 100%;
        }
        .form-container input[type="date"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc; 
        }
        .form-container input[type="file"] {
            background-color: white; 
        }
        .button {
            background-color: orange;
            border: none;
            color: white;
            padding: 10px; 
            text-align: center;
            text-decoration: none;
            display: block;
            width: 107%; 
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
        .error-message {
            background-color: #ffcccc;
            color: #ff0000;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <span class="logo"><img src="<?php echo base_url('assets/img/pospay.png'); ?>" alt="PosPay Logo" height="60"></span>
        <ul>
            <li><a href="<?php echo site_url('C_Home/index');?>">Home</a></li>
            <li onmouseenter="showDropdown(this, event)" onmouseleave="hideDropdown(this)"><a href="#">Transaksi</a>
                <ul>
                    <li><a href="<?php echo site_url('C_DataTransaksi/index'); ?>">Lihat Data Transaksi</a></li>
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
        <h1>Tambah Data Transaksi</h1>
        <div class="form-background">
            <!-- <div class="form-container">
                <form action="<?php echo site_url('C_DataTransaksi/aksiAddDataTransaksi'); ?>" method="post" enctype="multipart/form-data">                    
                    <h3>Tanggal</h3>
                    <input type="date" name="tanggal_insert" value="<?php echo set_value('tanggal_insert', ''); ?>" required>
                    <h3>File Excel</h3>
                    <input type="file" name="nama_file" value="<?php echo set_value('nama_file', ''); ?>" required>
                    <button type="submit" class="button">Submit</button>
                </form>
            </div> -->
            <div class="form-container">
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="error-message"><?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                <form action="<?php echo site_url('C_DataTransaksi/aksiAddDataTransaksi'); ?>" method="post" enctype="multipart/form-data">                    
                    <h3>Tanggal</h3>
                    <input type="date" name="tanggal_insert" value="<?php echo $this->session->flashdata('tanggal_insert') ? $this->session->flashdata('tanggal_insert') : set_value('tanggal_insert', ''); ?>" required>
                    <h3>File Excel</h3>
                    <input type="file" name="nama_file" value="<?php echo $this->session->flashdata('nama_file') ? $this->session->flashdata('nama_file') : set_value('nama_file', ''); ?>" required>
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
