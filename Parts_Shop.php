<?php
if (isset($_GET['model'])) {
    $model = $_GET['model'];
    echo "<script>var bikeModel = '" . htmlspecialchars($model) . "';</script>";
} else {
    echo "<script>var bikeModel = '';</script>";
}
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="parts_shop3.css">
    <script src="parts_photo_list.js" defer></script>
    <script src="parts_shop3.js" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <title>BMW SITE</title>
</head>
<body>
    <section id="modal-view" class="hidden"></section>

    <header>
    <div class="logo" onclick="window.location.href='index.php'">
        <img src='logo_white_BMW.png'/>
    </div>
        <nav>       
            <a href='index.php#search-container'>Search</a>
            <a href='login.php'>Login</a>
            <a href='login.php'>My cart</a>
            <a href='https://www.bmw-motorrad.it/it/home.html#/filter-tutto'>Official Bmw Site</a>
        </nav>
    </header>
    <img class="fit" src="bmw-image.png">

    <section class="allmodels">
        <div id="sec_bmw_motorrad_standard">
            <div class="overlay">
                <h1>BMW MOTORRAD</h1>
            </div>

            <!-- Prima riga -->
            <div id="row">
                <a class="item-row">
                    <img class="fit-spaces" src='clutch.jpg'/>
                    clutch
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='cooling.jpg'/>
                    cooling
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='engine.jpg'/>
                    engine
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='frame.jpg'/>
                    frame
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='front_brakes.jpg'/>
                    front brakes
                </a>
            </div>

            <!-- Seconda riga -->
            <div id="row">
                <a class="item-row">
                    <img class="fit-spaces" src='fuel_control.jpg'/>
                    fuel control
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='fuel_system.jpg'/>
                    fuel system
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='gearbox.jpg'/>
                    gearbox
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='lubrification.jpg'/>
                    lubrification
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='rear_brakes.jpg'/>
                    rear brakes
                </a>
            </div>

            <!-- Terza riga -->
            <div id="row">
                <a class="item-row">
                    <img class="fit-spaces" src='rear_suspension.jpg'/>
                    rear suspension
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='starter.jpg'/>
                    starter
                </a>
                <a class="item-row">
                    <img class="fit-spaces" src='transmission.jpg'/>
                    transmission
                </a>
            </div>
        </div>
    </section>

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
