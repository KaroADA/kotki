$.ajax({
    type: "POST",
    url: "moje_kotki.php",
    success: function(data)
    {
        $("#page_container").html(data).fadeIn(350);
    }
});

kolorki = ["#b38749", "#eaca93", "#4a3300", "#684406", "#999999", "#C1C1C1", "#606060", "#303030", "#783F04", "#AE8B68", "#34291F"];

$("#cialko").css({fill: kolorki[Math.floor(Math.random()*kolorki.length)]});
console.log("fill:" + kolorki[Math.floor(Math.random()*kolorki.length)]);

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