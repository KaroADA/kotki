console.log("halooo");

$(document).on('change', '.selectCzapki', function() {
    console.log( this.value );

    id_kotka = this.id.slice(13);
    id_czapki = this.value;

    console.log( id_kotka );

    $("#img_czapka_" + id_kotka).attr("src", "img/czapka_" + id_czapki + ".png");

    post(id_kotka);
});

$(document).on('change', '.selectOkularki', function() {
    console.log( this.value );

    id_kotka = this.id.slice(15);
    id_okularkow = this.value;

    console.log( id_kotka );

    $("#img_okularki_" + id_kotka).attr("src", "img/okularki_" + id_okularkow + ".png");

    post(id_kotka);
});

function post(id_kotka){
    id_czapki = $("#selectCzapki_" + id_kotka + " option:selected").val();
    id_okularkow = $("#selectOkularki_" + id_kotka + " option:selected").val();
    console.log({id_kotka,id_czapki,id_okularkow});

    $.ajax({
        type: "POST",
        url: "save.php",
        data: { id_kotka: id_kotka, id_czapki: id_czapki, id_okularkow: id_okularkow },
        success: function(data)
        {
            console.log(data);
        }
    });
};

id_sort = 0;
checked_kobieta = true;
checked_facet = true;
filtr_okulary = -1;
filtr_czapki = -1;

$(document).on('change', '#selectSort_moje_kotki', function() {
    console.log( this.value );

    id_sort = this.value;

    update_kotki_moje_kotki();

});

$(document).on('change', '#input_kobieta_moje_kotki', function() {
    
    checked_kobieta = $('#input_kobieta_moje_kotki').is(":checked");
    
    console.log( checked_kobieta );

    update_kotki_moje_kotki();

});

$(document).on('change', '#input_facet_moje_kotki', function() {

    checked_facet = $('#input_facet_moje_kotki').is(":checked");

    console.log( checked_facet );
    
    update_kotki_moje_kotki();

});

$(document).on('change', '#selectOkularkiFiltrMojeKotki', function() {

    filtr_okulary = this.value;

    console.log( checked_facet );
    
    update_kotki_moje_kotki();

});

$(document).on('change', '#selectCzapkiFiltrMojeKotki', function() {

    filtr_czapki = this.value;

    console.log( checked_facet );
    
    update_kotki_moje_kotki();

});

$(document).on('click', '.btn-naWystawe', function() {
    console.log( this.id );

    id_kotka = this.id.slice(14);

    console.log(id_kotka);
    
    $.ajax({
        type: "POST",
        url: "naWystawe.php",
        data: { id_kotka: id_kotka },
        success: function(data)
        {
            console.log(data);
            $(".btn-naWystawe").removeClass("btn-success");
            $(".btn-naWystawe").removeClass("btn-outline-dark");
            $(".btn-naWystawe").addClass("btn-outline-dark");
            $("#btn-naWystawe_" + id_kotka).addClass("btn-success");
            $("#btn-naWystawe_" + id_kotka).removeClass("btn-outline-dark");
        }
    });
});

function update_kotki_moje_kotki(){
    $.ajax({
        type: "POST",
        url: "kotki.php",
        data: { 
            id_sort: id_sort,
            filtr_kot: (checked_facet ? 1 : 0),
            filtr_kotka: (checked_kobieta ? 1 : 0),
            filtr_okulary: filtr_okulary,
            filtr_czapki: filtr_czapki
        },
        success: function(data)
        {            
            $("#div_kotki").fadeOut(350, function(){
                $("#div_kotki").html(data).fadeIn(350)
            });
        }
    });
}