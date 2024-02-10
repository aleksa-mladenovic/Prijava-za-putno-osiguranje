<?php 
    $naemErr = $dateOfBirthErr = $passportNumberErr = $phoneNumberErr = $emailErr = $dateStartTravelErr = $dateEndTravelErr = $insuranceTypeErr = "";
    $name = $dateOfBirth = $passportNumber = $phoneNumber = $email = $dateStartTravel =  $dateEndTravel = $iterator = $insuranceType = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Validacija imena
        if(empty($_POST["name"])){
            $naemErr = "Molim Vas da unesete Vaše ime i prezime";
        }
        else{
            $name = $_POST["name"];
        }

        // Validacija datuma rođenja
        if(empty($_POST["dateOfBirth"])){
            $dateOfBirthErr = "Molim Vas da unesete Vaše datum rođenja";
        }
        else{
            $dateOfBirth = $_POST["dateOfBirth"];
        }

        // Validacija broja pasoša
        if(empty($_POST["passportNumber"])){
            $passportNumberErr = "Molim Vas da unesete Vaše broj pasoša";
        }
        else{
            $passportNumber = $_POST["passportNumber"];
        }

        // Validacija email-a
        if(empty($_POST["email"])){
            $emailErr = "Molim Vas da unesete Vaše email";
        }
        else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $emailErr = "Uneti email nije validnog formata, molim Vas da unesete validni email";
        }
        else{
            $email = $_POST['email'];
        }

        // Validacija datuma početka putovanja
        if(empty($_POST["dateOfBirth"])){
            $dateStartTravelErr = "Molim Vas da unesete datum početka putovanja";
        }
        else{
            $dateStartTravel = $_POST["dateStartTravel"];
        }

        // Validacija datuma kraja putovanja
        if(empty($_POST["dateEndTravel"])){
            $dateEndTravelErr = "Molim Vas da unesete datum završetka putovanja";
        }
        else{
            $dateEndTravel = $_POST["dateEndTravel"];
        }

        // Validacija datuma kraja putovanja
        if(!empty($_POST["insuranceType"])){
            if($_POST["insuranceType"] == "individualno"){
                $insuranceType = 0;
            }else if($_POST["insuranceType"] == "grupno"){
                $insuranceType = 1;
            }
        }
        else{
            $insuranceTypeErr = "Molim Vas da odaberete tip osiguranja";
        }

        $iterator = $_POST["iterator"];
        $days = $_POST["numberDays"];

        // Unos nosilaca polise u tabelu
        if($name != "" && $dateOfBirth != "" && $passportNumber != "" && $email != "" && $dateStartTravel != "" && $dateEndTravel != "" && ($insuranceType != 0 || $insuranceType != 1)){
            $q = "INSERT INTO `nosioci`(`ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `broj_telefona`, `email`, `datum_pocetka`, `datum_kraja`, `broj_dana`, `tip_polise`) 
            VALUES ('$name', '$dateOfBirth', '$passportNumber', '$phoneNumber', '$email', '$dateStartTravel', '$dateEndTravel', $days, '$insuranceType')";

            $resultOfQuery = $conn->query($q);

            if(!$resultOfQuery){
                $err = $conn->error;
                echo "Doslo je do greske prilikom dodavanja u tabelu nosioci: $err";
            }

            if($insuranceType == 1){
                $q = "SELECT `id` FROM `nosioci` WHERE `broj_pasosa` = $passportNumber";

                $resultOfQuery = $conn->query($q);
                if($resultOfQuery->num_rows > 0){
                    $row = $resultOfQuery->fetch_assoc();
                    $id = $row["id"];
                };
                for ($i = 0; $i < $iterator; $i++) { 
                    $name = "nameExtra".$i;
                    $date = "dateOfBirthExtra".$i;
                    $passport = "passportNumberExtra".$i;

                    if($_POST[$name] != "" && $_POST[$date] != "" && $_POST[$passport] != ""){
                        $q = "INSERT INTO `dodatni_nosioci` (`ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `id_nad_nosioca`) 
                            VALUES ('$_POST[$name]', '$_POST[$date]', '$_POST[$passport]', '$id')";

                        $resultOfQuery = $conn->query($q);

                        if(!$resultOfQuery){
                            $err = $conn->error;
                            echo "Doslo je do greske prilikom dodavanja u tabelu dodatni nosioci: $err";
                        }
                    }
                }
             }
        }
    }
?>