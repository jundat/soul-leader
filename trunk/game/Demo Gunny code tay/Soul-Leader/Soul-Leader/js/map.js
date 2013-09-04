function map() {
    this.x = 0
    this.y = 0;
    this.width = 800;
    this.height = 600;

    this.img = new Image();
    this.img.src = "images/map.png";

    
    var buffer = document.createElement("canvas");
    buffer.width = this.width;
    buffer.height = this.height;
    var context = buffer.getContext("2d");
    context.drawImage(this.img, 0, 0, this.width, this.height);

    imageData = context.getImageData(0, 0, buffer.width, buffer.height);
    this.draw = function (context) {
        context.drawImage(buffer, 300, 0, this.width, this.height);
    }

    this.contain = function (x, y) {
        if (!imageData)
            return false;
        var index = Math.floor((x + y * this.width) * 4 + 3);
        return imageData.data[index] && imageData.data[index] != 0;
    }

    this.collide = function (ball) {
        if (ball == null)
            return false;
        var x = Math.floor(ball.x - 300);
        var y = Math.floor(ball.y);
        if (this.contain(x, y)) {
            context.save();
            context.globalCompositeOperation = "destination-out";
            context.fillStyle = "rgba(0,0,0,1)";
            context.beginPath();
            context.arc(x, y, 50, 0, Math.PI * 2, true);
            context.fill();
            context.restore();
            imageData = context.getImageData(0, 0, this.width, this.height);
            return true;
        }
        return false;
    };

}