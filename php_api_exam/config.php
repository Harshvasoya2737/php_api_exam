<?php
 class Config{
    private $servername = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "new_database";
    public $conn;

    function initconnection()
    {
        $this->conn =mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
    }

    //parking Table //insert
    function insertParkings($customers_id, $cars_name,$parkings_slot_id)
    {
        $this->initConnection();

        $query = "INSERT INTO `parkings`(customers_id,`cars_name`,parkings_slot_id) VALUES ('$customers_id', '$cars_name','$parkings_slot_id');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }


    function updateParkings($customers_id,$cars_name,$parkings_slot_id,$parkings_id)
    {
        $this->initconnection();

        $query ="UPDATE parkings SET customers_id = '$customers_id', cars_name = '$cars_name',parkings_slot_id='$parkings_slot_id' WHERE parkings_id = '$parkings_id'";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    function deleteParkings($parkings_id)
    {
        $this->initConnection();

        $query = "DELETE FROM parkings WHERE parkings_id = '$parkings_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readParkings()
    {
        $this->initConnection();

        $query = "SELECT * FROM `parkings`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    //slip //insert
    function insertSlips($slip_customer_name, $slip_cost,$slip_ispaid)
    {
        $this->initConnection();

        $query = "INSERT INTO `slips`(slip_customer_name,`slip_cost`,slip_ispaid) VALUES ('$slip_customer_name', '$slip_cost','$slip_ispaid');";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }


    function updateSlips($slip_customer_name,$slip_cost,$slip_ispaid,$slip_id)
    {
        $this->initconnection();

        $query ="UPDATE slips SET slip_customer_name = '$slip_customer_name', slip_cost = '$slip_cost',slip_ispaid='$slip_ispaid' WHERE slip_id = '$slip_id'";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    function deleteSlips($slip_id)
    {
        $this->initConnection();

        $query = "DELETE FROM slips WHERE slip_id = '$slip_id'";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    // read
    function readSlips()
    {
        $this->initConnection();

        $query = "SELECT * FROM `slips`";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }


 }
?>















