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
        }
        h1 {
            text-align: center;
            margin-top: 50px;
            color: white;
        }
        .carousel {
            width: 90%;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-item {
            min-width: 100%;
            box-sizing: border-box;
            padding: 40px;
            text-align: center;
            background-size: cover;
            background-position: center;
            color: white;
        }
        .carousel-item h2 {
            margin: 0;
            padding: 0;
            margin-bottom:10px;
        }
        .carousel-item p {
            color: white;
        }
        .carousel-buttons {
            text-align: center;
            margin-top: 20px;
        }
        .carousel-button {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .carousel-button:hover {
            background-color: #ff5500;
        }
        .carousel-navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .carousel-navigation button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }
        .carousel-navigation button:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
        .carousel-indicators {
            text-align: center;
            margin-top: 15px;
        }
        .carousel-indicators span {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: #ddd;
            border-radius: 50%;
            cursor: pointer;
        }
        .carousel-indicators .active {
            background-color: #333;
        }
        .navbar ul li ul {
			display: none;
			position: absolute;
			background-color: orange;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 999;
			margin-top: 0; /* Tambahkan margin-top: 0; */
		}

        .navbar ul li:hover > ul {
            display: block;
        }

        .navbar ul li ul li {
            float: none;
            padding: 12px 16px; /* Tambahkan padding: 12px 16px; */
        }

        .navbar ul li ul li a {
            padding: 10px; /* Tambahkan padding: 0; */
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
            <h1>SELAMAT DATANG</h1>
            <div class="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <h2>DASHBOARD SISTEM MONITORING DATA PRODUKSI POSPAY</h2>
                        <h2>DAN</h2>
                        <h2>DATA PKS</h2>
                    </div>
                    <div class="carousel-item">
                        <h2>Tambah Transaksi</h2>
                        <p>Mulai tambah transaksi dengan klik tombol di bawah ini.</p>
                        <button class="carousel-button" onclick="window.location.href='<?php echo site_url('C_DataTransaksi/formAddDataTransaksi');?>'">Tambah Transaksi</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Tambah Data PKS</h2>
                        <p>Mulai tambah data PKS dengan klik tombol di bawah ini.</p>
                        <button class="carousel-button" onclick="window.location.href='<?php echo site_url('C_DataPKS/formAddDataPKS'); ?>'">Tambah Data PKS</button>
                    </div>
                </div>
                <div class="carousel-navigation">
                    <button onclick="prevSlide()">&#10094;</button>
                    <button onclick="nextSlide()">&#10095;</button>
                </div>
                <div class="carousel-indicators">
                    <span class="active" onclick="currentSlide(0)"></span>
                    <span onclick="currentSlide(1)"></span>
                    <span onclick="currentSlide(2)"></span>
                </div>
            </div>
        </div>

		<script>
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;
        const indicators = document.querySelectorAll('.carousel-indicators span');

        function showSlide(index) {
            if (index >= totalSlides) currentSlideIndex = 0;
            if (index < 0) currentSlideIndex = totalSlides - 1;
            const offset = -currentSlideIndex * 100;
            document.querySelector('.carousel-inner').style.transform = 'translateX(' + offset + '%)';
            updateIndicators();
        }

        function nextSlide() {
            currentSlideIndex++;
            showSlide(currentSlideIndex);
        }

        function prevSlide() {
            currentSlideIndex--;
            showSlide(currentSlideIndex);
        }

        function currentSlide(index) {
            currentSlideIndex = index;
            showSlide(currentSlideIndex);
        }

        function updateIndicators() {
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlideIndex);
            });
        }

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

        document.addEventListener('DOMContentLoaded', () => {
            showSlide(currentSlideIndex);
            setInterval(nextSlide, 3000); // Change slide every 3 seconds
        });
    </script>
    </body>
    </html>
