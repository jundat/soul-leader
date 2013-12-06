
var CPlayer = cc.Sprite.extend({
    m_fAngle: 0,
    m_ball: CBall = null,
    m_iHP: 10,
    ctor: function () {
        this._super();
        var size = cc.Director.getInstance().getWinSize();
        this.schedule(this.update);
        this.initWithFile(s_tPlayer);
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
        /*Log("angle" + this.m_fAngle);
        if (GisFirst)
            this.m_fAngle = 0.78;
        else
            this.m_fAngle = 2.35;*/
        var distance = Math.sqrt(dx * dx + dy * dy);
        var dirX = Math.cos(this.m_fAngle);
        var dirY = Math.sin(this.m_fAngle);
        var size = this.m_ball.getBoundingBox();
        var startX = this.getPosition().x + dirX * size.width * 2 ;
        var startY = this.getPosition().y + dirY * size.height * 2;

        this.m_ball.setVisible(true);
        this.m_ball.set(startX, startY, dirX, dirY, distance, power);
        /*var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/Ball/Player.plist", "Ball_", 4, 0.1);
        var initSprite = cc.CallFunc.create(
        function () {
            this.initWithFile(s_tPlayer);
        },
        this);
        this.runAction(cc.Sequence.create(animate, initSprite));*/
    },

    updateCollision: function (m_computerBall) {
        var rPlayer = this.getBoundingBox();
        var rBall = new cc.Rect(m_computerBall.getPosition().x - m_computerBall.getBoundingBox().width / 2 + 7.5, m_computerBall.getPosition().y - m_computerBall.getBoundingBox().height / 2 + 7.5, m_computerBall.getBoundingBox().width - 15, m_computerBall.getBoundingBox().height - 15);

        if (cc.rectIntersectsRect(rBall, rPlayer)) {
            
            var director = cc.Director.getInstance();
            var scene = director.getRunningScene();
            var layer = scene.getChildByTag(0);
            

            var spriteFrame = cc.SpriteFrameCache.getInstance().getSpriteFrame("explosion_01.png");

            var explosionEffect = new cc.Sprite();
            explosionEffect.initWithSpriteFrame(spriteFrame);
            
            explosionEffect.setAnchorPoint(cc.p(0.5, 0.5));

            var effectAnimate = FactoryAnimate.getInstance().createAnimate("res/xvn/explosion.plist", "explosion_", 35, 0.015);
            var removeEffect = cc.CallFunc.create(
                function () {
                    layer.removeChild(explosionEffect);
                },
                this);
            explosionEffect.runAction(cc.Sequence.create(effectAnimate, removeEffect));
            
            explosionEffect.setPosition(cc.p(m_computerBall.getPosition().x, m_computerBall.getPosition().y));
            layer.addChild(explosionEffect);

            m_computerBall.setPosition(cc.p(-200, -200));
            m_computerBall.setVisible(false);
            
            this.m_iHP -= m_computerBall.m_fDam;
            if (this.m_iHP <= 0)
                this.m_iHP = 0;
            /*var animate = FactoryAnimate.getInstance().createAnimate("res/xvn/Ball/Player.plist", "Ball_", 4, 0.1);
            var initSprite = cc.CallFunc.create(
            function () {
                this.initWithFile(s_tPlayer);
            },
            this);
            this.runAction(cc.Sequence.create(animate, initSprite));*/
        }
    }
});
