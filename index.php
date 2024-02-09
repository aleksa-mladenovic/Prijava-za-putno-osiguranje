<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Putna osiguranja</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
                    <a class="nav-link active" aria-current="page" href="#">Pocetna</a>
                    <a class="nav-link" href="pregled.php">Pregled unetih podataka</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Forma za unos novog osiguranja -->
    <div class="container">
        <form>
            <div class="row">
                <div class="col-3">
                    <p class="m-1 text-primary">Podaci o nosiocu osiguranja:</p>
                    <div class="mb-1">
                        <label for="" class="form-label">Nosilac osiguranja (Ime i Prezime)*</label>
                        <input type="text" name="name" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Datum rođenja*</label>
                        <input type="date" name="dateOfBirth" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Broj pasoša*</label>
                        <input type="number" name="passportNumber" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Telefon</label>
                        <input type="number" name="phoneNumber" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Email adresa*</label>
                        <input type="email" name="email" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Datum putovanja*</label>
                        <p class="m-0">Od:</p>
                        <input type="date" name="dateStartTravel" class="form-control" id="fromDate">
                        <p class="m-0">Do:</p>
                        <input type="date" name="dateEndTravel" class="form-control" id="toDate">
                        <p class="m-0 text-primary" id="noDays">Izabrali ste putovanje u trajanju od <span id="days"></span> dana</p>
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Vrsta polise osiguranja: </label>                
                        </br>
                        <input type="radio" name="typeOfPolicy" id="rbSingle" value="single" checked> Individualno
                        <input type="radio" name="typeOfPolicy" id="rbGroup" value="group"> Grupno
                    </div>
                </div>
                <!-- Sakriveni div za unos grupnih osiguranika -->
                <div class="col-3" id="extras">
                    <p class="m-1 text-primary">Podaci o dodatnim osiguranicima:</p>
                    <div class="mb-1">
                        <label for="" class="form-label">Nosilac osiguranja (Ime i Prezime)*</label>
                        <input type="text" name="nameExtra0" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Datum rođenja*</label>
                        <input type="date" name="dateOfBirthExtra0" class="form-control" id="" >
                    </div>
                    <div class="mb-1">
                        <label for="" class="form-label">Broj pasoša*</label>
                        <input type="number" name="passportNumberExtra0" class="form-control" id="" >
                    </div>
                    <button id="add-more" class="btn btn-primary">Dodaj jos jednog osiguranika</button>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Pošalji</button>
        </form>
    </div>

    <!-- Skripta za prikaz broja izabranih dana -->
    <script>
        $('#noDays').hide();
        var fromDate = 0;
        var toDate = 0;
        var days = 0;

        $('#fromDate').on('change', function(){
            fromDate = new Date($(this).val());

            if(fromDate != 0 && toDate != 0 ){
                days = Math.round((toDate.getTime() - fromDate.getTime()) / (1000 * 60 * 60 * 24));
                $('#days').text(days);
                $('#noDays').show();
            }
        });
        $('#toDate').on('change', function(){
            toDate = new Date($(this).val());
        
            if(fromDate != 0 && toDate != 0 ){
                days = Math.round((toDate.getTime() - fromDate.getTime()) / (1000 * 60 * 60 * 24));
                $('#days').text(days);
                $('#noDays').show();
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#extras').hide();
            $("#rbGroup").on('change', function(){
                $('#extras').show();
            });
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>