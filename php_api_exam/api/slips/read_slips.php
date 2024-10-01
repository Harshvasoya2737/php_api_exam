<?php
    include "../../config.php";
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/JSON");

    if($_SERVER["REQUEST_METHOD"]=="GET"){

        $config = new Config();

        $obj = $config-> readSlips();

        $response =[];

        while($record = mysqli_fetch_assoc($obj)){
            array_push($response,$record);
        }
        $arr["data"]=$response;

    }else{
        $arr["error"] ="Only Get http request allow";
    }
    echo json_encode($arr);

?>