<?php

function fetchMotorcycleData($model) {
    $api_key = '6/+a4+78OLLOtx5s/U3gxw==TEwV8HzoGs4swCMS';  
    $url = 'https://api.api-ninjas.com/v1/motorcycles?make=bmw&model=' . urlencode($model);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Api-Key: '.$api_key)); 
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}

$result = null;
if (isset($_GET['model'])) {
    $model = $_GET['model'];
    $result = fetchMotorcycleData($model);

    if (empty($result)) {
        if (strpos($model, ' ') === false) {
            $model = substr($model, 0, 1) . ' ' . substr($model, 1);
        } else {
            $model = str_replace(' ', '', $model);
        }
        $result = fetchMotorcycleData($model);
    }

    echo json_encode($result);
} else {
    echo json_encode(["error" => "No model specified"]);
}
?>
