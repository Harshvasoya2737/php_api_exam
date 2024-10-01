<?php

    include "../../config.php";
    header("Access-Control-Allow-Methods: DELETE");
    header("Content-Type: application/JSON");

    if($_SERVER["REQUEST_METHOD"]=="DELETE"){
        $config = new Config();

        $input=file_get_contents("php://input");

        parse_str($input,$_DELETE);

        $slip_id = $_DELETE['id'];
        $res = $config->deleteSlips($slip_id);

        if($res==1){
            $response =["id"=> $slip_id];

            $arr["data"]=["msg"=> "Slip data deleted...","res"=>$response];
            http_response_code(201);
        }else{
        $arr["error"] ="Slip deletion is failed...";
        }
    }else{
    $arr["error"]="Only DELETE http Method Allowed";
    }
    echo json_encode($arr);
?>