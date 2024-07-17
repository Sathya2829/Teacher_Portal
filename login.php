<!DOCTYPE html>
<html>
<head>
    <title>Teacher Portal Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
 
<div class="login-container">
    <h2>Login to Teacher Portal</h2>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="notification error">Invalid username or password</div>';
        }
        ?>
    </form>
</div>
 
</body>
</html>