

var canvas;
m_height = window.innerHeight;
m_width = window.innerWidth;

var img = new Image();
img.src = "images/player.png";

var img1 = new Image();
img1.src = "images/map.png";

var img1 = new Image();
img1.src = "images/ball.png";

function Load() {
    
    canvas = document.getElementById("Canvas");

    //canvas.style.cursor = "none";
    canvas.height = m_height;
    canvas.width = m_width;

    context = canvas.getContext("2d");

    canvas.style.position = "absolute";
    canvas.style.left = m_width / 2 - m_width / 2 + "px";
    canvas.style.top = m_height / 2 - m_height / 2 + "px";


    var i = 0;
    player = new Player();
    map = new map();
    //player.x += 800;
    //player.draw(context);
    //context.drawImage(img, 0, 0);
    

    var mainloop = function () {
        context.clearRect(0, 0, canvas.width, canvas.height);
        player.draw(context);
        map.draw(context);
        if (map.collide(player.ball) == true)
            player.ball = null;
        player.update();
    };

    //phan nay khong dong vao, vi no la co dinh rui. 
    var animFrame = window.requestAnimationFrame ||
     window.webkitRequestAnimationFrame ||
     window.mozRequestAnimationFrame ||
     window.oRequestAnimationFrame ||
     window.msRequestAnimationFrame ||
     null;
    if (animFrame == null) {
        var recursiveAnim = function () {
            mainloop();//goi vong lap game
            animFrame(recursiveAnim);
        };


        animFrame(recursiveAnim);
    } else {
        var ONE_FRAME_TIME = 1000 / 60;
        setInterval(mainloop, ONE_FRAME_TIME);
    }

    canvas.onmousedown = function (e) {
        //player.draw(context);
        //context.drawImage(img, 0, 0);
        _ball = new ball();
        player.setBall(_ball);
        player.fire(e.x, e.y);

    }
}




