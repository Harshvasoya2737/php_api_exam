<?php

include "../../config.php";

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $config = new Config();

    $slip_customer_name = $_POST['name'];
    $slip_cost = $_POST['cost'];
    $slip_ispaid = $_POST['paid'];




    $res = $config->insertSlips($slip_customer_name, $slip_cost,$slip_ispaid);

    if ($res) {
        $response = ["name" => $slip_customer_name];
        $response = ["cost" => $slip_cost];
        $response = ["paid" => $slip_ispaid];

        $arr["data"] = ["msg" => "Slip inserted....", "res" => $response];
        http_response_code(201);
    } else {
        $arr["error"] = "Slip insertion failed";
    }

} else {
    $arr["error"] = "Only POST http request is allowed";
}
echo json_encode($arr);

?>
