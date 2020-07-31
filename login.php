<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Login</title>
    </head>
    <body>
        
        <div class="wrapper">
            <div class="login">
            <header>
                <h1>Nate's Food Tracker</h1>
            </header>
            <h2>Login</h2>
            <form action="index.php" method="post" id="loginForm">
                <label>Username: </label>
                <input type="text" name="userName"/>
                <?php if (!empty($loginUserNameError)){  xecho ($loginUserNameError); } ?>
                <br>
                <label>Password: </label>
                <input type="text" name="password"/>
                <?php if (!empty($loginPasswordError)){  xecho ($loginPasswordError); } ?>
                <br><br>
                <input type="submit" value="Login" />
                
                <input type="hidden" name="action" value="login">
            </form>
            <a href="registration.php">Don't have an Account? Register Here</a>
            </div>
        </div>
    </body>
</html>
