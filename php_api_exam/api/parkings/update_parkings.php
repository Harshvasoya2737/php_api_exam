<?php
    include "../../config.php";
    header("Access-Control-Allow-Methods: PUT,PATCH");
    header("Content-Type: application/JSON");

    if($_SERVER["REQUEST_METHOD"]== "PUT" || $_SERVER["REQUEST_METHOD"]== "PATCH")
    {
        $config = new Config();
        $input = file_get_contents("php://input");

        parse_str($input, $_UPDATE);

        $customers_id = $_UPDATE['id'];
        $cars_name = $_UPDATE['name'];
        $parkings_slot_id = $_UPDATE['slot'];
        $parkings_id = $_UPDATE['pid'];

        $res = $config->updateParkings($customers_id, $cars_name, $parkings_slot_id, $parkings_id);

        if($res == 1){
            $response = [
                "pid" => $parkings_id,
                "id" => $customers_id,
                "name" => $cars_name,
                "slot" => $parkings_slot_id
            ];

            $arr["data"] = [
                "msg" => "Parkings update...",
                "res" => $response
            ];

            http_response_code(201);
        } else {
            $arr["error"] = "Parkings update failed...";
        }
    } else {
        $arr["error"] = "Only PUT and PATCH METHOD will work";
    }

    echo json_encode($arr);
?>