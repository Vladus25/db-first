<?php

    function getDBConnection(
                                $servername = "localhost",
                                $username = "root",
                                $password = "root",
                                $dbname = "dbhotel"
                            ) {


        $connection = new mysqli($servername, $username, $password, $dbname);

        if($connection && $connection -> connect_error) {

            echo "Connection failed " . $connection -> connect_error;
        } else {

            return $connection;
        }
    }

    function DBClose($stmt, $connection) {

        $stmt -> close();
        $connection -> close();
    }

    function getRoomsSQL() {

        return "SELECT room_number, id
                FROM stanze";
    }

    function getRoomDescriptionSQL() {

        return "SELECT room_number, floor, beds
                FROM stanze
                WHERE id = ?";
    }

?>
