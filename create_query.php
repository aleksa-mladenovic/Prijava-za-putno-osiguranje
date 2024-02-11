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
        echo "Doslo je do greske prilikom kreiranja tabele dodatni nosioci: $err";
    }

    // Dummy data
//     $q = "INSERT INTO `nosioci` (`ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `broj_telefona`, `email`, `datum_pocetka`, `datum_kraja`, `broj_dana`, `tip_polise`) 
//           VALUES ('Jhon Doe', '1974-02-13', '023146759', '0612345678', 'test@email.com', '2024-02-13', '2024-02-18', '5', '0'), 
//                  ('Lisa Doe', '1980-06-19', '019283756', '0698765432', 'test2@email.com', '2024-02-13', '2024-02-18', '5', '1')";

//     $resultOfQuery = $conn->query($q);

//     if(!$resultOfQuery) {
//         $err = $conn->error;
//         echo "Doslo je do greske prilikom kreiranja tabele dodatni nosioci: $err";
//     }

//     $q = "INSERT INTO `dodatni_nosioci` (`ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `id_nad_nosioca`) 
//           VALUES ('Alex Doe', '2000-07-21', '014567382', '2'), 
//                  ('Luke Doe', '2005-11-10', '014567391', '2')";

//     $resultOfQuery = $conn->query($q);

//     if(!$resultOfQuery) {
//         $err = $conn->error;
//         echo "Doslo je do greske prilikom kreiranja tabele dodatni nosioci: $err";
//     }
?>