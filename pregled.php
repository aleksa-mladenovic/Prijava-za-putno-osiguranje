<?php
    require_once "connection.php";

    $q = "SELECT `timestamp`, `ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `email`, `datum_pocetka`, `datum_kraja`, `broj_dana`,`tip_polise` 
          FROM `nosioci`;";
    $resultOfQuery = $conn->query($q);

    function formatDate($date){
        $exploded = explode('-', $date);
        $year = $exploded[0];
        $month = $exploded[1];
        $day = $exploded[2];
        return $day.".".$month.".".$year.".";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregled nosicoa polise</title>
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
                    <a class="nav-link active" aria-current="page" href="#">Pregled unetih podataka</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Tabela -->
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Datum unosa polise</th>
                <th scope="col">Ime i prezime nosioca</th>
                <th scope="col">Datum rođenja</th>
                <th scope="col">Broj pasoša</th>
                <th scope="col">Email</th>
                <th scope="col">Datum putovanja od</th>
                <th scope="col">Datum putovanja do</th>
                <th scope="col">Broj dana</th>
                <th scope="col">Tip osiguranje</th>
                <th scope="col">Akcija</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $resultOfQuery->fetch_assoc()){
                        echo "<tr>";  
                        echo "<td>".$row["timestamp"]."</td>";  
                        echo "<td>".$row["ime_prezime"]."</td>";  
                        echo "<td>".formatDate($row["datum_rodjenja"])."</td>";  
                        echo "<td>".$row["broj_pasosa"]."</td>";  
                        echo "<td>".$row["email"]."</td>";  
                        echo "<td>".formatDate($row["datum_pocetka"])."</td>";  
                        echo "<td>".formatDate($row["datum_kraja"])."</td>";  
                        echo "<td>".$row["broj_dana"]."</td>";  
                        if($row["tip_polise"] == 1){
                            echo "<td>Grupno</td>";
                            // Dugme akcija koja pomocu GET metoda prenosi br pasosa nosioca polise u pregled_dodatnih.php
                            echo "<td><form action='pregled_dodatnih.php' method='get'><input type='submit' value='Akcija'>
                            <input type='text' name='key' hidden value='".$row["broj_pasosa"]."'></form></td>";
                        }else{
                            echo "<td>Individualno</td>";
                            echo "<td></td>";
                        } 
                        echo "</tr>";  
                    }
                ?>
            </tbody>
        </table>
    </div>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>