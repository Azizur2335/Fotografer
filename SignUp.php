<!DOCTYPE html>
<head>
    <title>Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            min-height: 100vh;
            background-color: #fff;
        }
        .logo-su {
            font-weight: bold;
            font-size: 22px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 1px;
        }
        .box-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .box-su {
            border: 1px solid black;
            padding: 30px 40px;
            background-color: white;
            max-width: 400px;
            width: 100%;
            text-align: center;
            min-height: 550px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        form label {
            font-size: 12px;
            display: inline-block;
            text-align: left;
            width: 100%;
        }
        form input {
            width: 100%;
            border: solid 1px;
            font-size: 14px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .btn-su {
            width: 100%;
            height: 35px;
            font-size: 12px;
            margin-bottom: 15px;
            border-radius: 2px;
            cursor: pointer;
        }
        .btn-login {
            background-color: black;
            color: white;
            border: none;
        }
        .btn-google {
            background-color: white;
            border: solid 1px;
        }
        .footer {
            font-size: 10px;
            text-align: center;
            margin-bottom: 20px; /* jarak bawah */
        }
    </style>
</head>
<body>
    <div class="logo-su">Logo</div>
    <div class="box-container">
        <div class="box-su">
            <h1 style="text-align: center; margin-bottom: 5px;">Sign Up</h1>
            <p style="font-size: 14px; text-align: center; margin-bottom: 15px;">Lorem ipsum dolor sit amet adipiscing elit.</p>
            <form action="">
                <label>Name*</label>
                <input type="text">
                <label>Email*</label>
                <input type="email">
                <label>Password*</label>
                <input type="password">
                <button class="btn-su btn-login">Sign up</button>
                <button class="btn-su btn-google">Sign up with Google</button>
            </form>
            <p style="font-size: 12px; text-align: center;">
                Already have an account? <a href="SignIN.php">Log In</a>
            </p>
        </div>
    </div>
    <div class="footer">© 2025 NamaKelompok</div>
</body>
</html>
