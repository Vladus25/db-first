<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Room Description</title>
    <!-- font awesame -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>
    <!-- My CSS -->
    <style>

      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body{
        background-color: purple;
        color: white;
        text-align: center;
      }
      a{
        text-decoration: none;
        color: white;
      }
      ul{
        list-style: none;
        padding-top: 20px;
      }
      li{
        font-size: 20px;
      }

    </style>
</head>
<body>

<?php

    require_once "data.php";

    $id = $_GET['id'];

    $DBconn = getDBConnection();
    $sql = getRoomDescriptionSQL();

    $stmt = $DBconn -> prepare($sql);
    $stmt -> bind_param("i", $id);
    $stmt -> execute();
    $stmt -> bind_result($roomNumber, $roomFloor, $roomBeds);

    echo "<ul>";
    $stmt -> fetch();
    echo "<li>RoomNumber: " . $roomNumber . " " . "| Floor: " . $roomFloor . " " . "| Beds: " . $roomBeds . "</li>";
    echo "</ul>";
    
    DBClose($stmt, $DBconn);

?>

</body>
</html>
