<?php

include "../../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $customers_id = $_POST['id'];
    $car_name = $_POST['name'];
    $parkings_slot_id = $_POST['slot'];




    $res = $config->insertParkings($customers_id, $car_name,$parkings_slot_id);

    if ($res) {
        $response = ["id" => $customers_id];
        $response = ["name" => $car_name];
        $response = ["slot" => $parkings_slot_id];

        $arr["data"] = ["msg" => "Member inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Member insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>
