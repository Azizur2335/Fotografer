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
            <h1 style="text-align: center; margin-bottom: 10px;">Log In</h1>
            <p style="font-size: 14px; text-align: center; margin-bottom: 30px;">Lorem ipsum dolor sit amet adipiscing elit.</p>
            <form action="backend/proses_login.php" method="POST" onsubmit="return validasiLogin()">
                <label>Email*</label>
                <input id="email" type="email" name="email">
                <div class="label-row-si">
                    <label>Password*</label>
                    <p class="forgor-si">Forgot your password?</p>
                </div>
                <input id="password" type="password" name="password">
                <button class="btn-si btn-login">Log in</button>
                <button class="btn-si btn-google">Log in with Google</button>
                <p style="font-size: 12px; text-align: center;">
                    Don't have an account? <a href="SignUp.php">Sign Up</a>
                </p>
            </form>
        </div>
        <div style="font-size: 10px;">© 2025 NamaKelompok</div>
    </div>
    <div class="kanan-si">
        <img src="./Assets/cewegwpt2.jpg">
    </div>
</body>
</html>