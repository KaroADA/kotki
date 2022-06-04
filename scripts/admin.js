$(document).on('change', '.check-ban-hodowla', function() {
    
    id = this.id.slice(18);

    console.log(id);
    console.log($('#' + this.id).is(":checked"));

    $.ajax({
        type: "POST",
        url: "akt_ban.php",
        data: { id: id, czy_ban: ($('#' + this.id).is(":checked") ? 1 : 0) },
        success: function(data)
        {
            console.log(data);
        }
    });
});

$(document).on('click', '#btn-dodaj', function() {
    console.log( this.id );

    id_kotka = $("#IdInput").val();
    id_wl = $("#InputIdWl").val();
    zdjecie = $("#InputLink").val();
    imie = $("#InputImie").val();
    wiek = $("#InputWiek").val();
    waga = $("#InputWaga").val();
    plec = $("#InputPlec").val();

    // console.log(id_kotka);
    // console.log(id_wl);
    // console.log(zdjecie);
    // console.log(imie);
    // console.log(wiek);
    // console.log(waga);
    // console.log(plec);

    ok = true;

    if(zdjecie === ""){
        $("#warningZdj").show(350);
        ok = false;
    }
    if(imie === ""){
        $("#warningImie").show(350);
        ok = false;
    }
    if(wiek === ""){
        $("#warningWiek").show(350);
        ok = false;
    }
    if(waga === ""){
        $("#warningWaga").show(350);
        ok = false;
    }
    if(plec != "Kot" && plec != "Kotka"){
        $("#warningPlec").show(350);
        ok = false;
    }

    if(!ok) return;
    
    $.ajax({
        type: "POST",
        url: "dodaj_kotka.php",
        data: { 
            id_kotka: id_kotka,
            id_wl: id_wl,
            zdjecie: zdjecie,
            imie: imie,
            wiek: wiek,
            waga: waga,
            plec: plec
        },
        success: function(data)
        {
            console.log(data);

            $.ajax({
                type: "POST",
                url: "admin.php",
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

