$(document).ready(function(){
    // Skripta za prikaz broja izabranih dana
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
            $('#numberDays').val(days);
        }
    });

    // Skripta vezana za prikaz formi za dodatne osiguranike
    $('#iterator').hide();
    $('#numberDays').hide();
    $('#extras').hide();
    $('#rbGroup').on('change', function(){
        $('#extras').show();
    });
    var i = 1;
    $('#iterator').val(i);
    $('#add-more').on('click',function(e){
        e.preventDefault();
        // Dodavanje formi za unos dodatnih osiguranika
        var element = '<p class="m-1 text-primary">Podaci o dodatnim osiguranicima:</p> <div class="mb-1"> <label for="" class="form-label">Nosilac osiguranja (Ime i Prezime)*</label> <input type="text" name="nameExtra'+
        i + '" class="form-control" id=""></div><div class="mb-1"><label for="" class="form-label">Datum rođenja*</label><input type="date" name="dateOfBirthExtra' + 
        i + '" class="form-control" id=""></div><div class="mb-1"><label for="" class="form-label">Broj pasoša*</label><input type="number" name="passportNumberExtra' +
        i +'" class="form-control" id=""></div>';
        $('#dump').append(element);
        i++;
        $('#iterator').val(i);
    });
});