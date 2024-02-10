<?php
    //Kreiranje objekta konekcije
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "polisa_osiguranja";

    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error) {
        die("Greška prilikom konektovanja na bazu podataka: " . $conn->connect_error);
    }