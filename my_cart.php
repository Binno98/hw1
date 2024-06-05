<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM cart WHERE user_id = $userid";
    $res = mysqli_query($conn, $query);

    // Funzione per eseguire l'ordine
    function executeOrder($conn, $userid) {
        $query = "SELECT * FROM cart WHERE user_id = $userid";
        $res = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($res)) {
            // Inserisci l'ordine nel database degli ordini
            $component_name = mysqli_real_escape_string($conn, $row['component_name']);
            $model = mysqli_real_escape_string($conn, $row['model']);
            $quantity = (int)$row['number_of_components'];
            $price = (float)$row['price'];
            $insert_query = "INSERT INTO orders (user_id, component_name, model, number_of_components, total_price) VALUES ('$userid', '$component_name', '$model', $quantity, $price)";
            mysqli_query($conn, $insert_query);
        }
        // Svuota il carrello
        $delete_query = "DELETE FROM cart WHERE user_id = $userid";
        mysqli_query($conn, $delete_query);
    }

    if (isset($_POST['execute_order'])) {
        executeOrder($conn, $userid);
        // Reindirizza l'utente alla pagina del profilo
        header("Location: profile.php");
        exit;
    }
?>

<html>
<head>
    <link rel='stylesheet' href='my_cart.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Your Cart</title>
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

    <div class="container">
        <h1>Your Cart</h1>
        <div id="cart-items">
            <?php while ($row = mysqli_fetch_assoc($res)): ?>
                <div class="item">
                    <div class="item-details">
                        <p>Component: <?php echo $row['component_name']; ?></p>
                        <p>Model: <?php echo $row['model']; ?></p>
                        <p>Quantity: <?php echo $row['number_of_components']; ?></p>
                        <p>Price: <?php echo $row['price']; ?> €</p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <form method="post">
            <input type="submit" name="execute_order" value="Place Order">
        </form>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>
