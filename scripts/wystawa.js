id_sort = 0;
checked_kobieta = true;
checked_facet = true;
filtr_okulary = -1;
filtr_czapki = -1;

$(document).on('change', '#selectSort_wystawa', function() {
    console.log( this.value );

    id_sort = this.value;

    update_kotki_wystawa(true);

});

$(document).on('change', '#input_kobieta_wystawa', function() {
    
    checked_kobieta = $('#input_kobieta_wystawa').is(":checked");
    
    console.log( checked_kobieta );

    update_kotki_wystawa(true);

});

$(document).on('change', '#input_facet_wystawa', function() {

    checked_facet = $('#input_facet_wystawa').is(":checked");

    console.log( checked_facet );
    
    update_kotki_wystawa(true);

});

$(document).on('change', '#selectOkularkiFiltrWystawa', function() {

    filtr_okulary = this.value;

    console.log( checked_facet );
    
    update_kotki_wystawa(true);

});

$(document).on('change', '#selectCzapkiFiltrWystawa', function() {

    filtr_czapki = this.value;

    console.log( checked_facet );
    
    update_kotki_wystawa(true);

});

$(document).on('click', '.btn-adoptuj', function() {
    console.log( this.id );

    id_kotka = this.id.slice(12);

    console.log(id_kotka);
    
    $.ajax({
        type: "POST",
        url: "adoptuj.php",
        data: { id_kotka: id_kotka },
        success: function(data)
        {
            console.log(data);
            $.ajax({
                type: "POST",
                url: "hodowla.php",
                success: function(data)
                {
                    $("#page_container").fadeOut(350, function(){
                        $("#page_container").html(data).fadeIn(350);
                    });
                }
            });
        }
    });
});

$(document).on('click', '.btn-lajk', function() {
    console.log( this.id );

    id_kotka = this.id.slice(9);

    lajki = parseInt($("#h6-lajk-" + id_kotka).html().split(' ')[0]);
    lajki++;

    console.log(id_kotka);
    console.log(lajki);
    
    $.ajax({
        type: "POST",
        url: "lajk.php",
        data: { id_kotka: id_kotka },
        success: function(data)
        {
            console.log(data);
            $("#h6-lajk-" + id_kotka).html(lajki + " " + odmien(lajki, "lajk", "lajki", "lajków"));
            // update_kotki_wystawa(false);
        }
    });
});

function update_kotki_wystawa(fade){
    $.ajax({
        type: "POST",
        url: "wystawa_kotki.php",
        data: { 
            id_sort: id_sort,
            filtr_kot: (checked_facet ? 1 : 0),
            filtr_kotka: (checked_kobieta ? 1 : 0),
            filtr_okulary: filtr_okulary,
            filtr_czapki: filtr_czapki
        },
        success: function(data)
        {            
            if(fade)
                $("#div_kotki").fadeOut(350, function(){
                    $("#div_kotki").html(data).fadeIn(350)
                });
            else
                $("#div_kotki").html(data);
        }
    });
}

function odmien(liczba, pojedyncza, mnoga, mnoga_dopelniacz) {
	if (liczba == 1) return pojedyncza;
	var reszta10 = liczba % 10;
	var reszta100 = liczba % 100;
	if (reszta10 > 4 || reszta10 < 2 || (reszta100 < 15 && reszta100 > 11) || liczba == 0)
		return mnoga_dopelniacz;
	return mnoga;
}