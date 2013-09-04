var RADIUS = 10;

function Player() {
    this.x = 300
    this.y = 300;
    this.sprite = new Image();
    this.sprite.src = "images/player.png";
    this.Height = this.sprite.height;
    this.Width = this.sprite.width;
    this.angle = 0;
    this.ball = null;
}

Player.prototype.draw = function(context)
{
    context.drawImage(this.sprite, this.x, this.y);
    if (this.ball != null)
        this.ball.draw(context);
}

Player.prototype.update = function () {
    if (this.ball != null)
        this.ball.update();
}

Player.prototype.setBall = function (_ball) {
    this.ball = _ball;
}


Player.prototype.fire = function (targetX, targetY) {
    var dx = targetX - this.x;
    var dy = targetY - this.y;
    this.angle = Math.atan2(dy, dx);
    var distance = Math.sqrt(dx*dx + dy*dy);
    var dirX = Math.cos(this.angle);
    var dirY = Math.sin(this.angle);

    var startX = this.x + dirX;
    var startY = this.y + dirY;
    this.ball.Set(startX, startY, dirX, dirY,distance);
}