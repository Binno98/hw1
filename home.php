<?php
require_once 'auth.php';
if (!$userid = checkAuth()) {
    header("Location: login.php");
    exit;
}

// Connessione al database
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
$userid = mysqli_real_escape_string($conn, $userid);
$query = "SELECT * FROM users WHERE id = $userid";
$res_1 = mysqli_query($conn, $query);
$userinfo = mysqli_fetch_assoc($res_1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css">
    <script src="home.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <title>BMW SITE</title>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo" onclick="window.location.href='index.php'">
            <img src='logo_white_BMW.png' />
        </div>
        <nav>
            <a href="#search-container">Search</a>
            <a href='profile.php'>My profile</a>
            <a href='my_cart.php'> My cart</a>
            <a href='https://www.bmw-motorrad.it/it/home.html#/filter-tutto'>Official Bmw Site</a>
        </nav>
    </header>
    <img class="fit" src="bmw-image.png">

    <section class="allmodels">
        <div id="sec_bmw_motorrad_standard">
            <div class="overlay">
                <h1>BMW MOTORRAD</h1>
            </div>
            <div class="choose-model-container">
                <h2>Choose your model</h2>
            </div>

            <div id="row">
                <a href="Parts_shop_with_access.php?model=c400" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    c400
                </a>
                <a href="Parts_Shop_with_access.php?model=c600" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    c600
                </a>
                <a href="Parts_Shop_with_access.php?model=c650" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    c650
                </a>
                <a href="Parts_Shop_with_access.php?model=cEvolution" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    cEvolution
                </a>
                <a href="Parts_Shop_with_access.php?model=f700" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    f700
                </a>
                <a href="Parts_Shop_with_access.php?model=f750" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    f750
                </a>
            </div>

            <div id="row">
                <a href="Parts_Shop_with_access.php?model=f800" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    f800
                </a>
                <a href="Parts_Shop_with_access.php?model=f850" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    f850
                </a>
                <a href="Parts_Shop_with_access.php?model=f900" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    f900
                </a>
                <a href="Parts_Shop_with_access.php?model=g310" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    g310
                </a>
                <a href="Parts_Shop_with_access.php?model=g450" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    g450
                </a>
                <a href="Parts_Shop_with_access.php?model=g650" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    g650
                </a>
            </div>

            <div id="row">
                <a href="Parts_Shop_with_access.php?model=HP2" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    HP2
                </a>
                <a href="Parts_Shop_with_access.php?model=HP4" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    HP4
                </a>
                <a href="Parts_Shop_with_access.php?model=k1100" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k1100
                </a>
                <a href="Parts_Shop_with_access.php?model=k1200" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k1200
                </a>
                <a href="Parts_Shop_with_access.php?model=k1300" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k1300
                </a>
                <a href="Parts_Shop_with_access.php?model=k1600" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k1600
                </a>
            </div>
        </div>

        <div id="sec_bmw_motorrad_standard">
            <h1>BMW MOTORRAD CLASSIC</h1>
            <div class="choose-model-container">
                <h2>Choose your model</h2>
            </div>

            <div id="row">
                <a href="Parts_Shop_with_access.php?model=k100" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k100
                </a>
                <a href="Parts_Shop_with_access.php?model=k75" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k75
                </a>
                <a href="Parts_Shop_with_access.php?model=k1" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    k1
                </a>
                <a href="Parts_Shop_with_access.php?model=r100" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r100
                </a>
                <a href="Parts_Shop_with_access.php?model=r24" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r24
                </a>
                <a href="Parts_Shop_with_access.php?model=r25" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r25
                </a>
            </div>
            <div id="row">
                <a href="Parts_Shop_with_access.php?model=r26" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r26
                </a>
                <a href="Parts_Shop_with_access.php?model=r27" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r27
                </a>
                <a href="Parts_Shop_with_access.php?model=r45" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r45
                </a>
                <a href="Parts_Shop_with_access.php?model=r50" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r50
                </a>
                <a href="Parts_Shop_with_access.php?model=r51" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r51
                </a>
                <a href="Parts_Shop_with_access.php?model=r60" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r60
                </a>
            </div>
            <div id="row">
                <a href="Parts_Shop_with_access.php?model=r65" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r65
                </a>
                <a href="Parts_Shop_with_access.php?model=r67" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r67
                </a>
                <a href="Parts_Shop_with_access.php?model=r68" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r68
                </a>
                <a href="Parts_Shop_with_access.php?model=r69" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r69
                </a>
                <a href="Parts_Shop_with_access.php?model=r75" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r75
                </a>
                <a href="Parts_Shop_with_access.php?model=r80" class="item-row">
                    <img class="fit-spaces" src='BMW_logo_(gray).svg.png' />
                    r80
                </a>
            </div>
        </div>
    </section>
    <div class="search-container" id="search-container">
        <h1>Search for a BMW Motorcycle Model</h1>
        <form id="search-form">
            <label for="model">Model:</label>
            <input type="text" id="model" name="model">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="itemContainer">
    </div>
    <footer>
        <b>Official BMW motorrad price</b>
        <b>Secure payment</b>
        <b>New original manufacturer</b>
        <b>International delivery</b>
        <b>Official Bmw Site</b>
        <b>Expert customer service</b>
    </footer>
</body>

</html>