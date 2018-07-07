<html>

<head>
    <title>Collegue Management</title>
    <link type="text/css" rel="stylesheet" href="login.css">
</head>

<body>
    <div class="outerbox" id="login">
        <img src="avatar.jpg" class="avatar">
        <form method="post" action="dbase.php">
            <p>Email-Id</p>
            <input type="email" name="email" placeholder="Enter your username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="submit" name="submit" value="Let me In">
            <a href="#" onclick=MyPassword()>Where is my password?</a>
            <br>
            <a href="#" onclick=MyRegister()>Don't have an account?Enroll here</a>
        </form>
    </div>

    <div class="outerbox" id="register">
        <img src="register.jpg" class="avatar">
        <form method="post" action="register.php">
            <p>Name</p>
            <input type="text" name="name" placeholder="Enter your Name" required>
            <p>Mail-id</p>
            <input type="email" name="email" placeholder="Enter your mail-id" required>
            <p>Password</p>
            <input id="password" type="password" name="password" placeholder="Enter your password" onkeyup="check()" required>
            <p>Re type Password</p>
            <input id="confirm_password" type="password" placeholder="Enter your password again" onkeyup="check()" required>
            <div id="message"></div>
            <input type="submit" value="Enroll">
            <a href="#" onclick="MyLogin()">Have an account?Click here</a>
            <br>
            <a href="#" onclick=MyPassword()>Forgot password?</a>


        </form>
    </div>
    <div class="outerbox" id="forgot">
        <img src="password.jpg" id="icon">
        <form method="post" action="forgot.php">
            <P>Enter your registered mail-ID</p>
            <input type="email" name="email" placeholder="Mail-id please" required>
            <input id="submit" type="submit" name="forgotpass" value="Submit">
            <h5 id="recover">A password recover link has been sent to your mail-id</h5>
            <br>
            <h5 id="error"> The mail-id you have entered is not registered</h5>
            <br>
            <a href="#" onclick=MyRegister()>Register Here</a>
            <br>
            <a href="#" onclick="MyLogin()">Have an account?Click here</a>
            <br>


        </form>
    </div>

</body>
<script src="login.js"></script>
</html>