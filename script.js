console.log("ee");

kolorki = ["#b38749", "#eaca93", "#4a3300", "#684406", "#999999", "#C1C1C1", "#606060", "#303030", "#783F04", "#AE8B68", "#34291F"];

$("#cialko").css({fill: kolorki[Math.floor(Math.random()*kolorki.length)]});
console.log("fill:" + kolorki[Math.floor(Math.random()*kolorki.length)]);

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

    id = this.id;

    switch(id){
        case "moje_kotki_link":
            $.ajax({
                type: "POST",
                url: "moje_kotki.php",
                success: function(data)
                {
                    $("#page_container").fadeOut(350, function(){
                        set_active(id);
                        $("#page_container").html(data).fadeIn(350);
                    });
                }
            });
            break;
        case "wystawa_link":
            $.ajax({
                type: "POST",
                url: "wystawa.php",
                success: function(data)
                {
                    $("#page_container").fadeOut(350, function(){
                        set_active(id);
                        $("#page_container").html(data).fadeIn(350);
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
                        set_active(id);
                        $("#page_container").html(data).fadeIn(350);
                    });
                }
            });
            break;
        case "wyloguj_link":
            break;
    }
});

function set_active(id){
    $("#moje_kotki_link").removeClass("active");
    $("#wystawa_link").removeClass("active");
    $("#hodowla_link").removeClass("active");
    
    $("#" + id).addClass("active");
}

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