<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
$userid = mysqli_real_escape_string($conn, $userid);

// Recupera le informazioni dell'utente
$query_user = "SELECT * FROM users WHERE id = $userid";
$res_user = mysqli_query($conn, $query_user);
$userinfo = mysqli_fetch_assoc($res_user);

// Recupera gli ordini dell'utente
$query_orders = "SELECT * FROM orders WHERE user_id = $userid";
$res_orders = mysqli_query($conn, $query_orders);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="profile.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <title>BMW SITE</title>
</head>

<body>
    <header>
        <div class="logo" onclick="window.location.href='home.php'">
            <img src='logo_white_BMW.png' />
        </div>
        <nav>
            <a href='home.php#search-container'>Search</a>
            <a href='profile.php'>My profile</a>
            <a href='my_cart.php'>My cart</a>
            <a href='https://www.bmw-motorrad.it/it/home.html#/filter-tutto'>Official BMW Site</a>
        </nav>
    </header>

    <img class="fit" src="bmw-image.png">

    <div class="userInfo">
        <h1><?php echo $userinfo['name'] . " " . $userinfo['surname'] ?></h1>
        <h1>Email: <?php echo $userinfo['email'] ?></h1>
        <h1>Username: <?php echo $userinfo['username'] ?></h1>
        <a href='logout.php' class='button'>LOGOUT</a>
    </div>

    <div class="orders">
        <h2>Your Orders</h2>
        <div class="order-list">
            <?php while ($order = mysqli_fetch_assoc($res_orders)): ?>
                <div class="order">
                    <p>Component: <?php echo $order['component_name']; ?></p>
                    <p>Model: <?php echo $order['model']; ?></p>
                    <p>Quantity: <?php echo $order['number_of_components']; ?></p>
                    <p>Total Price: <?php echo $order['total_price']; ?> €</p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer>
        <b>Official BMW motorrad price</b>
        <b>Secure payment</b>
        <b>New original manufacturer</b>
        <b>International delivery</b>
        <b>Official BMW Site</b>
        <b>Expert customer service</b>
    </footer>
</body>

</html>

<?php mysqli_close($conn); ?>
