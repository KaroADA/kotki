document.body.addEventListener("click", function () {
    $("#audioplayer").get(0).play();
});

$("#audioplayer").prop("volume", 0.5);

$(".slider").on("input", function () {
    console.log(this.value / 100);

    var vol = this.value / 100;

    if(vol <= 0.02) vol = 0;

    $("#audioplayer").prop("volume", vol);
});