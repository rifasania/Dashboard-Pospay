<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
        #container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: black;
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
            border-radius: 10px;
            margin-bottom: 20px;
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
        <h1>Data Transaksi</h1>
        <iframe width="1366" height="768" src="https://lookerstudio.google.com/embed/reporting/0ac5b3cb-eeb9-44f0-abb9-f0760e9b9c34/page/knl1D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
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
