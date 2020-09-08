var prev = document.getElementById("prev");
var play = document.getElementById("play");
var pause = document.getElementById("pause");
var next = document.getElementById("next");
var auto_next = document.getElementById("auto-next");
var loop = document.getElementById("loop");
var song = document.getElementById("song");
var singer = document.getElementById("singer");
var time = document.getElementById("time");
var loadTime = document.getElementById("loadTime");
var img= document.getElementById("img");

var loopMusic=false;
var musics;
var startSong=0;
var playing = false;
var audio = new Audio()
musics=JSON.parse(localStorage.getItem("listMusic"));
audio.src="/MIL/mp3/"+musics[startSong][0]+".mp3";
song.innerText=musics[startSong][0];
singer.innerText=musics[startSong][1];
img.src=musics[startSong][2];


 pause.style.display = "none";
 auto_next.style.display="none";


loop.onclick=function(){
    if (!loopMusic){
        loop.style.display="none";
        auto_next.style.display="block";
        
    }
    loopMusic=true;
    audio.loop=loopMusic;
};

auto_next.onclick=function(){
    if(loopMusic){
        loop.style.display="block";
        auto_next.style.display="none";
    }
    loopMusic=false;
    audio.loop=loopMusic;
};

play.onclick=function(){
    if (!playing){
        play.style.display="none";
        pause.style.display="block"
        playing=true;
        audio.play();
    }
}

pause.onclick=function(){
    if (playing){
        pause.style.display="none"
        play.style.display="block";
        playing=false;
        audio.pause();
    }
}

prev.onclick=function(){
    startSong--;
    if (startSong<=0){
        startSong=0;
    }
    audio.src="/MIL/mp3/"+musics[startSong][0]+".mp3";
    song.innerText=musics[startSong][0];
singer.innerText=musics[startSong][1];
    img.src=musics[startSong][2];
    audio.play();
}

next.onclick=function(){
    startSong++;
    if (startSong>=musics.length){
        startSong=0;
    }
    audio.src="/MIL/mp3/"+musics[startSong][0]+".mp3";
    song.innerText=musics[startSong][0];
singer.innerText=musics[startSong][1];
    img.src=musics[startSong][2];
    audio.play();
}

setInterval(function(){
    if(!loopMusic){
        if(calTimeNext(audio.currentTime,audio.duration)){
            next.click();
            console.log("clicked");
        }
    }
},1000/60)

function calTimeNext(current,duration){
    if(current+0.5>=duration){
        return true;
    }
    return false;
}

function reloadTimeValue() {
    time.value = ((audio.currentTime / audio.duration) * 100).toFixed(1);
}

function moveTimeValue() {
    audio.currentTime=time.value / 100 * audio.duration;
    
}

time.addEventListener("mousedown", function () {
    clearInterval(timing);
    time.onmousemove = () => { moveTimeValue(); }
});

time.addEventListener("mouseup", function () {
    timing = setInterval(function () {
        if (playing) {
            reloadTimeValue();
            
        }
        updateTimer();
    }, 1000 / 60);
    moveTimeValue();

    time.onmousemove = null;
})

var timing = setInterval(function () {
    if (playing) {
        reloadTimeValue();
    }
    updateTimer();
    console.log("true");
}, 1000 / 60);



function getTime(s) {
    var e = {
        hh: 0,
        mm: 0,
        ss: 0
    };

    e.hh = Math.floor(s / 60 / 60);
    e.mm = Math.floor((s - (e.hh * 60 * 60)) / 60);
    e.ss = Math.floor((s - (e.hh * 60 * 60) - (e.mm * 60)));

    return getDigits(e.hh, 2) + ":" + getDigits(e.mm, 2) + ":" + getDigits(e.ss, 2);
}

function getDigits(e, n) {
    for (var i = 0; i < n; i++) {
        e = "0" + e;
    }
    return e.slice(-n);
}



function updateTimer() {
    loadTime.innerText = getTime(audio.currentTime);
}




