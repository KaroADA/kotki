$(document).on('change', '.check-ban-hodowla', function() {
    
    id = this.id.slice(18);

    console.log("dsadas");
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