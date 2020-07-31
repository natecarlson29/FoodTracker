<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Registration</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="login">
            <header>
                <h1>Nate's Food Tracker</h1>
            </header>
			<h2>Registration Form</h2>
                        <form action="index.php" method="post">
                            <label>Username: </label>
                            <input type="text" name="username" value='<?php if (!empty($username)){  xecho ($username); } ?>'/>
                            <?php if (!empty($userNameError)){  xecho ($userNameError); } ?>
                            <br>
                            <label>Password: </label>
                            <input type="text" name="password" value='<?php if (!empty($password)){  xecho ($password); } ?>'/>
                            <?php if (!empty($passwordError)){  xecho ($passwordError); } ?>
                            <br><br>
                            
                            <input type="hidden" name="action" value="addUser">
                            
                            <input type="submit" value="GO" />
                        </form>
                        <a href="login.php">Have an Account? Login Here</a>
            </div>
        </div>
    </body>
</html>
