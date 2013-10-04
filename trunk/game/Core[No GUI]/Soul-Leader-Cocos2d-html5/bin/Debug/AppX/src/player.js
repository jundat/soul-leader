
var CPlayer = cc.Sprite.extend({
    m_fAngle: 0,
    m_ball: CBall = null,
    m_iHP: 10,
    ctor: function () {
        this._super();
        var size = cc.Director.getInstance().getWinSize();
        this.schedule(this.update);
        this.initWithFile("res/xvn/Player.png");
        this.setAnchorPoint(cc.p(0.5, 0.5));
    },

    init: function (ball) {
        this.m_ball = ball;
    },
    update: function (dt) {
    },
    fire: function (targetX, targetY, power) {
        var dx = targetX - this.getPosition().x;
        var dy = targetY - this.getPosition().y;
        this.m_fAngle = Math.atan2(dy, dx);
        var distance = Math.sqrt(dx * dx + dy * dy);
        var dirX = Math.cos(this.m_fAngle);
        var dirY = Math.sin(this.m_fAngle);

        var size = this.m_ball.getBoundingBox();
        var startX = this.getPosition().x + dirX * size.width * 2;
        var startY = this.getPosition().y + dirY * size.height * 2;

        this.m_ball.setVisible(true);
        this.m_ball.set(startX, startY, dirX, dirY, distance, power);
        var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/Ball/Player.plist", "Ball_", 4, 0.5);
        var backSprite = cc.CallFunc.create(
        function () {
            this.initWithFile("res/xvn/Player.png");
        },
        this);
        this.runAction(cc.Sequence.create(animate, backSprite));
    },

    /*
    contain: function (x, y) {
        var rect = this.getBoundingBox();
        var isContain = true;
        if (x > rect.x + rect.width)
            isContain = false;
        if (x < rect.x)
            isContain = false;
        if (y > rect.y + rect.height)
            isContain = false;
        if (y < rect.y)
            isContain = false;
        return isContain;
    }, */

    checkCollision: function () {
        var rPlayer = this.getBoundingBox();
        //var rBall = this.m_ball.getBoundingBox();
        var rBall = new cc.Rect(this.m_ball.getPosition().x - this.m_ball.getBoundingBox().width / 2 + 7.5, this.m_ball.getPosition().y - this.m_ball.getBoundingBox().height / 2 + 7.5, this.m_ball.getBoundingBox().width - 15, this.m_ball.getBoundingBox().height - 15);

        if (cc.rectIntersectsRect(rBall, rPlayer)) {
            var director = cc.Director.getInstance();
            var scene = director.getRunningScene();
            if (scene == null)
                var a = 0;
            var layer = scene.getChildByTag(0);

            var effect = new cc.Sprite();
            effect.setAnchorPoint(cc.p(0.5, 0.5));

            var effectAnimate = FactoryAnimate.getInstance().createAnimate("res/xvn/explosion.plist", "explosion_", 35, 0.015);
            var doneEffect = cc.CallFunc.create(
                function () {
                    layer.removeChild(effect);
                },
                this);
            effect.runAction(cc.Sequence.create(effectAnimate, doneEffect));
            effect.setPosition(cc.p(this.m_ball.getPosition().x, this.m_ball.getPosition().y));

            layer.addChild(effect);
            this.m_ball.setPosition(cc.p(-200, -200));
            this.m_ball.setVisible(false);
            this.m_iHP -= this.m_ball.m_fDam;
            var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/Ball/Player.plist", "Ball_", 4, 0.5);
            var backSprite = cc.CallFunc.create(
            function () {
                this.initWithFile("res/xvn/Player.png");
            },
            this);
            this.runAction(cc.Sequence.create(animate, backSprite));
        }
    }
});
