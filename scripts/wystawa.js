$(document).on('change', '#selectSort_wystawa', function() {
    console.log( this.value );

    id_sort = this.value;

    $.ajax({
        type: "POST",
        url: "wystawa_kotki.php",
        data: { id_sort: id_sort},
        success: function(data)
        {            
            $("#div_kotki").fadeOut(350, function(){
                $("#div_kotki").html(data).fadeIn(350)
            });
        }
    });
});