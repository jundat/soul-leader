//game.js

var cv = document.getElementById("homeCanvas");
var ct = homeCanvas.getContext("2d");

var img = new Image();
img.src = "images/imgBg.png";
var logo = new Image();
logo.src = "images/Logo.png";

img.onload = function() {
    ct.drawImage(img, 0, 0);
	ct.drawImage(logo, r.x, r.y);
}

logo.onload = function() {
	ct.drawImage(img, 0, 0);
    ct.drawImage(logo, r.x, r.y);
}

var r = {
    x: 10,
    y: 10,
    w: 150,
    h: 150,
    containt: function (_x, _y) {
        if (_x >= this.x && _x <= this.x + this.w && _y >= this.y && _y <= this.y + this.h) {
            return true;
        } else {
            return false;
        }
    }
}

var isDown = false;


//ct.fillStyle = "red";
//ct.clearRect(0, 0, cv.width, cv.height);
ct.drawImage(img, 0, 0);
ct.drawImage(logo, r.x, r.y);
ct.fillRect(r.x, r.y, r.w, r.h);

var op = { x: 0, y: 0 };

cv.onmousedown = function (e) {
    if (r.containt(e.x - cv.offsetLeft, e.y - cv.offsetTop)) {
        isDown = true;
        op.x = e.x;
        op.y = e.y;
    }
}

cv.onmouseup = function (e) {
    isDown = false;
}

cv.onmouseout = function (e) {
    isDown = false;
}

cv.onmousemove = function (e) {
    if (isDown) {
        ct.clearRect(0, 0, cv.width, cv.height);
        r.x += e.x - op.x;
        r.y += e.y - op.y;

        op.x = e.x;
        op.y = e.y;

        ct.drawImage(img, 0, 0);
        ct.drawImage(logo, r.x, r.y);
    }
}
