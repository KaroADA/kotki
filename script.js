console.log("ee");

$.ajax({
    type: "POST",
    url: "moje_kotki.php",
    success: function(data)
    {
        $("#page_container").html(data).fadeIn(350);
    }
});

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
}

$(document).on('change', '#selectSort', function() {
    console.log( this.value );

    id_sort = this.value;

    $.ajax({
        type: "POST",
        url: "sort.php",
        data: { id_sort: id_sort},
        success: function(data)
        {            
            $("#div_kotki").fadeOut(350, function(){
                $("#div_kotki").html(data).fadeIn(350)
            });
        }
    });
});

$(document).on('click', '.nav-link', function() {
    console.log( this.id );

    switch(this.id){
        case "moje_kotki_link":
            $.ajax({
                type: "POST",
                url: "moje_kotki.php",
                success: function(data)
                {
                    $("#page_container").fadeOut(350, function(){
                        $("#page_container").html(data).fadeIn(350)
                    });
                }
            });
            break;
        case "hodowla_link":
            $.ajax({
                type: "POST",
                url: "hodowla.php",
                success: function(data)
                {
                    $("#page_container").fadeOut(350, function(){
                        $("#page_container").html(data).fadeIn(350)
                    });
                }
            });
            break;
        case "wyloguj_link":
            break;
    }
});