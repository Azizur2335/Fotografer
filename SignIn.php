<!DOCTYPE html>
<html>
<head>
    <title>LogIn</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body class="body-si">
    <div class="kiri-si">
        <div class="logo-si">Logo</div>
        <div class="login-box-si">
            <h1>Log In</h1>
            <p>Lorem ipsum dolor sit amet adipiscing elit.</p>
            <form class="form-si" action="backend/proses_login.php" method="POST" onsubmit="return validasiLogin()">
                <label>Email*</label>
                <input id="email" type="email" name="email">
                <div class="label-row-si">
                    <label>Password*</label>
                    <span class="forgor-si"><a href="#">Forgot your password?</a></span>
                </div>
                <input id="password" type="password" name="password">
                <button class="btn-si btn-login">Log in</button>
                <button class="btn-si btn-google">Log in with Google</button>
                <p class="ga-punya-akun">
                    Don't have an account? <a href="SignUp.php">Sign Up</a>
                </p>
            </form>
        </div>
        <div class="footer-si">© 2025 NamaKelompok</div>
    </div>
    <div class="kanan-si">
        <img src="./Assets/cewegwpt2.jpg">
    </div>
    <script src="backend/form.js"></script>
</body>
</html>