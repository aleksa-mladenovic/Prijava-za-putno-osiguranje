<?php
    require_once "connection.php";

    $key = $_GET["key"];
    $q = "SELECT `ime_prezime`, `datum_rodjenja`, `broj_pasosa`
          FROM `nosioci` 
          WHERE `broj_pasosa` = $key";
    $resultOfQuery = $conn->query($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled grupnog osiguranja</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- Navigacija -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Putna osiguranja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Pocetna</a>
                    <a class="nav-link" href="pregled.php">Pregled unetih podataka</a>
                </div>
            </div>
        </div>
    </nav>

    <h3 class="text-primary">Pregled grupnog osiguranja</h3>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Ime i prezime nosioca</th>
                <th scope="col">Datum rođenja</th>
                <th scope="col">Broj pasoša</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $resultOfQuery->fetch_assoc()){
                        echo "<tr>";   
                        echo "<td>".$row["ime_prezime"]."</td>";  
                        echo "<td>".$row["datum_rodjenja"]."</td>";  
                        echo "<td>".$row["broj_pasosa"]."</td>";  
                        echo "</tr>";  
                    }
                ?>
                <thead>
                    <tr>
                    <th scope="col">Ime i prezime dodatnih nosioca</th>
                    <th scope="col">Datum rođenja</th>
                    <th scope="col">Broj pasoša</th>
                    </tr>
                </thead>
                <?php
                    $q = "SELECT `dodatni_nosioci`.`ime_prezime` AS `ime_prezime`, `dodatni_nosioci`.`datum_rodjenja` AS `datum_rodjenja`, `dodatni_nosioci`.`broj_pasosa` AS `broj_pasosa`
                          FROM `dodatni_nosioci` CROSS JOIN `nosioci` ON `dodatni_nosioci`.`id_nad_nosioca` = `nosioci`.`id` 
                          WHERE `nosioci`.`broj_pasosa` = $key";
                    $resultOfQuery = $conn->query($q);
      
                    while($row = $resultOfQuery->fetch_assoc()){
                        echo "<tr>";   
                        echo "<td>".$row["ime_prezime"]."</td>";  
                        echo "<td>".$row["datum_rodjenja"]."</td>";  
                        echo "<td>".$row["broj_pasosa"]."</td>";  
                        echo "</tr>";  
                    }
                    $_COOKIE["brPasosa"] = 0;
                ?>
            </tbody>
        </table>
    </div>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>