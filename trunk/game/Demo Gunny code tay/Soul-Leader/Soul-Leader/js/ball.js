function ball() {
    this.x = 0;
    this.y = 0;
    this.sprite = new Image();
    this.sprite.src = "images/ball.png";
    this.Height = this.sprite.height;
    this.Width = this.sprite.width;
}

ball.prototype.draw = function (context) {
    context.drawImage(this.sprite, this.x, this.y);
}
ball.prototype.Set = function (startX,startY,directionX,directionY,distance) {
    this.speedX = directionX * distance/30;
    this.speedY = directionY * distance/30;

    this.x = startX;
    this.y = startY;


}

ball.prototype.update = function () {
    this.x += this.speedX;
    this.y += this.speedY;
    this.speedY += 0.3;
}


