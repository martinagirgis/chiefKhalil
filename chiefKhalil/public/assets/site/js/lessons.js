
    var myVideo = document.getElementById ("myVedio");
    var courseDiv = document.getElementById ("course");
    var addVideo = document.getElementById ("addVideo");
    var addsDiv = document.getElementById ("adds");
    var skipBtn = document.getElementById ("skip");
    var chooseDiv = document.getElementById ("choose");
    var examBtn = document.getElementById ("exam");
    var repeatBtn = document.getElementById ("repeat");
    var examDiv = document.getElementById ("examdiv");

    // get duration 
    var duration;
    myVideo.addEventListener('loadedmetadata', function () {
        duration = myVideo.duration.toFixed(0);
        console.log( duration );
        randomTime();
    });

    // random time to show ADD
    var rand;
    function randomTime() {
        var min = 0,
        max = duration;
        rand = Math.floor(Math.random() * (max - min + 1) + min);
        console.log('Wait for ' + rand + ' seconds');
        // setTimeout(randomTime, rand * 1000);
        // clearTimeout(randomTime);
    }

    var i ;
    myVideo.addEventListener("play", function() {
        timer();
    });

    function timer(){
        i = setTimeout(showAdd, 1000);
    }

    function showAdd(){
        if(myVideo.currentTime.toFixed(0)==rand)
        {
            console.log("success");
            myVideo.pause();
            courseDiv.style.display = "none";
            addsDiv.style.display = "block";
            addVideo.play();
            addVideo.controls = false;
        }
        timer();
    }

    myVideo.addEventListener("pause", function() {
        clearTimeout(i);
    });
    
    skipBtn.onclick = function() {
        if(addVideo.currentTime.toFixed(0)>4)
        {
            addVideo.pause();
            addsDiv.style.display = "none";
            courseDiv.style.display = "block";
            myVideo.play();
        }
    }

    addVideo.addEventListener("ended", function() {
        addVideo.pause();
        addsDiv.style.display = "none";
        courseDiv.style.display = "block";
    });

    myVideo.addEventListener("ended", function() {
        myVideo.pause();
        courseDiv.style.display = "none";
        chooseDiv.style.display = "block";
    });

    examBtn.onclick = function() {
    chooseDiv.style.display = "none";
    examDiv.style.display = "block";
    }

    repeatBtn.onclick = function() {
        chooseDiv.style.display = "none";
        courseDiv.style.display = "block";
        myVideo.currentTime = 0;
    }


