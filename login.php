<?php
include 'auth.php';
if (checkAuth()) {
    header('Location: home.php');
    exit;
}

if (!empty($_POST["username"]) && !empty($_POST["password"])) {

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $query = "SELECT * FROM users WHERE username = '" . $username . "'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    ;

    if (mysqli_num_rows($res) > 0) {
        $entry = mysqli_fetch_assoc($res);
        if (password_verify($_POST['password'], $entry['password'])) {

            // Set user session
            $_SESSION["_agora_username"] = $entry['username'];
            $_SESSION["_agora_user_id"] = $entry['id'];
            header("Location: home.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }
    $error = "Incorrect username and/or password.";
} else if (isset($_POST["username"]) || isset($_POST["password"])) {
    $error = "Enter username and password.";
}

?>

<html>

<head>
    <link rel='stylesheet' href='login.css'>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign in - BMW BIKE PARTS</title>
</head>

<body>
    <header>
        <div class="logo" onclick="window.location.href='index.php'">
            <img src='logo_white_BMW.png' />
        </div>
        <nav>
        <a href='index.php#search-container'>Search</a>
            <a href='login.php'>Login</a>
            <a href='login.php'> My cart</a>
            <a href='https://www.bmw-motorrad.it/it/home.html#/filter-tutto'>Official Bmw Site</a>
        </nav>
    </header>
    <img class="fit" src="bmw-image.png">
    </div>
    <main class="login">
        <section class="main">
            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }

            ?>
            <form name='login' method='post'>
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' <?php if (isset($_POST["username"])) {
                        echo "value=" . $_POST["username"];
                    } ?>>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if (isset($_POST["password"])) {
                        echo "value=" . $_POST["password"];
                    } ?>>
                </div>
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="Sign in">
                    </div>
                </div>
            </form>
            <div class="signup">
                <h4>Don't have an account?</h4>
            </div>
            <div class="signup-btn-container"><a class="signup-btn" href="signup.php">SIGN UP FOR BMW BIKE PARTS</a>
            </div>
        </section>
    </main>
</body>

</html>