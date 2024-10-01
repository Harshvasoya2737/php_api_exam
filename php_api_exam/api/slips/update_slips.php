<?php
    include "../../config.php";
    header("Access-Control-Allow-Methods: PUT,PATCH");
    header("Content-Type: application/JSON");

    if($_SERVER["REQUEST_METHOD"]== "PUT" || $_SERVER["REQUEST_METHOD"]== "PATCH")
    {
        $config = new Config();
        $input = file_get_contents("php://input");

        parse_str($input, $_UPDATE);

        $slip_customer_name = $_UPDATE['name'];
        $slip_cost = $_UPDATE['cost'];
        $slip_ispaid = $_UPDATE['paid'];
        $slip_id = $_UPDATE['id'];

        $res = $config->updateSlips($slip_customer_name, $slip_cost, $slip_ispaid, $slip_id);

        if($res == 1){
            $response = [
                "id" => $slip_id,
                "name" => $slip_customer_name,
                "cost" => $slip_cost,
                "paid" => $slip_ispaid
            ];

            $arr["data"] = [
                "msg" => "Slip update...",
                "res" => $response
            ];

            http_response_code(201);
        } else {
            $arr["error"] = "Slip update failed...";
        }
    } else {
        $arr["error"] = "Only PUT and PATCH METHOD will work";
    }

    echo json_encode($arr);
?>