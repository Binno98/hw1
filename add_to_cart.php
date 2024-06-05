<?php
    require_once 'auth.php';
    $userid = checkAuth();
    if (!$userid) {
        echo json_encode(array('ok' => false, 'error' => 'Utente non autenticato'));
        exit;
    }
    
    addToCart($userid);

    function addToCart($userid) {
        global $dbconfig;
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        // Verifica che i dati siano stati inviati correttamente
        if (!isset($_POST['component_name'], $_POST['model'], $_POST['price'])) {
            echo json_encode(array('ok' => false, 'error' => 'Dati mancanti'));
            exit;
        }

        // Escaping dei dati
        $component_name = mysqli_real_escape_string($conn, $_POST['component_name']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        // Verifica se il componente è già nel carrello dell'utente
        $query = "SELECT * FROM cart WHERE user_id = '$userid' AND component_name = '$component_name' AND model = '$model'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $current_number = $row['number_of_components'];
            $new_number = $current_number + 1;
            $new_total_price = $row['price'] * $new_number;
            $update_query = "UPDATE cart SET number_of_components = $new_number, price = $new_total_price WHERE user_id = '$userid' AND component_name = '$component_name' AND model = '$model'";
            mysqli_query($conn, $update_query) or die(mysqli_error($conn));
            echo json_encode(array('ok' => true));
            exit;
        }

        // Inserimento del nuovo componente nel carrello
        $query = "INSERT INTO cart(user_id, component_name, model, price, number_of_components) VALUES('$userid', '$component_name', '$model', '$price', 1)";
        if(mysqli_query($conn, $query)) {
            echo json_encode(array('ok' => true));
            exit;
        } else {
            echo json_encode(array('ok' => false, 'error' => 'Errore durante l\'inserimento nel carrello'));
            exit;
        }

        mysqli_close($conn);
    }
?>
