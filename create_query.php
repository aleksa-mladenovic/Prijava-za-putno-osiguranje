<?php
    require_once "connection.php";

    $q = "CREATE TABLE IF NOT EXISTS nosioci(
        id INT AUTO_INCREMENT,
        ime_prezime VARCHAR(255) NOT NULL,
        datum_rodjenja DATE NOT NULL,
        broj_pasosa VARCHAR(20) NOT NULL,
        broj_telefona VARCHAR(20),
        email VARCHAR(255) NOT NULL,
        datum_pocetka DATE NOT NULL,
        datum_kraja DATE NOT NULL,
        broj_dana INT NOT NULL,
        tip_polise BOOLEAN NOT NULL,
        timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(id)
    )";

    $resultOfQuery = $conn->query($q);

    if(!$resultOfQuery) {
        $err = $conn->error;
        echo "Doslo je do greske prilikom kreiranja tabele nosioci: $err";
    }

    $q = "CREATE TABLE IF NOT EXISTS dodatni_nosioci(
        id INT AUTO_INCREMENT,
        ime_prezime VARCHAR(255) NOT NULL,
        datum_rodjenja DATE NOT NULL,
        broj_pasosa VARCHAR(20) NOT NULL,
        id_nad_nosioca INT NOT NULL,
        PRIMARY KEY(id),
        FOREIGN KEY (id_nad_nosioca) REFERENCES nosioci(id)
    )";

    $resultOfQuery = $conn->query($q);

    if(!$resultOfQuery) {
        $err = $conn->error;
        echo "Doslo je do greske prilikom kreiranja tabele nosioci: $err";
    }
?>