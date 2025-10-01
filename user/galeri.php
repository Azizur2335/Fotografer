<!DOCTYPE html>
<head>
    <title>Galeri User</title>
    <style>
        body{margin: 0; font-family:Arial, sans-serif;}
        .navbar{
        display: flex; 
        align-items: center;
        justify-content: space-between; 
        padding: 10px 50px;
        background-color: #ffffff; 
        }
        .logo{
        font-weight: bold;
        }
        .menu a{
        margin: 0 10px; 
        text-decoration: none; 
        color: black;
        }
        .btn {
        background: rgb(0, 0, 0); 
        color: white; 
        padding: 6px 12px;
        text-decoration: none; 
        border-radius: 4px;
        }
        .btn.second {
        background: transparent;
        color:white;
        }
        .btn.second:hover {
        background: white;
        color: black;
        border: 0px solid black;
        }
        .dropdown {
        display: inline-block;
        }
        .dropbtn {
        background: none;
        border: none;
        font-size: 16px;
        cursor: pointer;
        }
        .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        }
        .dropdown-content a {
        color: black;
        padding: 10px 14px;
        text-decoration: none;
        display: block;
        }
        .dropdown-content a:hover { background-color: #f1efef; }
        .dropdown:hover .dropdown-content { display: block; }

        .header {
        background: url("../../images/header9.jpg") center center;
        background-size: cover;
        color: white;
        text-align: center;
        padding: 100px 20px;
        }
        .header-title {
        font-size: 40px;
        margin: 10px;
        }
        .header-subtitle {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
        }
        .header-text {
        margin: 10px 0 30px;
        font-size: 16px;
        }
        .header-buttons {
        display: flex;           
        justify-content: center;    
        gap: 20px;                
        }
        .header-buttons .btn {
        padding: 10px 20px;
        border: 1px solid white;
        border-radius: 3px;
        text-decoration: none;
        font-weight: bold;
        color: white;
        background: transparent;
        }

        .paket {
        padding: 1px 50px;
        background: #ffffff;
        color: black;
        }
        .paket-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 40px;
        }
        .paket-header p {
        font-size: 14px;
        margin-top: 5px;
        }
        .btn-outline {
        border: 1px solid black;
        padding: 8px 14px;
        text-decoration: none;
        color: black;
        border-radius: 3px;
        font-size: 14px;
        }
        .paket-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 20px;
        }
        .paket-card {
        background: #ffffff;
        padding: 5px;
        }
        .paket-card h3 {
        margin-bottom: 5px;
        }
        .paket-card h5 {
        font-size: 12px;
        color: black;
        margin: 5px 5px 5px 0px;
        font-weight: normal;
        }
        .paket-img {
        width: 100%;
        height: 250px;
        margin-bottom: 10px;
        }
        .harga {
        font-size: 13px;
        margin-top: 5px;
        }

        .footer {
        padding: 80px 50px 0 50px;
        background: #ffffff;
        color: black;
        font-size: 14px;
        }
        .footer-top {
        display: flex; 
        align-items: center;
        justify-content: space-between; 
        }
        .footer-logo {
        font-weight: bold;
        }
        .footer-menu {
        display: flex;
        gap: 20px;
        }
        .footer-menu a {
        text-decoration: none;
        color: black;
        }
        .footer-socials {
        display: flex;
        gap: 10px;
        }
        .footer-socials a img {
        width: 15px;
        height: 15px;
        border-radius: 4px;
        }
        .footer-bottom {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        font-size: 13px;
        }
        .footer-bottom h4{
        font-weight: normal;
        }
        .footer-links {
        display: flex;
        gap: 20px;
        }
        .footer-links a {
        color: black;
        font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">Logo</div>
        <div class="menu">
            <a href="#">Tentang Kami</a>
            <a href="#">Paket Foto</a>
            <a href="#">Galeri</a>

            <div class="dropdown">
            <button class="dropbtn" onclick="toggleDropdown()">Kontak Kami</button>
            <div id="dropdownMenu" class="dropdown-content">
                <a href="-">WhatsApp</a>
                <a href="-">Email</a>
                <a href="-">Telepon</a>
            </div>
            </div>
        </div>
        <a href="-" class="btn">Hubungi</a>
    </div>

    <div class="paket">
        <div class="paket-header">
            <div>
                <h2>Galeri User</h2>
                <p>Text.</p>
            </div>
            <a href="-" class="btn-outline">Lihat Semua</a>
        </div>
        <div class="paket-grid">
            <div class="paket-card"></div>
            <div class="paket-card"></div>
            <div class="paket-card"></div>
            <div class="paket-card"></div>
            <div class="paket-card"></div>
            <div class="paket-card"></div>
        </div>
    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-top">
            <div class="footer-logo">Logo</div>
                <div class="footer-menu">
                    <a href="-">Menu</a>
                    <a href="-">Link</a>
                    <a href="-">Link</a>
                    <a href="-">Link</a>
                    <a href="-">Link</a>
                </div>
            <div class="footer-socials">
            <a href="-"><img src="images/facebook1.png"></a>
            <a href="-"><img src="images/instagram.png"></a>
            <a href="-"><img src="images/x2.webp"></a>
            <a href="-"><img src="images/linkedin.jpg"></a>
            <a href="-"><img src="images/yt2.jpg"></a>
            </div>
        </div>
        <hr style="margin: 50px 0px 10px 0px;">
        <div class="footer-bottom">
            <h4>© 2025 NamaUsaha. All rights reserved.</h4>
            <div class="footer-links">
            <a href="-">Kebijakan Privasi</a>
            <a href="-">Syarat Layanan</a>
            <a href="-">Pengaturan Cookies</a>
            </div>
        </div>
    </div>
</body>
</html>