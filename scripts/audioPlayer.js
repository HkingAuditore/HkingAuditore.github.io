// 播放
play.onclick = function() {
    if (audio.paused) {
        audio.play();
    }
}

// 暂停
pause.onclick = function() {
    if (audio.played) {
        audio.pause();
    }
}

audio.addEventListener('ended', function() {
    play.onclick();
}, false);