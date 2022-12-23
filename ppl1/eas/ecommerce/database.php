<?php
    function db_connect() {
        static $connection;
        if(!isset($connection)) {
            $connection = mysqli_connect("localhost", "root", "", "E-Commerce");
        }
        if($connection === false) {
            return mysqli_connect_error(); 
        }
        return $connection;
    }

    function db_query($query) {
        $connection = db_connect();
        $result = mysqli_query($connection, $query);
        return $result;
    }

    function db_select($query) {
        $rows = array();
        $result = db_query($query);
        if($result === false) {
            return false;
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function db_error() {
        $connection = db_connect();
        return mysqli_error($connection);
    }
?>