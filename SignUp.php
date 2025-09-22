<!DOCTYPE html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body class="body-su">
    <div class="logo-su">Logo</div>
    <div class="box-container-su">
        <div class="box-su">
            <h1 style="text-align: center; margin-top: 20px; font-size: 35px;">Sign Up</h1>
            <p style="font-size: 15px; text-align: center; margin-bottom: 5px;">Lorem ipsum dolor sit amet adipiscing elit.</p>
            <form class="form-su" id="formRegist" action="backend/proses_registrasi.php" method="POST" onsubmit="return validasiForm()">
                <label for="nama">Name*</label>
                <input id="nama" name="nama" type="text">
                <label for="email">Email*</label>
                <input id="email" name="email" type="email">
                <label for="password">Password*</label>
                <input id="password" name="password" type="password">
                <button class="btn-su btn-signup">Sign up</button>
                <button class="btn-su btn-sugoogle">Sign up with Google</button>
            </form>
            <p style="font-size: 12px; text-align: center;">
                Already have an account? <a href="SignIn.php">Log In</a>
            </p>
        </div>
    </div>
    <div class="footer-su">© 2025 NamaKelompok</div>
    <script src="backend/form.js"></script>
</body>
</html>
