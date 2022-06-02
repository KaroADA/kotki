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

$(document).on('change', '#selectSort_moje_kotki', function() {
    console.log( this.value );

    id_sort = this.value;

    $.ajax({
        type: "POST",
        url: "kotki.php",
        data: { id_sort: id_sort},
        success: function(data)
        {            
            $("#div_kotki").fadeOut(350, function(){
                $("#div_kotki").html(data).fadeIn(350)
            });
        }
    });
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