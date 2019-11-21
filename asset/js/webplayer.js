var volumeslider = document.getElementById("volumeslider");
var pausebutton = document.getElementById("pause");
var player = $('#audiocontrol')[0];
slidervalue = "0." + volumeslider.value;
var previousvalue = volumeslider.value;
var playerempty = document.getElementById("audiocontrol");
var previousbutton = document.getElementById("previous");
var nextbutton = document.getElementById("next");
var randombutton = document.getElementById("random");
var loopbutton = document.getElementById("loop");
random = false;


function getRandomArrayElement(arr){
    var min = 0;
    var max = (arr.length - 1);
    var randIndex = Math.floor(Math.random() * (max - min)) + min;
    return arr[randIndex];
}

function pause(a){
    if(a == 1){
        player.pause();
        $('#pause').attr('class', 'none far fa-play-circle');
        $('#pause').attr('onclick', 'pause(2)');
    } else {
        player.play();
        $('#pause').attr('class', 'none far fa-pause-circle');
        $('#pause').attr('onclick', 'pause(1)');
    }
}

function updateSlider(){
    if(volumeslider.value > 50){
        $('#volume').attr('class', 'none fas fa-volume-up');
    }
    else if(volumeslider.value < 50 && volumeslider.value != 0 ){
        $('#volume').attr('class', 'none fas fa-volume-down');
    } else {
        $('#volume').attr('class', 'none fas fa-volume-mute');
    }
        slidervalue = (1 / 100 * volumeslider.value);
        playerempty.volume = slidervalue;
        previousvalue = volumeslider.value;  
}

function mutestate(a){
    if(a == 2){
        volumeslider.value = previousvalue;
        if(volumeslider.value != 0 && volumeslider.value > 50){
            $('#volume').attr('class', 'none fas fa-volume-up');
        } else if(volumeslider.value != 0 && volumeslider.value < 50){
            $('#volume').attr('class', 'none fas fa-volume-down');
        }
        else {
            $('#volume').attr('class', 'none fas fa-volume-mute');
        }
        $('#volume').attr('onclick', 'mutestate(1)');
        if(volumeslider.value == 100){
            playerempty.volume = 1;
        } else{
            playerempty.volume = slidervalue;
            
        }
        previousvalue = volumeslider.value;
    }
    else if(a == 1){
        $('#volume').attr('class', 'none fas fa-volume-mute');
        $('#volume').attr('onclick', 'mutestate(2)');
        playerempty.volume = 0;
        volumeslider.value = 0;
    }
}

function next(){
    var next = songslist[($.inArray(selected, songslist) + 1) % songslist.length];
    document.getElementById(next).click();
}

function previous(){
    var previous = songslist[($.inArray(selected, songslist) - 1) % songslist.length];
    if(previous == songslist[-1]){
        previous = songslist[0];
    }
        document.getElementById(previous).click();
}

function loop(a){
    if(a == 1){
        loopbutton.style = "color:#1ED760;";
        playerempty.loop = true;
        $('#loop').attr('onclick', 'loop(2)');
    } else {
        loopbutton.style = "color:white;"
        playerempty.loop = false;
        $('#loop').attr('onclick', 'loop(1)');
    }
}

function respond()
{
    var s = parseInt(playerempty.currentTime % 60);
    if(s < 10){s = '0'+s}
    var m = parseInt((playerempty.currentTime / 60) % 60);
    document.getElementById('time').innerHTML = m + ':' + s ;
    var st = parseInt(playerempty.duration % 60);
    if(st < 10){st = '0'+st}
    var mt = parseInt((playerempty.duration / 60) % 60);
    document.getElementById("totaltime").innerHTML = mt + ':' + st ;
    var slidebar = parseInt(10000000 / playerempty.duration * playerempty.currentTime);
    document.getElementById("currenttime").value = slidebar;
    if(random == false){
        if(playerempty.duration == playerempty.currentTime){
            var next = songslist[($.inArray(selected, songslist) + 1) % songslist.length];
            document.getElementById(next).click();
        }
    } else {
        if(playerempty.duration == playerempty.currentTime){
            var randomnext = getRandomArrayElement(songslist);
            if(selected == randomnext){
                var next = randomnext[($.inArray(selected, randomnext) + 1) % songslist.length];
                document.getElementById(next).click();
            } else {
                document.getElementById(randomnext).click();
            }
        }
    }

    setTimeout('respond()', 1000);
}

function updateSongLenght(){
    current = (document.getElementById("currenttime").value);
    newvalue = (playerempty.duration / 10000000 * current);
    playerempty.currentTime = newvalue;
}

function UpdateRandomState(a){
    if(a == 1){
        randombutton.style = "color:#1ED760;";
        random = true;
        $('#random').attr('onclick', 'loop(2)');
    } else {
        randombutton.style = "color:white;"
        random = false;
        $('#random').attr('onclick', 'loop(1)');
    }
}