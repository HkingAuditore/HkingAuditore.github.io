function Player() {
    var player = document.getElementById("player");
    var music = document.getElementById("BGM");
    if (player.className === "play") {
        player.setAttribute("class", "stop");
        music.play();
        // alert("play!");

    } else {
        player.setAttribute("class", "play");
        music.pause();
    }
}