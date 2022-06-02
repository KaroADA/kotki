logowanie = true

try{
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    logowanie_string = urlParams.get("logowanie");
    if(logowanie_string == "false") logowanie = false;
    console.log(logowanie)
}catch(error){
    console.error(error);
};

if(!logowanie){
    $("#haslo2").slideDown("slow");
    $("#haslo2 > input").prop('required',true);

    $('#title').fadeOut(350, function() {
        $(this).text('Załóż konto').fadeIn(350);
    });

    $('#footer_link').fadeOut(350, function() {
        $(this).text('Masz już konto?').fadeIn(350);
    });

    $('#btn-zaloguj').prop('value','Zarejestruj się');

    $('#form-logowanie').prop('action','zarejestruj.php');
}

$(document).on('click', '#footer_link', function() {
    logowanie = !logowanie;
    console.log(logowanie);

    if(!logowanie){
        $("#haslo2").slideDown("slow");
        $("#haslo2 > input").prop('required',true);

        $('#title').fadeOut(350, function() {
            $(this).text('Załóż konto').fadeIn(350);
        });

        $('#footer_link').fadeOut(350, function() {
            $(this).text('Masz już konto?').fadeIn(350);
        });

        $('#btn-zaloguj').prop('value','Zarejestruj się');

        $('#form-logowanie').prop('action','zarejestruj.php');
        
        $('#blad').hide(350, function() {
            $(this).text('');
        });

    } else {
        $("#haslo2").slideUp("slow");
        $("#haslo2 > input").prop('required',false);

        $('#title').fadeOut(350, function() {
            $(this).text('Zaloguj się').fadeIn(350);
        });

        $('#footer_link').fadeOut(350, function() {
            $(this).text('Nie masz konta?').fadeIn(350);
        });

        $('#btn-zaloguj').prop('value','Zaloguj się');
        
        $('#form-logowanie').prop('action','zaloguj.php');

        $('#blad').hide(350, function() {
            $(this).text('');
        });
    }
});