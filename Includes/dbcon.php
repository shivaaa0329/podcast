<?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "podcast";

        // Create a connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Die if connection was not successful
        if ($connection->connect_error) {
            die("Sorry we failed to connect: " . $connection->connect_error);
        }
?>